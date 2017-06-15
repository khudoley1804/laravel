@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
      
                @foreach($users as $user)
                    
                    <h2>{{ $user->name }}</h2>
                    <p>ip - {{ Illuminate\Support\Facades\Cache::get('users#'.$user->id)['ip'] }}</p>
                    <p>time - {{ Illuminate\Support\Facades\Cache::get('users#'.$user->id)['time'] }}</p>

                @endforeach                   


                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                  // Callback that creates and populates a data table,
                  // instantiates the pie chart, passes in the data and
                  // draws it.
                  function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                      ['login', {{$visits['login']}}],
                      ['user', {{$visits['user']}}],
                      ['home', {{$visits['home']}}],
                      ['logout', {{$visits['logout']}}],
                      ['home/add-visits', {{$visits['home/add-visits']}}],
                      ['/', {{$visits['/']}}]
                    ]);

                    // Set chart options
                    var options = {'title':'How Much Pizza I Ate Last Night',
                                   'width':400,
                                   'height':300};

                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>

                <div id="chart_div"></div>


                    <a href="{{ route('home.add-visits') }}">Сохранить визиты</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
