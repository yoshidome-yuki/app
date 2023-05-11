@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-dark" style= 'background:#dbd7b4;;'>お知らせ</div>

                <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                          <p>{{ $message }}</p>
                        @endforeach
                    </div>
                  @endif
                <form action="{{route('notices.store')}}" method="post">
                    @csrf
                <div class="form-floating">
  <textarea class="form-control" name="body" placeholder="ここに記入してください" id="floatingTextarea2" style="height: 100px"></textarea>
</div>
  <button type="submit" class="btn btn-primary mt-3">登録する</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection