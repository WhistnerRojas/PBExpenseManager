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


            </div>

        </div>
    </div>
</div>
@endsection