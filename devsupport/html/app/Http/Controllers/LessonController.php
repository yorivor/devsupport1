<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lstoparticles()
    {
        $menu = 4;

        $knowledge = DB::table('lstop_articles')->first();
        $count = count($knowledge);

        if(!$count)
        {
            $time = "";
        }
        else
        {
            $time = $knowledge->waiting_time;
        }
    
        return view('ls/knowledgebaselist', ['menu' => $menu, 'time' => $time, 'count' => $count]);
    }

    public function lssubcatknowledge($id)
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

            return view('ls/subcatknowledge', ['count_outage' => $count_outage, 'knowledgecatid' => $id, 'knowledgecat' => $knowledgecat, 'menu' => $menu]);
        }
    }

    public function lssublistknow($id, $subid)
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
                return view('ls/sublistknow', ['count_outage' => $count_outage, 'knowledgecat' => $knowledgecat, 'knowledgecatid' => $id, 'sub_id' => $subid, 'menu' => $menu]);
            }
        }
    }

    public function lsdescknow($id, $subid, $usid)
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

            return view('ls/descknowledge', ['count_outage' => $count_outage, 'knowid' => $id, 'sub' => $subid, 'headings' => $headings, 'title_article' => $title_article, 'content_article' => $content_article, 'menu' => $menu]);
        }
    }

    public function lsticketing()
    {
        $menu = 5;

        return view('ls/ticket');
    }

    public function lsticks(Request $request)
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

        $ch = curl_init();

        $curl_post_data = array(
            'message' => $message,
            'useridentifier' => $email,
            'departmentid' => '0c2a5465',
            'subject' => $concern.': '.$subject,
            'recipient' => 'technicalhelpdesk@51talk.com'
        );

        curl_setopt($ch,CURLOPT_URL,"http://support.51talk.com/api/v3/tickets");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'apikey: 41266676e67651ea313599e541ed1962'
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
}
