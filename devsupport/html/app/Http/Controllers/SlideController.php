<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class SlideController extends Controller
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
        return view('/admin/slide_management');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/add_slide');
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
            'slide_title' => 'required|max:255',
            'slide_url' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'filepath' => 'required',
            ]
        );

        $slide_title = $request->input('slide_title');
        $slide_url = $request->input('slide_url');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $filepath = $request->input('filepath');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_start = date('Y-m-d',strtotime($start_date));
        $date_end = date('Y-m-d',strtotime($end_date));

        DB::table('slide')->insert([
            ['title' => $slide_title, 'url' => $slide_url, 'image' => $filepath, 'start_date' => $date_start, 'end_date' => $date_end, 'created_at' => $created_at, 'updated_at' => $updated_at]
        ]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Created slide', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Slide is successfully Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slideshow = DB::table('slide')->where('slide_id', $id)->first();
        $start_date = date('m/d/Y', strtotime($slideshow->start_date));
        $end_date = date('m/d/Y', strtotime($slideshow->end_date));

        return view('/admin/edit_slide', ['slideshow' => $slideshow, 'start_date' => $start_date, 'end_date' => $end_date, 'id' => $id]);
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
            'slide_title' => 'required|max:255',
            'slide_url' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'filepath' => 'required',
            ]
        );

        $slide_title = $request->input('slide_title');
        $slide_url = $request->input('slide_url');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $filepath = $request->input('filepath');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $date_start = date('Y-m-d',strtotime($start_date));
        $date_end = date('Y-m-d',strtotime($end_date));

        DB::table('slide')->where('slide_id', $id)->update(['title' => $slide_title, 'url' => $slide_url, 'image' => $filepath, 'start_date' => $date_start, 'end_date' => $date_end]);

        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Update slide', 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Outage is successfully Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('slide')->where('slide_id', $id)->delete();
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::table('logs')->insert([
            ['message' => Auth::user()->name.' Delete Slide id: '.$id, 'created_at' => $created_at, 'updated_at' => $updated_at,]
        ]);

        return redirect()->back()->with('message', 'Slide is successfully Deleted!');
    }
}
