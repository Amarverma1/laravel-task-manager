@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Task List</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-dark">+ Create New Task</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success mb-3">
        {{ session('success') }}
    </div>
    @endif

    @if ($tasks->isEmpty())
    <div class="alert alert-info">
        No tasks found. Start by creating a new one.
    </div>
    @else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($tasks as $task)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($task->description, 100) }}</p>

                        <p class="mb-1"><strong>Created By:</strong> {{ $task->creator->name ?? 'Unknown' }}</p>
                        <p class="mb-1"><strong>Assigned To:</strong> {{ $task->assignedUser->name ?? 'Unassigned' }}</p>
                    </div>

                    <div class="mt-auto">
                        <span class="badge bg-{{ strtolower($task->status) == 'completed' ? 'success' : (strtolower($task->status) == 'in progress' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($task->status) }}
                        </span>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- ------------- NEW LIST VIEW FOR MY TASKS -------------- --}}
    <div class="mt-5">
        <h3 class="h4">My Created Tasks (List View)</h3>
        @if($myTasks->isEmpty())
            <div class="alert alert-info">
                You haven't created any tasks yet.
            </div>
        @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($myTasks as $myTask)
                <tr>
                    <td>{{ $myTask->title }}</td>
                    <td>{{ $myTask->assignedUser->name ?? 'Unassigned' }}</td>
                    <td>
                        <span class="badge bg-{{ strtolower($myTask->status) == 'completed' ? 'success' : (strtolower($myTask->status) == 'in progress' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($myTask->status) }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($myTask->start_date)->format('d M, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($myTask->end_date)->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $myTask->id) }}" class="btn btn-sm btn-outline-warning"> <i class="bi bi-pencil"></i>Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</div>
@endsection
