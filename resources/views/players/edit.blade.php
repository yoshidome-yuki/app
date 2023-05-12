@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-dark" style= 'background:#dbd7b4;;'>プロフィール編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('players.update',$player->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="player-name" class="form-label">選手名</label>
                            <input type="text" class="form-control " id="player-name" name="name" value="{{$player->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="goal" class="form-label">目標</label>
                            <textarea class="form-control" id="goal" name="goal">
                                {{$player->goal}}
                            </textarea>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"class="btn text-light" style='background:#0f8eae;;'>
                                    編集する
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