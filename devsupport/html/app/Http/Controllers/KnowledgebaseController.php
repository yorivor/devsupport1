<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Validator;
use DB;

class KnowledgebaseController extends Controller
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
        

        return view('/admin/knowledgebase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_create()
    {

        return view('/admin/add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function category_store(Request $request)
    {
        $this->validate(request(), [
            'category' => 'required|max:255',
            ]
        );

        $category = $request->input('category');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('knowledge_category')->insert([
            ['category' => $category, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created New Category', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Category is successfully Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('knowledge_category')->where('knowledge_category_id', $id)->first();
        $count = count($category);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('/admin/edit_category', [ 'category' => $category ]);
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
        $this->validate(request(), [
            'category' => 'required|max:255',
            ]
        );

        $category = $request->input('category');
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        DB::table('knowledge_category')->where('knowledge_category_id', $id)->update(
            ['category' => $category, 'updated_at' => $updated_at]
        );

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Category id:'. $id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Category is successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('knowledge_category')->where('knowledge_category_id', $id)->delete();
        DB::table('sub_knowledge_category')->where('knowledge_category_id', $id)->delete();
        DB::table('knowledge_article')->where('knowledge_category_id', $id)->delete();

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Category id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Category is successfully Deleted!');
    }

    public function setup($id)
    {
        return view('/admin/knowledge_setup', ['knowledge_id' => $id]);
    }

    public function cat_article($id)
    {
        $category = DB::table('knowledge_category')->where('knowledge_category_id', $id)->first();
        $count = count($category);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('/admin/cat_article', ['knowledge_id' => $id, 'category' => $category]);
        }
    }

    public function store_cat_article(Request $request, $id)
    {
        $this->validate(request(), [
            'knowledge_article_title' => 'required|max:255',
            'knowledge_article_date' => 'required|date',
            'knowledge_article_content' => 'required',
            ]
        );
        
        $knowledge_article_title = $request->input('knowledge_article_title');
        $knowledge_article_date = $request->input('knowledge_article_date');
        $knowledge_article_content = $request->input('knowledge_article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($knowledge_article_date));

        DB::table('knowledge_article')->insert([
            ['knowledge_category_id' => $id, 'sub_knowledge_category_id' => 0, 'knowledge_article_title' => $knowledge_article_title, 'knowledge_article_date' => $date_article, 'knowledge_article_content' => $knowledge_article_content, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new Knowledge Base', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Knowledge Base is successfully Created!');
    }

    public function subcat($id)
    {

        return view('/admin/sub_category', ['knowledge_id' => $id]);
    }

    public function store_subcat(Request $request, $id)
    {
        $this->validate(request(), [
            'sub_category' => 'required|max:255',
            ]
        );

        $sub_category = $request->input('sub_category');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('sub_knowledge_category')->insert([
            ['knowledge_category_id' => $id, 'sub_category' => $sub_category, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created New Sub Category', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Sub Category is successfully Created!');

    }

    public function editsubcat($id, $idsub)
    {

        $subcategory = DB::table('sub_knowledge_category')->where('knowledge_category_id', $id)->where('id', $idsub)->first();
        $count = count($subcategory);

        if(! $count)
        {
            return "404 Page not found".$idsub;
        }
        else
        {
            return view('/admin/edit_sub_category', ['knowledge_id' => $id, 'subid' => $idsub, 'subcategory' => $subcategory]);
        }
    }

    public function update_subcat(Request $request, $id, $idsub)
    {
        $this->validate(request(), [
            'sub_category' => 'required|max:255',
            ]
        );

        $sub_category = $request->input('sub_category');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('sub_knowledge_category')->where('id', $idsub)->where('knowledge_category_id', $id)->update(
            ['sub_category' => $sub_category, 'updated_at' => $updated_at]
        );

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update Sub Category id:'. $idsub, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Sub Category is successfully Update!');
    }

    public function destroysub($id, $idsub)
    {
        DB::table('sub_knowledge_category')->where('id', $idsub)->where('knowledge_category_id', $id)->delete();
        DB::table('knowledge_article')->where('sub_knowledge_category_id', $idsub)->where('knowledge_category_id', $id)->delete();

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Sub Category id: '.$idsub, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Sub Category is successfully Deleted!');
    }

    public function knowledge_article($id, $idsub)
    {
        $subcategory = DB::table('sub_knowledge_category')->where('id', $idsub)->where('knowledge_category_id', $id)->first();
        $count = count($subcategory);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('/admin/knowledge_article', ['knowledge_id' => $id, 'subid' => $idsub, 'subcategory' => $subcategory]);
        }
    }

    public function store_knowledge_article(Request $request, $id, $idsub)
    {
        $this->validate(request(), [
            'knowledge_article_title' => 'required|max:255',
            'knowledge_article_date' => 'required|date',
            'knowledge_article_content' => 'required',
            ]
        );
        
        $knowledge_article_title = $request->input('knowledge_article_title');
        $knowledge_article_date = $request->input('knowledge_article_date');
        $knowledge_article_content = $request->input('knowledge_article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($knowledge_article_date));

        DB::table('knowledge_article')->insert([
            ['knowledge_category_id' => $id, 'sub_knowledge_category_id' => $idsub, 'knowledge_article_title' => $knowledge_article_title, 'knowledge_article_date' => $date_article, 'knowledge_article_content' => $knowledge_article_content, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created new Knowledge Base', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Knowledge Base is successfully Created!');
    }

    public function knowledge_articleedit($id, $idsub, $kaid)
    {
        $karticle = DB::table('knowledge_article')->where('knowledge_article_id', $kaid)->where('knowledge_category_id', $id)->where('sub_knowledge_category_id', $idsub)->first();
        $count = count($karticle);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            $date_article = date('m/d/Y', strtotime($karticle->knowledge_article_date));
            return view('/admin/edit_knowledge_article', ['knowledge_id' => $id, 'subid' => $idsub, 'kaid' => $kaid, 'karticle' => $karticle, 'date_article' => $date_article]);
        }
    }

    public function update_knowledge_article(Request $request, $id, $idsub, $kaid)
    {
        $this->validate(request(), [
            'knowledge_article_title' => 'required|max:255',
            'knowledge_article_date' => 'required|date',
            'knowledge_article_content' => 'required',
            ]
        );
        
        $knowledge_article_title = $request->input('knowledge_article_title');
        $knowledge_article_date = $request->input('knowledge_article_date');
        $knowledge_article_content = $request->input('knowledge_article_content');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_article = date('Y-m-d',strtotime($knowledge_article_date));

        DB::table('knowledge_article')->where('knowledge_article_id', $kaid)->where('knowledge_category_id', $id)->where('sub_knowledge_category_id', $idsub)->update(['knowledge_article_title' => $knowledge_article_title, 'knowledge_article_date' => $date_article, 'knowledge_article_content' => $knowledge_article_content, 'updated_at' => $updated_at]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.'Update Knowledge Base id:'. $kaid, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Knowledge Base is successfully Update!');
    }

    public function destroyka($id, $idsub, $kaid)
    {
        DB::table('knowledge_article')->where('knowledge_article_id', $kaid)->where('knowledge_category_id', $id)->where('sub_knowledge_category_id', $idsub)->delete();

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Knowledge Base Article id: '.$kaid, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Knowledge Base Article is successfully Deleted!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top_knowbase(Request $request)
    {
        
        $check_top = DB::table('top_articles')->first();
        $count = count($check_top);


        return view('/admin/top_knowledgebase', ['check_top' => $check_top, 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createtop(Request $request)
    {
        $check_top = DB::table('top_articles')->first();
        $count = count($check_top);

        $waiting_message = $request->input('waiting_message');
        $number_one = $request->input('number_one');
        $number_two = $request->input('number_two');
        $number_three = $request->input('number_three');
        $number_four = $request->input('number_four');
        $number_five = $request->input('number_five');
        $number_six = $request->input('number_six');
        $number_seven = $request->input('number_seven');
        $number_eight = $request->input('number_eight');
        $number_nine = $request->input('number_nine');
        $number_ten = $request->input('number_ten');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if (!preg_match('/^[0-9]*$/', $waiting_message)) {
            return redirect()->back()->with('waiting_message', 'Please input numbers only!');
        } 
        else 
        {
           if(!$count)
            {
                DB::table('top_articles')->insert([
                [
                    'waiting_time' => $waiting_message, 
                    'article_one' => $number_one, 
                    'article_two' => $number_two, 
                    'article_three' => $number_three, 
                    'article_four' => $number_four, 
                    'article_five' => $number_five, 
                    'article_six' => $number_six, 
                    'article_seven' => $number_seven, 
                    'article_eight' => $number_eight, 
                    'article_nine' => $number_nine, 
                    'article_ten' => $number_ten, 
                    'created_at' => $created_at, 
                    'updated_at' => $updated_at
                    ]
                ]);

                DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Create Top KB', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);
                return redirect()->back()->with('message', 'Top KB is successfully Created!');
            }
            else
            {
                DB::table('top_articles')->where('top_articles_id', $check_top->top_articles_id)->update([
                    'waiting_time' => $waiting_message, 
                    'article_one' => $number_one, 
                    'article_two' => $number_two, 
                    'article_three' => $number_three, 
                    'article_four' => $number_four, 
                    'article_five' => $number_five, 
                    'article_six' => $number_six, 
                    'article_seven' => $number_seven, 
                    'article_eight' => $number_eight, 
                    'article_nine' => $number_nine, 
                    'article_ten' => $number_ten
                ]);

                 DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Updated Top KB', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);

                return redirect()->back()->with('message', 'Top KB is successfully Updated!');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ls_top_knowbase(Request $request)
    {
        
        $check_top = DB::table('lstop_articles')->first();
        $count = count($check_top);

        return view('/admin/ls_top_knowledgebase', ['check_top' => $check_top, 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createtopls(Request $request)
    {
        $check_top = DB::table('lstop_articles')->first();
        $count = count($check_top);

        $waiting_message = $request->input('waiting_message');
        $number_one = $request->input('number_one');
        $number_two = $request->input('number_two');
        $number_three = $request->input('number_three');
        $number_four = $request->input('number_four');
        $number_five = $request->input('number_five');
        $number_six = $request->input('number_six');
        $number_seven = $request->input('number_seven');
        $number_eight = $request->input('number_eight');
        $number_nine = $request->input('number_nine');
        $number_ten = $request->input('number_ten');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if (!preg_match('/^[0-9]*$/', $waiting_message)) {
            return redirect()->back()->with('waiting_message', 'Please input numbers only!');
        } 
        else 
        {
           if(! $count)
            {
                DB::table('lstop_articles')->insert([
                [
                    'waiting_time' => $waiting_message, 
                    'article_one' => $number_one, 
                    'article_two' => $number_two, 
                    'article_three' => $number_three, 
                    'article_four' => $number_four, 
                    'article_five' => $number_five, 
                    'article_six' => $number_six, 
                    'article_seven' => $number_seven, 
                    'article_eight' => $number_eight, 
                    'article_nine' => $number_nine, 
                    'article_ten' => $number_ten, 
                    'created_at' => $created_at, 
                    'updated_at' => $updated_at
                    ]
                ]);

                DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Create Top KB LS', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);
                return redirect()->back()->with('message', 'Top LS KB is successfully Created!');
            }
            else
            {
                DB::table('lstop_articles')->where('top_articles_id', $check_top->top_articles_id)->update([
                    'waiting_time' => $waiting_message, 
                    'article_one' => $number_one, 
                    'article_two' => $number_two, 
                    'article_three' => $number_three, 
                    'article_four' => $number_four, 
                    'article_five' => $number_five, 
                    'article_six' => $number_six, 
                    'article_seven' => $number_seven, 
                    'article_eight' => $number_eight, 
                    'article_nine' => $number_nine, 
                    'article_ten' => $number_ten
                ]);

                 DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Updated Top KB LS', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);

                return redirect()->back()->with('message', 'Top LS KB is successfully Updated!');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function what_time()
    {
        
        $waiting = DB::table('waiting_time')->first();
        $count = count($waiting);

        return view('/admin/waiting_time', ['waiting' => $waiting, 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createwait(Request $request)
    {
        $wating = DB::table('waiting_time')->first();
        $count = count($wating);

        $this->validate(request(), [
            'waiting_message' => 'required',
            ]
        );

        $waiting_message = $request->input('waiting_message');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if (!preg_match('/^[0-9]*$/', $waiting_message)) {
            return redirect()->back()->with('waiting_message', 'Please input numbers only!');
        } 
        else 
        {
            if(!$count)
            {
                DB::table('waiting_time')->insert([
                    ['message_time' => $waiting_message, 'created_at' => $created_at, 'updated_at' => $updated_at]
                ]);

                DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Create Top KB', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);
                return redirect()->back()->with('message', 'Waiting Time is successfully Created!');
            }
            else
            {
                DB::table('waiting_time')->where('waiting_time_id', $wating->waiting_time_id)->update([
                    'message_time' => $waiting_message, 
                ]);

                 DB::table('logs')->insert([
                    ['message' => Auth::user()->name.' Updated Waiting Time', 'created_at' => $created_at, 'updated_at' => $updated_at,]
                ]);

                return redirect()->back()->with('message', 'Waiting Time is successfully Updated!');
            }
        }
    }
}
