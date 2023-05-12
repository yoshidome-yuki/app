@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <h3>本日提出された日誌</h3>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <table class="table table-hover">
            <thead class="table-active">
                <tr>
                    <th scope="col">名前</th>
                    <th scope="col">体温</th>
                    <th scope="col">体調</th>
                    <th scope="col">体重</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($diaries as $diary)
                <tr>
                    <td> {{ $diary->user->name }}</td>
                    <td> {!! nl2br(e($diary->temperature)) !!}</td>
                    <td> {!! nl2br(e($diary->condition)) !!}</td>
                    <td> {!! nl2br(e($diary->weight)) !!}</td>
                    <td><a href="{{route('diaries.show',$diary->id)}}"><button class="btn text-light" style= 'background:#68ad9e;;'>詳細</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <h3>選手一覧</h3>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <a href="{{route('admins.create')}}"><button class="btn text-light" style='background:#0f8eae;;'>選手登録</button></a>
    </div>
    <form method="GET" action="{{ route('admins.index') }}">
        <div class="row justify-content-center my-3">
            <div class="col-auto">
                <input type="search" class="form-control" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn text-light mb-3" style='background:#0f8eae;;'>検索</button>
            
                <button class="btn btn-secondary mb-3">
                <a href="{{ route('admins.index') }}" class="text-white">クリア</a>
                </button>
            </div>
        </div>
    </form>
    <div class="row justify-content-around my-3">
        @foreach($players as $player)
        <a href="{{ route('players.show', $player->id) }}" style="color:inherit; text-decoration: none;">
            <div class="card mx-3" style="width: 13rem;">
                <img src="{{ asset('storage/'.$player->icon) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$player->name}}</h5>
                    <p class="card-text">{{$player->position}}</p>
                </div>
            </div>
        </a>
       @endforeach
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <h3>メニュー一覧</h3>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <a href="{{route('menus.create')}}"><button class="btn btn-outline-secondary">メニュー登録</button></a>
    </div>
    <div class="row justify-content-center my-3">
        <table class="table table-hover">
            <thead class="table-active">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <th scope="row">{{$menu->created_at->format('Y-m-d')}}</th>
                    <td> {!! nl2br(e($menu->body)) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <h3>お知らせ一覧</h3>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <a href="{{route('notices.create')}}"><button class="btn btn-outline-primary">お知らせ登録</button></a>
    </div>
    <div class="row justify-content-center my-3">
        <table class="table table-hover">
            <thead class="table-active">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notices as $notice)
                <tr>
                    <th scope="row">{{$notice->created_at->format('Y-m-d')}}</th>
                    <td> {!! nl2br(e($notice->body)) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection