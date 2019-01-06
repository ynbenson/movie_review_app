@extends('layouts/app')
@section('contents')
<style>
    #mypage-chart-wrapper {
        width: 100%;
    }
    .mypage-chart {
        float:left;
        width: 50%;
        text-align: center;
    }
</style>
<div id="mypage-profile">
    <div id="mypage-icon">
        @if ($user->avatar_image)
            <img src="{{ asset('storage/avatar/' . $user->avatar_image) }}" alt="avatar" width="240px" />
        @endif
        <!-- <img src="img/himakuro.png" width="240px"/> -->
    </div>
    <div id="mypage-username">test user name</div>

    {!! Form::open(['url' => '/upload_image', 'method' => 'post', 'files' => true]) !!}

    {{--成功時のメッセージ--}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <div class="form-group">

        {!! Form::label('file', '画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
</div>

<div id="mypage-content">
    <h2 class="arrow">Analytics</h2>
    <div id="mypage-chart-wrapper">
        <div class="mypage-chart">
            <canvas id="evaluation-chart"></canvas>
            <p>Total Evaluated Movie Count: 123456</p>
        </div>
        <div class="mypage-chart">
            <canvas id="reviewed-chart"></canvas>
            <p>Total Reviewed Movie Count: 123456</p>
        </div>
    </div>
    <h2 class="arrow">Recently Reviewed Movies</h2>
        aaaa
    <h2 class="arrow">Recommended Movies</h2>
        aaaa
    <h2 class="arrow">Following</h2>
        aaaa
    <h2 class="arrow">Followers</h2>
        aaaa
</div>

<script>
    $(function(){
        var ctx = document.getElementById("evaluation-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["LOVED IT!", "GOOD!", "OK", "BAD!", "SUCKED!"],
                datasets: [{
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        var ctx2 = document.getElementById("reviewed-chart").getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ["ACTION", "MYSTERY", "FANTASY", "COMEDY", "ROMANCE"],
                datasets: [{
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>
@endsection