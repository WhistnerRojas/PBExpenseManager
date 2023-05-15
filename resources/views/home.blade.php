@php
    $layout = Auth::check() ? 'layouts.dashboard' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card pieChart">
            <div class="card-header">My Expenses</div>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <?php
                            foreach($viewExpenses['expenses'] as $expeses){
                                echo "<h5>$expeses->expense_category = &#8369;$expeses->amount</h5>";
                            }
                        ?>
                    </div>
                    <div class="col">
                        <div id="chartContainer"></div>
                    </div>
                </div>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Data for the chart (replace with your own data)
                        var data = [<?php 
                            foreach($viewExpenses['expenses'] as $expeses){
                                echo "['$expeses->expense_category', $expeses->amount],";
                            }
                        ?>];
                        // var data = [
                        //     ['Category 1', 20],
                        //     ['Category 2', 30],
                        //     ['Category 3', 50]
                        // ];
                        // Create the chart
                        Highcharts.chart('chartContainer', {
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Pie Chart'
                            },
                            series: [{
                                name: 'Categories',
                                data: data
                            }]
                        });
                    });
                </script>

            </div>

        </div>
    </div>
</div>
@endsection