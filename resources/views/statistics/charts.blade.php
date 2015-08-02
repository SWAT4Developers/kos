@extends('layouts.main')
@section('meta-desc','Server statistics in charts view')
@section('title','Charts')

@section('main-container')
    <div class="col-md-9">
        @include('partials._statistics-navbar')

        <body>
        <!--Div that will hold the pie chart-->
        <div id="chart_div"></div>
        </body>
@endsection

@section('scripts')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

            <script type="text/javascript">

                // Load the Visualization API and the piechart package.
                google.load('visualization', '1.0', {'packages':['corechart']});

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                        ['Mushrooms', 3],
                        ['Onions', 1],
                        ['Olives', 1],
                        ['Zucchini', 1],
                        ['Pepperoni', 2]
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
@endsection