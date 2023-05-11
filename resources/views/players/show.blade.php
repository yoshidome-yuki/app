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
    <div class="row justify-content-center my-3">
        <a href="{{route('players.edit',$player->id)}}"><button class="btn btn-danger">プロフィール編集</button></a>
    </div>
    <div class="row justify-content-center my-3">
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
	//ラベル
	var labels = [
		"2020年1月",
		"2020年2月",
		"2020年3月",
		"2020年4月",
		"2020年5月",
		"2020年6月",
	];
	//平均体重ログ
	var average_weight_log = [
		50.0,	//1月のデータ
		51.0,	//2月のデータ
		52.0,	//3月のデータ
		53.0,	//4月のデータ
		54.0,	//5月のデータ
		49.0	//6月のデータ
	];
	//最大体重ログ
	var max_weight_log = [
		52.0,	//1月のデータ
		54.0,	//2月のデータ
		55.0,	//3月のデータ
		51.0,	//4月のデータ
		57.0,	//5月のデータ
		48.0	//6月のデータ
	];
	//最小体重ログ
	var min_weight_log = [
		48.0,	//1月のデータ
		47.0,	//2月のデータ
		45.0,	//3月のデータ
		44.0,	//4月のデータ
		43.0,	//5月のデータ
		49.0	//6月のデータ
	];

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '平均体重',
					data: average_weight_log,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				{
					label: '最大',
					data: max_weight_log,
					borderColor: "rgba(0,255,0,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				{
					label: '最小',
					data: min_weight_log,
					borderColor: "rgba(255,0,0,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				}
			]
		},
		options: {
			title: {
				display: true,
				text: '体重ログ（６ヶ月平均）'
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
    <div class="row justify-content-center my-3">
        <a href="{{route('diaries.create')}}"><button class="btn btn-primary">日誌登録</button></a>
    </div>
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
                        <td><a href="{{route('diaries.show',$diary->id)}}"><button class="btn text-Secondary" style= 'background:#d3ccd6;;'>詳細</button></a></td>
                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
