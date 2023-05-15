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
                    <div class="col-4">

                        <table class="table table-striped table-hover">
                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewExpenses['expenses'] as $expeses)
                                    <tr>
                                        <td>{{ $expeses->expense_category }}</td>
                                        <td>&#8369;{{ $expeses->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col">
                        <div id="chartContainer"></div>
                    </div>
                </div>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Data for the chart
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
                                text: 'My Expenses'
                            },
                            series: [{
                                name: 'Amount &#8369;',
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