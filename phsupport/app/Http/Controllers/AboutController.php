<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AboutController extends Controller
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
        return view('/admin/about_management');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thewho()
    {
        $whoweare = DB::table('whoweare')->first();
        $counting = count($whoweare);

        return view('/admin/whoweare', [ 'counting' => $counting, 'whoweare' => $whoweare ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createwho(Request $request)
    {
        $whoweare = DB::table('whoweare')->first();
        $count = count($whoweare);

        $this->validate(request(), [
            'article_content' => 'required'
            ]
        );

        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if(! $count)
        {

            DB::table('whoweare')->insert([
                ['content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Create Who we are', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Who we are is successfully Created!');
        }
        else
        {
            DB::table('whoweare')->update(['content' => $article_content, 'updated_at' => $updated_at]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Update Who we are', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Who we are is successfully Updated!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thevalue()
    {
        $whatwevalue = DB::table('whatwevalue')->first();
        $counting = count($whatwevalue);

        return view('/admin/whatwevalue', [ 'counting' => $counting, 'whatwevalue' => $whatwevalue ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createvalue(Request $request)
    {
        $whatwevalue = DB::table('whatwevalue')->first();
        $count = count($whatwevalue);

        $this->validate(request(), [
            'article_content' => 'required'
            ]
        );

        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if(! $count)
        {

            DB::table('whatwevalue')->insert([
                ['content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Create What we value', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'What we value is successfully Created!');
        }
        else
        {
            DB::table('whatwevalue')->update(['content' => $article_content, 'updated_at' => $updated_at]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Update What we valie', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'What we value is successfully Updated!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thebrand()
    {
        $ourbrand = DB::table('ourbrand')->first();
        $counting = count($ourbrand);

        return view('/admin/ourbrand', [ 'counting' => $counting, 'ourbrand' => $ourbrand ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createbrand(Request $request)
    {
        $ourbrand = DB::table('ourbrand')->first();
        $count = count($ourbrand);

        $this->validate(request(), [
            'article_content' => 'required'
            ]
        );

        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if(! $count)
        {

            DB::table('ourbrand')->insert([
                ['content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Create Our Brand', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Brand is successfully Created!');
        }
        else
        {
            DB::table('ourbrand')->update(['content' => $article_content, 'updated_at' => $updated_at]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Update Our Brand', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Brand is successfully Updated!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function themission()
    {
        $ourmission = DB::table('ourmission')->first();
        $counting = count($ourmission);

        return view('/admin/ourmission', [ 'counting' => $counting, 'ourmission' => $ourmission ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createmission(Request $request)
    {
        $ourmission = DB::table('ourmission')->first();
        $count = count($ourmission);

        $this->validate(request(), [
            'article_content' => 'required'
            ]
        );

        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if(! $count)
        {

            DB::table('ourmission')->insert([
                ['content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Create Our Mission', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Mission is successfully Created!');
        }
        else
        {
            DB::table('ourmission')->update(['content' => $article_content, 'updated_at' => $updated_at]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Update Our Mission', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Mission is successfully Updated!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thevision()
    {
        $ourvision = DB::table('ourvision')->first();
        $counting = count($ourvision);

        return view('/admin/ourvision', [ 'counting' => $counting, 'ourvision' => $ourvision ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createvision(Request $request)
    {
        $ourvision = DB::table('ourvision')->first();
        $count = count($ourvision);

        $this->validate(request(), [
            'article_content' => 'required'
            ]
        );

        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if(! $count)
        {

            DB::table('ourvision')->insert([
                ['content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Create Our Vision', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Vision is successfully Created!');
        }
        else
        {
            DB::table('ourvision')->update(['content' => $article_content, 'updated_at' => $updated_at]);

            DB::table('logs')->insert([
                ['message' => Auth::user()->name.' Update Our Vision', 'created_at' => $created_at, 'updated_at' => $updated_at,]
            ]);

            return redirect()->back()->with('message', 'Our Vision is successfully Updated!');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
