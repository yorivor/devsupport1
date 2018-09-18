<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class WhatshotController extends Controller
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
        return view('/admin/whatshot_management');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/add_hotcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'category' => 'required|max:255',
            ]
        );

        $category = $request->input('category');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('whatshot_cat')->insert([
            ['what_title' => $category, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created New Whats Hot Category', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Category is successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotcat = DB::table('whatshot_cat')->where('what_id', $id)->first();
        $count = count($hotcat);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('/admin/edit_hotcat', ['hotcat' => $hotcat ,'id' => $id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate(request(), [
            'category' => 'required|max:255',
            ]
        );

        $category = $request->input('category');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('whatshot_cat')->where('what_id', $id)->update(
            ['what_title' => $category, 'updated_at' => $updated_at]
        );

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Whats Hot Category id:'. $id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Category was successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycat($id)
    {
        $cat = DB::table('whatshot_cat')->where('what_id', $id)->first();
        $count = count($cat);

        if(!$count)
        {
            return "404 Page not found";
        }
        else
        {
            DB::table('whatshot_cat')->where('what_id', $id)->delete();

            return redirect()->back()->with('message', 'Category is successfully Deleted!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotcreate()
    {
        return view('/admin/add_hotart');
    }

    /**
     * crate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hotadd(Request $request)
    {
        $this->validate(request(), [
            'article_title' => 'required|max:255',
            'category' => 'required',
            'article_content' => 'required',
            ]
        );

        $article_title = $request->input('article_title');
        $category = $request->input('category');
        $article_content = $request->input('article_content');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('whatshot')->insert([
            ['title' => $article_title, 'category' => $category, 'content' => $article_content, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created New Whats Hot Article', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Whats Hot Article is successfully Created!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotlist()
    {
        return view('/admin/list_hotart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_hotart($id)
    {
        $hotart = DB::table('whatshot')->where('whatshot_id', $id)->first();
        $count = count($hotart);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('/admin/edit_hotart', ['hotart' => $hotart ,'id' => $id]);
        }
    }

    /**
     * crate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hotedit(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title' => 'required|max:255',
            'category' => 'required',
            'article_content' => 'required',
            ]
        );

        $article_title = $request->input('article_title');
        $category = $request->input('category');
        $article_content = $request->input('article_content');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('whatshot')->where('whatshot_id', $id)->update(
            ['title' => $article_title, 'category' => $category, 'content' => $article_content, 'updated_at' => $updated_at]
        );

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Whats Hot Article '.$id , 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Whats Hot Article is successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyart($id)
    {
        $cat = DB::table('whatshot')->where('whatshot_id', $id)->first();
        $count = count($cat);

        if(!$count)
        {
            return "404 Page not found";
        }
        else
        {
            DB::table('whatshot')->where('whatshot_id', $id)->delete();

            return redirect()->back()->with('message', 'Article is successfully Deleted!');
        }
    }
    
}
