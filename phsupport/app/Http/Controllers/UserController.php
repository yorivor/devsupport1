<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::user()->department == "Technical Team")
        {
            $users = DB::table('users')->where('position', '!=', 'Super Admin')->where('department', 'Technical Team')->get();    
        }
        elseif(Auth::user()->department == "Lesson Support")
        {
            $users = DB::table('users')->where('position', '!=', 'Super Admin')->where('department', 'Lesson Support')->get();
        }
        else
        {
            $users = DB::table('users')->where('position', '!=', 'Super Admin')->get();  
        }


        return view('/admin/userlist', ['users' => $users]);
    }

    /**
     * Show the form for create the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createform()
    {
        return view('/auth/register');
    }

    /**
     * Show the form for create the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'department' => 'required',
            'position' => 'required',
            ]
        );

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $department = $request->input('department');
        $position = $request->input('position');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('users')->insert([
            ['name' => $name, 'email' => $email, 'password' => $password, 'department' => $department, 'created_at' => $created_at, 'updated_at' => $updated_at, 'position' => $position,]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new account', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'User is successfully Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->first();

        return view('/admin/edit_user', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'department' => 'required',
            'position' => 'required',
            ]
        );      

        $name = $request->input('name');
        $position = $request->input('position');
        $department = $request->input('department');
        $updated_at = date("Y-m-d H:i:s");

        DB::table('users')->where('id', $id)->update(['name' => $name, 'department' => $department, 'position' => $position, 'updated_at' => $updated_at, ]);

        $created_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Edited account user id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'User is successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete account user id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'User is successfully Deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeform($id)
    {
        $users = DB::table('users')->where('id', $id)->first();

        return view('/admin/change_pass', ['users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepass(Request $request, $id)
    {
        $this->validate(request(), [
            'password' => 'required|min:6|confirmed',
            ]
        );

        $password = Hash::make($request->input('password'));
        $updated_at = date("Y-m-d H:i:s");

        DB::table('users')->where('id', $id)->update(['password' => $password, 'updated_at' => $updated_at, ]);

        $created_at = date("Y-m-d H:i:s");

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Change password of account user id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Password is successfully Updated !');
    }
}
