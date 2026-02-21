@extends('tasks.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Edit task</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" novalidate>
                  @csrf
                  @method("PUT")
                    <div class="mb-3">
                        <label for="title" class="form-label">Task title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $task->title }}">
                      @error('title')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Deadline</label>
                        <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $task->due_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                          <option value="0" @if($task->status == 0) selected @endif>Not started</option>
                          <option value="1" @if($task->status == 1) selected @endif>Processing</option>
                          <option value="2" @if($task->status == 2) selected @endif>Done</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
