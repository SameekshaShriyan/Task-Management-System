<h2>Edit Task</h2>

@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4>Edit Task</h4>

        <form method="POST" action="{{ route('tasks.update',$task) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Priority</label>
                    <select name="priority" class="form-control">
                        <option value="low" {{ $task->priority=='low'?'selected':'' }}>Low</option>
                        <option value="medium" {{ $task->priority=='medium'?'selected':'' }}>Medium</option>
                        <option value="high" {{ $task->priority=='high'?'selected':'' }}>High</option>
                    </select>
                </div>
                <form method="POST" action="{{ route('tasks.complete', $task) }}" class="d-inline">
    @csrf
    @method('PATCH')

    <button class="btn btn-success">
        Mark Completed
    </button>
</form>


                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $task->status=='pending'?'selected':'' }}>Pending</option>
                        <option value="completed" {{ $task->status=='completed'?'selected':'' }}>Completed</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-success">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection



