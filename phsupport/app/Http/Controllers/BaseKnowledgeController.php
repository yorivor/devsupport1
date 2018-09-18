<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BaseKnowledgeController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listknowledge()
    {
        $menu = 4;

        $knowledge = DB::table('top_articles')->first();
        $count = count($knowledge);

        if(!$count)
        {
            $time = "";
        }
        else
        {
            $time = $knowledge->waiting_time;
        }
    
        return view('tech/knowledgebaselist', ['menu' => $menu, 'time' => $time, 'count' => $count]);
    }

    public function subcatknowledge($id)
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

            return view('tech/subcatknowledge', ['count_outage' => $count_outage, 'knowledgecatid' => $id, 'knowledgecat' => $knowledgecat, 'menu' => $menu]);
        }
    }

    public function sublistknow($id, $subid)
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
                return view('tech/sublistknow', ['count_outage' => $count_outage, 'knowledgecat' => $knowledgecat, 'knowledgecatid' => $id, 'sub_id' => $subid, 'menu' => $menu]);
            }
        }
    }

    public function descknow($id, $subid, $usid)
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

            return view('tech/descknowledge', ['count_outage' => $count_outage, 'knowid' => $id, 'sub' => $subid, 'headings' => $headings, 'title_article' => $title_article, 'content_article' => $content_article, 'menu' => $menu]);
        }
    }

    public function hanap()
    {
        $menu = 5;

        return view('tech/search');
    }

    public function search(Request $request)

    {

        if($request->ajax())
        {

            if(empty($request->search))
            {
                $output="";
            }
            else
            {

                $output="";

                $products=DB::table('knowledge_article')->where('knowledge_article_title','LIKE','%'.$request->search."%")->get();

                if($products)
                {
                    foreach ($products as $key => $product) 
                    {
                        $output.='<a href="'.url('descknow/'.$product->knowledge_category_id.'/'.$product->sub_knowledge_category_id.'/'.$product->  knowledge_article_id).'">'.
                            '<div class="knowlist">'.
                                '<div class="row">'.
                                    '<div class="col-md-10">'.
                                        $product->knowledge_article_title
                                    .'</div>'.
                                    '<div class="col-md-2 text-right">'.
                                        '<div class="glyphicon glyphicon-expand"></div>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.
                        '</a>';
                    }

                    return Response($output);
                }
            }
        }
    }

    public function ticketing()
    {
        $menu = 5;

        return view('tech/ticket');
    }

    public function ticks(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'concern' => 'required',
            'subject' => 'required|max:255',
            'message' => 'required',
            ]
        );

        $email = $request->input('email');
        $concern = $request->input('concern');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $tags = "";

        if($concern == "Dispute Validation")
        {
            $tags = "514e";
        }
        elseif ($concern == "Dispute Follow-up") 
        {
            $tags = "e750";
        }
        else
        {
            $tags = "";
        }

        $ch = curl_init();

        $curl_post_data = array(
            'message' => $message,
            'useridentifier' => $email,
            'departmentid' => 'default',
            'subject' => $concern.': '.$subject,
            'recipient' => 'technicalhelpdesk@51talk.com',
            'tags' => array($tags)
        );

        curl_setopt($ch,CURLOPT_URL,"http://support.51talk.com/api/v3/tickets");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'apikey: 71a6c86a2a12580b3352a4201b086e24'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
        $curl_response=curl_exec($ch);
        if ($curl_response === false) {
            $info = curl_error($ch);
            curl_close($ch);
            die("error occured during curl exec. Additioanl info: " . var_export($info));
        }
        /*echo $curl_response;*/
        curl_close($ch);
        /* process $curl_response here */
        /*print_r(json_decode($curl_response));*/

        return redirect()->back()->with('message', 'Ticket is successfully Created! Just wait for the agent reposnse to your ticket Thank you!');
    }

    public function out_ticket()
    {
        $menu = 5;

        $article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->get();
        $ctech = count($article);

        if(!$ctech)
        {
            return "404 Page not found";
        }
        else
        {
            return view('tech/outage_concern');
        }
    }

    public function outage_concern(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
            ]
        );

        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $ch = curl_init();

        $curl_post_data = array(
            'apikey' => '71a6c86a2a12580b3352a4201b086e24',
            'message' => $message,
            'crossOrigin' => true,
            'useridentifier' => $email,
            'department' => '0ae3a139',
            'subject' => 'Outage Concern: '.$subject,
            'recipient' => 'technicalhelpdesk@51talk.com'
        );

        curl_setopt($ch,CURLOPT_URL,"http://support.51talk.com/api/conversations");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response=curl_exec($ch);
        if ($curl_response === false) {
            $info = curl_error($ch);
            curl_close($ch);
            die("error occured during curl exec. Additioanl info: " . var_export($info));
        }
        curl_close($ch);
        /* process $curl_response here */
        /*print_r(json_decode($curl_response));*/

        return redirect()->back()->with('message', 'Ticket is successfully Created! Just wait for the agent reposnse to your ticket Thank you!');
        
    }
}
