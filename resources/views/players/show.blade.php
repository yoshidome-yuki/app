@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="card mx-3" style="width: 20rem;">
            <img src="{{ asset('storage/'.$player->icon) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$player->name}}</h5>
                <p class="card-text">{{$player->position}}</p>
                <p class="card-text">{!! nl2br(e($player->goal)) !!}</p>
            </div>
        </div>
    </div>
	@if($player->id==Auth::user()->id || Auth::user()->role==1)
    <div class="row justify-content-center my-3">
        <a href="{{route('players.edit',$player->id)}}"><button class="btn text-light" style= 'background:#eb5252;;'>プロフィール編集</button></a>
    </div>
	@endif
    <div class="row justify-content-center my-3">
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
	//ラベル
	var labels = @json($dates);
	//体重ログ
	var weight_log = @json($weight_log);

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '体重推移',
					data: weight_log,
					borderColor: "#00947a",
         			backgroundColor: "rgba(0,0,0,0)"
				},
			]
		},
		options: {
			title: {
				display: true,
			}
		}
   });
   </script>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <h3>日誌一覧</h3>
        </div>
    </div>
	@if($player->id==Auth::user()->id)
    <div class="row justify-content-center my-3">
        <a href="{{route('diaries.create')}}"><button class="btn text-light" style='background:#0f8eae;;'>日誌登録</button></a>
    </div>
	@endif
    <div class="row justify-content-center my-3">
        <table class="table table-hover">
            <thead class="table-active">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">体温</th>
                    <th scope="col">体調</th>
                    <th scope="col">体重</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($diaries as $diary)
                    <tr>
                        <th scope="row">{{$diary->created_at->format('Y-m-d')}}</th>
                        <td>{{$diary->temperature}}</td>
                        <td>{{$diary->condition}}</td>
                        <td>{{$diary->weight}}</td>
                        <td><a href="{{route('diaries.show',$diary->id)}}"><button class="btn text-light" style='background:#68ad9e;;'>詳細</button></a></td>
                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
