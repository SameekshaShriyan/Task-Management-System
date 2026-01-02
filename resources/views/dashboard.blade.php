@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h5>Total Tasks</h5>
                <h3>{{ $totalTasks }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h5>Pending</h5>
                <h3>{{ $pendingTasks }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h5>Completed</h5>
                <h3>{{ $completedTasks }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
