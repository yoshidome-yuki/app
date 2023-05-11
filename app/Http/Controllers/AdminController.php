<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterData;
use App\User;
use App\Notice;
use App\Menu;
use App\Diary;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role==0){
            return redirect()->route('players.index');
        }
        $today=Carbon::today();
        $players=User::where('role',0)->get();
        $diaries=Diary::whereDate('created_at', $today)->get();
        $notices=Notice::orderBy('created_at', 'desc')->get();
        $menus=Menu::orderBy('created_at', 'desc')->get();
        $search = $request->input('search');
        $query = User::query();
        if($search){
            $spaceConversion = mb_convert_kana($search,'s');
            $wordArraySearched = preg_split('/[\s]+/',$spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value){
                $query->where('name','like','%'.$value.'%');
            }
            $players=$query->where('role',0)->get();
        }


        return view('admins.index',[
            'diaries'=>$diaries,
            'players'=>$players,
            'notices'=>$notices,
            'menus'=>$menus,
            'search'=>$search
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role==0){
            return redirect()->route('players.index');
        }
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterData $request)
    {
        if(Auth::user()->role==0){
            return redirect()->route('players.index');
        }
        $user = new User;

        $icon = request()->file('icon');
        $path = $icon->store('img','public');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position = $request->position;
        $user->icon = $path;
        $user->save();

        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
