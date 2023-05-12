<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;
use App\Diary;
use App\Comment;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $diary= new Diary;
        $diary->user_id=Auth::id();
        $diary->comment=$request->comment;
        $diary->temperature=$request->temperature;
        $diary->condition=$request->condition;
        $diary->weight=$request->weight;
        $diary->meal=$request->meal;
        $diary->menu=$request->menu;
        $diary->issue=$request->issue;
        $diary->action=$request->action;
        $diary->save();
        
        return redirect()->route('players.show',Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diary=Diary::find($id);
        $comments = Comment::where('diary_id',$id)->get();
        $log_list = Diary::where("created_at","like",date("Y") . "%")->get();
        return view('diaries.show',[
            'diary'=>$diary,
            'comments'=>$comments,
            'log_list'=>$log_list
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diary=Diary::find($id);
        return view('diaries.edit',[
            'diary'=>$diary
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, $id)
    {
        $diary=Diary::find($id);
        $diary->comment=$request->comment;
        $diary->temperature=$request->temperature;
        $diary->condition=$request->condition;
        $diary->weight=$request->weight;
        $diary->meal=$request->meal;
        $diary->menu=$request->menu;
        $diary->issue=$request->issue;
        $diary->action=$request->action;
        $diary->save();
        return redirect()->route('diaries.show',$diary->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diary=Diary::find($id);
        $diary->delete();
        return redirect()->route('players.show',Auth::id());
    }
}
