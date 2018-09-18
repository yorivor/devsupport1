<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$article_outage = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
    	$count_outage = count($article_outage);


        // waiting time
        $waiting_time = DB::table('waiting_time')->first();


        return view('index', ['count_outage' => $count_outage, 'article_outage' => $article_outage, 'waiting_time' => $waiting_time]);
    }

    public function outage($id)
    {
        $menu = 3;

    	$article_outage = DB::table('article')->where('article_category', 'Outage')->where('article_id', $id)->where('article_active', 'Active')->first();
    	$count_outage = count($article_outage);
    	if(!$count_outage)
    	{
			return "404 Page not found";
    	}
    	else
    	{
    		return view('outage', ['article_outage' => $article_outage, 'count_outage' => $count_outage, 'menu' => $menu]);
    	}
    }

    public function agent()
    {
        $menu = 5;

        $article_outage = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->get();
        $count_outage = count($article_outage);
        if(!$count_outage)
        {
    	   return "404 Page not found";
        }
        else
        {
            return view('agent', ['menu' => $menu]);
        }
    }

    public function downtime($id)
    {
        $menu = 3;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        $article_outage = DB::table('article')->where('article_category', 'Downtime Advisory')->where('article_id', $id)->first();
        $countoutage = count($article_outage);

        if(! $countoutage)
        {
            return "404 Page not found";
        }
        else
        {

            return view('downtime', ['article_outage' => $article_outage, 'count_outage' => $count_outage, 'menu' => $menu]);
        }
    }

    public function articlelist()
    {
        $menu = 3;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        return view('articlelist', ['count_outage' => $count_outage, 'menu' => $menu]);
        
    }

    public function knowledgelist()
    {
        $menu = 4;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        return view('knowledgebase', ['count_outage' => $count_outage, 'menu' => $menu]);
    }

    public function knowledgesubcat($id)
    {
        $menu = 4;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        $knowledgecat = DB::table('knowledge_category')->where('knowledge_category_id', $id)->first();
        $count = count($knowledgecat);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {

            return view('knowledgebasecat', ['count_outage' => $count_outage, 'knowledgecatid' => $id, 'knowledgecat' => $knowledgecat, 'menu' => $menu]);
        }
    }

    public function knowledgesublist($id, $subid)
    {
        $menu = 4;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        $knowledgecat = DB::table('knowledge_category')->where('knowledge_category_id', $id)->first();
        $count = count($knowledgecat);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            $knowledgesub = DB::table('sub_knowledge_category')->where('knowledge_category_id', $id)->where('id', $subid)->get();
            $counting = count($knowledgesub);

            if(! $counting)
            {
                return "404 Page not found";
            }
            else
            {
                return view('knowledgebasesub', ['count_outage' => $count_outage, 'knowledgecat' => $knowledgecat, 'knowledgecatid' => $id, 'sub_id' => $subid, 'menu' => $menu]);
            }
        }
    }

    public function knowdesc($id, $subid, $usid)
    {
        $menu = 4;

        $outageing = DB::table('article')->where('article_category', 'Outage')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
        $count_outage = count($outageing);

        $knowledgecat = DB::table('knowledge_category')->where('knowledge_category_id', $id)->first();
        $count = count($knowledgecat);

        if(! $count)
        {
            return "404 Page not found";
        }
        else
        {
            $knowledgesub = DB::table('sub_knowledge_category')->where('knowledge_category_id', $id)->where('id', $usid)->first();
            $count = count($knowledgesub);

            if(! $count)
            {
                $knowledge_article = DB::table('knowledge_article')->where('knowledge_article_id', $usid)->where('knowledge_category_id', $id)->where('sub_knowledge_category_id', $subid)->first();
                $countarticle = count($knowledge_article);

                if(! $countarticle)
                {
                    return "404 Page not found";
                }
                else
                {
                    $title_article = $knowledge_article->knowledge_article_title;
                    $content_article = $knowledge_article->knowledge_article_content;
                    $headings = $knowledgecat->category;
                }
            }
            else
            {
                $knowledge_article = DB::table('knowledge_article')->where('knowledge_category_id', $id)->where('sub_knowledge_category_id', $usid)->first();
                $countarticle = count($knowledge_article);

                if(!$countarticle)
                {
                    return "404 Page not found";
                }
                else
                {
                    $title_article = $knowledge_article->knowledge_article_title;
                    $content_article = $knowledge_article->knowledge_article_content;
                    $headings = $knowledgecat->category." - ".$knowledgesub->sub_category;
                }
            }

            return view('knowledgedesc', ['count_outage' => $count_outage, 'knowid' => $id, 'sub' => $subid, 'headings' => $headings, 'title_article' => $title_article, 'content_article' => $content_article, 'menu' => $menu]);
        }
    }

    public function whatshot()
    {
        $menu = 5;

        $whatshot_cat = DB::table('whatshot_cat')->orderBy('what_id', 'desc')->paginate(10);
        $count= count($whatshot_cat);

        return view('whatshot', ['whatshot_cat' => $whatshot_cat,'count' => $count, 'menu' => $menu]);
    }

    public function whatshotlist($id)
    {
        $menu = 5;

        $whatshot_cat = DB::table('whatshot_cat')->where('what_id', $id)->first();
        $count= count($whatshot_cat);

        if(!$count)
        {
            return "404 Page not found";
        }
        else
        {
            return view('whatshotlist', ['whatshot_cat' => $whatshot_cat, 'id' => $id, 'menu' => $menu]);
        }
    }

    public function whatshotdesc($id, $hotid)
    {
        $menu = 5;

        $whatshot_cat = DB::table('whatshot_cat')->where('what_id', $id)->first();
        $count= count($whatshot_cat);

        if(!$count)
        {
            return "404 Page not found";
        }
        else
        {
            $whatshot = DB::table('whatshot')->where('category', $id)->first();
            $counting = count($whatshot);

            if(!$counting)
            {
                return "404 Page not found";
            }
            else
            {
                return view('whatshotdesc', ['whatshot_cat' => $whatshot_cat, 'whatshot' => $whatshot, 'id' => $id, 'menu' => $menu]);
            }
        }
    }

}
