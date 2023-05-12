@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <div class="card border border-secondary"style= 'background:#f8f4e6;'>
                <div class="card-header border-secondary text-dark" style= 'background:#dbd7b4;'>お知らせ</div>
                <div class="card-body" >
                    @if($notice)
                {!! nl2br(e($notice->body)) !!}
                @else
                お知らせはありません
                @endif
            </div>
            </div>
            
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card border border-secondary"style= 'background:#f8f4e6;'>
            <div class="card-header border-secondary text-dark" style= 'background:#dbd7b4;;'>本日の全体メニュー</div>
                <div class="card-body">
                @if($menu)
                {!! nl2br(e($menu->body)) !!}
                @else
                お知らせはありません
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card border border-secondary"style= 'background:#f8f4e6;'>
            <div class="card-header border-secondary text-dark" style= 'background:#dbd7b4;;'>前日の全体メニュー</div>
                <div class="card-body">
                @if($last_menu)
                {!! nl2br(e($last_menu->body)) !!}
                @else
                お知らせはありません
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center"><h3>選手一覧</h3></div>
    </div>
    <div class="row justify-content-center my-3">
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
</div>
</div>
@endsection