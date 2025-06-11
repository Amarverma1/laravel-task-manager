@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Task</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Tasks</a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <h5>There were some problems with your input:</h5>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                {{-- Hidden creator --}}
                <input type="hidden" name="user_id" value="{{ $task->user_id }}">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $task->title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required value="{{ old('start_date', $task->start_date) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" required value="{{ old('end_date', $task->end_date) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Assign To</label>
                    <select name="assigned_to" class="form-select" required>
                        <option value="">-- Select User --</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button class="btn btn-success">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
