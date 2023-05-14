@php
    $layout = Auth::check() ? 'layouts.dashboard' : 'layouts.app';
@endphp

@extends($layout)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">

                <h1>{{ $chart1->options['chart_title'] }}</h1>
                {!! $chart1->renderHtml() !!}

            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection