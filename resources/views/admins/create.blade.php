@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-datk" style= 'background:#dbd7b4;;'>選手登録</div>

                <div class="card-body">
                  @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                          <p>{{ $message }}</p>
                        @endforeach
                    </div>
                  @endif
                    <form method="POST" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="icon" class="form-label">選手画像</label>
                            <input type="file" class="form-control " id="icon" name="icon">
                        </div>

                        <div class="mb-3">
                            <label for="player-name" class="form-label">選手名</label>
                            <input type="text" class="form-control " id="player-name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">ポジション</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">メールアドレス</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">パスワード</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">パスワード確認</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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