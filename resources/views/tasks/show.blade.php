@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-primary">Task Details</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Tasks</a>
    </div>

    <div class="card shadow-sm border-primary">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">{{ $task->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong class="text-secondary">Description:</strong> {{ $task->description }}</p>

            <p>
                <strong class="text-secondary">Status:</strong>
                @if($task->status == 'Pending')
                <span class="badge bg-warning text-dark">Pending</span>
                @elseif($task->status == 'In Progress')
                <span class="badge bg-info text-dark">In Progress</span>
                @elseif($task->status == 'Completed')
                <span class="badge bg-success">Completed</span>
                @endif
            </p>

            <p><strong class="text-secondary">Start Date:</strong> {{ \Carbon\Carbon::parse($task->start_date)->format('d M, Y') }}</p>
            <p><strong class="text-secondary">End Date:</strong> {{ \Carbon\Carbon::parse($task->end_date)->format('d M, Y') }}</p>
            <p><strong class="text-secondary">Assigned To:</strong> {{ $task->user->name }}</p>
        </div>

        <div class="card-footer bg-light d-flex justify-content-end">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-primary me-2">Edit</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
