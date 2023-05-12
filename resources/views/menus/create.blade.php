@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style= 'background:#dbd7b4;;'>メニュー</div>

                <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                          <p>{{ $message }}</p>
                        @endforeach
                    </div>
                  @endif
                <form action="{{route('menus.store')}}" method="post">
                    @csrf
                <div class="form-floating">
  <textarea class="form-control" name="body" placeholder="ストレッチ×3min" id="floatingTextarea2" style="height: 100px"></textarea>
</div>
  <button type="submit" class="btn text-light mt-3" style='background:#0f8eae;;'>登録する</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection