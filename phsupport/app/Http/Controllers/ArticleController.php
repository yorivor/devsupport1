<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
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
        return view('/admin/article_management');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/article_add');
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
            'article_title' => 'required|max:255',
            'article_date' => 'required|date',
            'article_content' => 'required',
            ]
        );
        
        $article_title = $request->input('article_title');
        $article_date = $request->input('article_date');
        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($article_date));

        DB::table('article')->insert([
            ['article_banner' => "", 'article_title' => $article_title, 'article_date' => $date_article, 'article_creator' => Auth::user()->name, 'article_content' => $article_content, 'article_category' => 'Outage', 'article_active' => 'Active', 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new outage', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is successfully Created!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = DB::table('article')->where('article_id', $id)->where('article_category', 'Outage')->first();
        $date_article = date('m/d/Y', strtotime($article->article_date));

        return view('/admin/article_edit', ['article' => $article, 'date_article' => $date_article]);
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
            'article_title' => 'required|max:255',
            'article_date' => 'required|date',
            'article_content' => 'required',
            ]
        );
        
        $article_title = $request->input('article_title');
        $article_date = $request->input('article_date');
        $article_content = $request->input('article_content');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($article_date));

        DB::table('article')->where('article_id', $id)->update(['article_title' => $article_title, 'article_date' => $date_article, 'article_content' => $article_content, 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Outage id number: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('article')->where('article_id', $id)->delete();
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Outage id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is successfully Deleted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/admin/article_list');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creation(Request $request)
    {
        $this->validate(request(), [
            'article_title' => 'required|max:255',
            'article_date' => 'required|date',
            'article_content' => 'required',
            ]
        );
        
        $article_title = $request->input('article_title');
        $article_date = $request->input('article_date');
        $article_content = $request->input('article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($article_date));

        DB::table('article')->insert([
            ['article_banner' => "", 'article_title' => $article_title, 'article_date' => $date_article, 'article_creator' => Auth::user()->name, 'article_content' => $article_content, 'article_category' => 'Downtime Advisory', 'article_active' => 'Active', 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new Downtime Advisory', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Downtime Advisory is successfully Created!');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function editadvisory($id)
    {
        $article = DB::table('article')->where('article_id', $id)->where('article_category', 'Downtime Advisory')->first();
        $date_article = date('m/d/Y', strtotime($article->article_date));

        return view('/admin/advisory_edit', ['article' => $article, 'date_article' => $date_article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateadvisory(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title' => 'required|max:255',
            'article_date' => 'required|date',
            'article_content' => 'required',
            ]
        );
        
        $article_title = $request->input('article_title');
        $article_date = $request->input('article_date');
        $article_content = $request->input('article_content');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($article_date));

        DB::table('article')->where('article_id', $id)->update(['article_title' => $article_title, 'article_date' => $date_article, 'article_content' => $article_content, 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Downtime Advisory id number: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Downtime Advisory is successfully Updated!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyadvisory($id)
    {
        DB::table('article')->where('article_id', $id)->delete();
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Downtime Advisory id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Downtime Advisory is successfully Deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('article')->where('article_id', $id)->update(['article_active' => 'Active', 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Active Outage id number: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is now Active!');
    }

    public function resolve($id)
    {
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('article')->where('article_id', $id)->update(['article_active' => 'Resolve', 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Resolve Outage id number: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is now Resolve!');
    }

    public function techoutage()
    {

        return view('/admin/add_techoutage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function techcreate(Request $request)
    {
        
        $this->validate(request(), [
            'penalty' => 'max:255',      
            'content' => 'required',
            ]
        );
        
        $penalty = $request->input('penalty');
        $content = $request->input('content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('article')->insert([
            ['article_banner' => "", 'article_title' => $penalty, 'article_date' => '1111-11-11', 'article_creator' => Auth::user()->name, 'article_content' => $content, 'article_category' => 'Tech', 'article_active' => 'Active', 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new tech outage', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Tech Outage is successfully Created!');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edittechs($id)
    {
        $article = DB::table('article')->where('article_id', $id)->where('article_category', 'Tech')->first();
        $date_article = date('m/d/Y', strtotime($article->article_date));

        return view('/admin/edit_techoutage', ['article' => $article, 'date_article' => $date_article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatetechs(Request $request, $id)
    {
        $this->validate(request(), [
            'penalty' => 'max:255',
            'content' => 'required',
            ]
        );
        
        $penalty = $request->input('penalty');
        $content = $request->input('content');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('article')->where('article_id', $id)->update(['article_title' => $penalty, 'article_content' => $content, 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Tech Outage Advisory id number: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Tech Outage is successfully Updated!');
    }
}
