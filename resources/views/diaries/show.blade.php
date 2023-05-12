@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="card mx-3" style="width: 60rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{$diary->created_at->format('Y-m-d')}}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="text-secondary">体温</span><p class="card-text">{{$diary->temperature}}</p></li>
                    <li class="list-group-item"><span class="text-secondary">体調</span><p class="card-text">{{$diary->condition}}</p></li>
                    <li class="list-group-item"><span class="text-secondary">体重</span><p class="card-text">{{$diary->weight}}</p></li>
                    <li class="list-group-item"><span class="text-secondary">食事内容</span><p class="card-text">{!! nl2br(e($diary->meal)) !!}</p></li>
                    <li class="list-group-item"><span class="text-secondary">個人練習内容</span><p class="card-text">{!! nl2br(e($diary->menu)) !!}</p></li>
                    <li class="list-group-item"><span class="text-secondary">コメント</span><p class="card-text">{!! nl2br(e($diary->comment)) !!}</p></li>
                    <li class="list-group-item"><span class="text-secondary">課題</span><p class="card-text">{!! nl2br(e($diary->issue)) !!}</p></li>
                    <li class="list-group-item"><span class="text-secondary">アクション</span><p class="card-text">{!! nl2br(e($diary->action)) !!}</p></li>
                </ul>
            </div>
        </div>
    </div>
    @if($diary->user_id==Auth::user()->id)
    <div class="row justify-content-center my-3">
        <a href="{{route('diaries.edit', $diary->id)}}"><button class="btn text-light mr-3" style= 'background:#eb5252;;'>編集</button></a>
        <form action="{{route('diaries.destroy', $diary->id)}}" method="post" class="float-right">
            @csrf
            @method('delete')
            <input type="submit" value="削除" class="btn text-light" style='background:#eb5252;;' onclick='return confirm("削除しますか？");'>
        </form>
    </div>
    @endif
    <div class="row justify-content-center my-3">
        <table class="table table-hover">
            <thead class="table-active">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">コメント</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $cmt)
                <tr>
                    <td>{{$cmt->created_at->format('Y-m-d')}}</td>
                    <td>{!! nl2br(e($cmt->comment)) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(Auth::user()->role==1)
    <form method="POST" action="{{ route('comments.store') }}">
    @csrf
        <div class="row justify-content-center my-1">
            <div class="col-md-8">
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name='comment' rows="3"></textarea>
                    <input type="hidden" value="{{$diary->id}}" name='diary_id'>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-1">
            <div class="col-auto">
                <button type="submit" class="btn text-light mb-3" style='background:#0f8eae;;'>投稿</button>
            </div>
        </div>
    </form>
    @endif
@endsection