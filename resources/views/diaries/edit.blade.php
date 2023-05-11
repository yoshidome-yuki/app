@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-dark" style='background:#dbd7b4;;'>編集</div>

                <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                      @endforeach
                    </div>
                  @endif
                    <form method="POST" action="{{ route('diaries.update',$diary->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="comment" class="form-label">コメント</label>
                            <textarea class="form-control" id="comment" name="comment">{{$diary->comment}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="temperature" class="form-label">体温</label>
                            <input type="number" step="0.1" class="form-control" id="temperature" name="temperature" value="{{$diary->temperature}}">
                        </div>

                        <div class="mb-3">
                            <label for="condition" class="form-label">体調</label>
                            <input type="text" class="form-control" id="condition" name="condition" value="{{$diary->condition}}">
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">体重</label>
                            <input type="number" step="0.1" class="form-control" id="weight" name="weight" value="{{$diary->weight}}">
                        </div>

                        <div class="mb-3">
                            <label for="meal" class="form-label">食事内容</label>
                            <textarea class="form-control" id="meal" name="meal">{{$diary->meal}}</textarea>
                        </div>

                        <div class="mb-3">
                        <label for="menu" class="form-label">個人練習内容</label>
                            <textarea class="form-control" id="menu" name="menu">{{$diary->menu}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="issue" class="form-label">課題</label>
                            <textarea class="form-control" id="issue" name="issue">{{$diary->issue}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="action" class="form-label">アクション</label>
                            <textarea class="form-control" id="action" name="action">{{$diary->action}}</textarea>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection