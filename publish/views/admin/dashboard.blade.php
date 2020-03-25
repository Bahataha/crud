@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9 bodytext">
                <div class="card" >
                    <div class="card-header" style="margin-bottom: 25px; text-align: center; font-size: 30px;">Чеки</div>
                    <div style="display: flex; justify-content: space-around">
                        <div class="card-body" style="width: 400px">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                        <div class="card-body" style="width: 400px">
                            <canvas id="myChart1" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <div class="card-header" style="margin-bottom: 25px; text-align: center; font-size: 30px;">Пользователи</div>
                    <div style="display: flex; justify-content: space-around">
                        <div class="card-body" style="width: 400px">
                            <canvas id="myChart2" width="400" height="400"></canvas>
                        </div>
                        <div class="card-body" style="width: 400px">
                            <canvas id="myChart3" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart1');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $dates1 !!},
                datasets: [{
                    label: 'Общее количество чеков',
                    data: {{$counts1}},
                    backgroundColor: 'rgba(255, 159, 64, 1)',
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            }

        });
    </script>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $dates !!},
                datasets: [{
                    label: 'Чеки по датам',
                    data: {{$counts}},
                    backgroundColor: 'rgba(255, 159, 64, 1)',
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $dates_user !!},
                datasets: [{
                    label: 'Общее количество чеков',
                    data: {{$counts_user}},
                    backgroundColor: 'rgba(255, 159, 64, 1)',
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            }

        });
    </script>
    <script>
        var ctx = document.getElementById('myChart3');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $dates1_user !!},
                datasets: [{
                    label: 'Чеки по датам',
                    data: {{$counts1_user}},
                    backgroundColor: 'rgba(255, 159, 64, 1)',
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            }
        });
    </script>
@endsection
