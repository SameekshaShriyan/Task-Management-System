<h2>Create Task</h2>

@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4>Add New Task</h4>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
    <label>Due Date</label>
    <input type="date" name="due_date" class="form-control">
</div>


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Priority</label>
                    <select name="priority" class="form-control">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" selected>Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection

