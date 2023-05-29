<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notice;
use App\Menu;
use App\User;
use App\Diary;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 1) {
            return redirect()->route('admins.index');
        }
        $players=User::where('role',0)->get();
        $notice=Notice::latest()->first();
        $menu=Menu::latest('id')->first();
        $last_menu=Menu::latest('id')->offset(1)->limit(1)->first();
        
      

        return view('players.index',[
            'notice'=>$notice,
            'menu'=>$menu,
            'last_menu'=>$last_menu,
            'players'=>$players
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weight_log = [];
        $dates = [];
        $player=User::find($id);
        $diaries=Diary::where('user_id',$id)->get();

        $logs=Diary::where('user_id',$id)->orderBy('created_at', 'desc')->limit(7)->get();
        foreach($logs as $log){
            $weight_log[] = $log->weight; 
            $dates[] = $log->created_at->format('Y/m/d');
        }
        $sorted = array_reverse($dates);

        return view('players.show',[
            'player'=>$player,
            'diaries'=>$diaries,
            'dates' => $sorted,
            'weight_log'=>$weight_log, 
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
        $player=User::find($id);
        return view('players.edit',[
            'player'=>$player

        ]
        );}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = new User;
        $player=User::find($id);
        $player->name = $request->name;
        $player->goal = $request->goal;
        $player->save();

        return redirect()->route('players.show',$id);
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
