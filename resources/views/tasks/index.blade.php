@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Your Tasks</h3>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
</div>

@forelse($tasks as $task)
    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="{{ $task->status == 'completed' ? 'text-success text-decoration-line-through' : '' }}">
                        {{ $task->title }}
                    </h5>

                    <p class="text-muted mb-2">{{ $task->description }}</p>

                    <span class="badge {{ $task->status == 'completed' ? 'bg-success' : 'bg-info' }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>

                <span class="badge
                    {{ $task->priority == 'high' ? 'bg-danger' :
                       ($task->priority == 'medium' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                    {{ ucfirst($task->priority) }}
                </span>
            </div>

            @if($task->due_date)
                @php
                    $isOverdue = \Carbon\Carbon::parse($task->due_date)->isPast()
                                 && $task->status !== 'completed';
                @endphp

                <p class="mt-2 {{ $isOverdue ? 'text-danger fw-bold' : 'text-muted' }}">
                    <strong>Due:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}

                    @if($isOverdue)
                        <span class="badge bg-danger ms-2">Overdue</span>
                    @endif
                </p>
            @endif

            <div class="mt-3">
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>

                <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>

                <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success btn-sm">
                        {{ $task->status == 'completed' ? 'Mark Incomplete' : 'Mark Complete' }}
                    </button>
                </form>
            </div>

        </div>
    </div>
@empty
    <div class="alert alert-info">No tasks found.</div>
@endforelse

@endsection
