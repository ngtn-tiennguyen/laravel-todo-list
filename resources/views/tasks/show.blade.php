@extends('tasks.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Task Description</h5>
                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body">
                <h4 class="fw-bold mb-3">{{ $task->title }}</h4>
                <p class="text-muted"><strong>Description:</strong></p>
                <p>{{ $task->description ?? 'Not description...' }}</p>
                <p><strong>Deadline:</strong> <span class="badge bg-danger">{{ $task->due_date }}</span></p>
                <p><strong>Status:</strong>
                 @switch($task->status)
                   @case(0)
                    <span class="badge bg-warning">Not started</span></td>
                   @break
                    @case(1)
                    <span class="badge bg-primary">Processing</span></td>
                   @break
                    @case(2)
                    <span class="badge bg-success">Done</span></td>
                   @break

                   @default
                    <span class="badge bg-warning">Not started</span></td>
                   @break
                @endswitch
                </p>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;"
                      onsubmit="return confirm('Do you want to delete this task?')">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
