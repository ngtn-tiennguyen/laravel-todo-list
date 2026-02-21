@extends('tasks.layout')

@section('content')
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<div class="card shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">List task todo</h5>
    <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">Create Task</a>
  </div>
  <div class="card-body">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Task</th>
          <th>Deadline</th>
          <th>Status</th>
          <th class="text-end">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($listTask as $task)
          <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->due_date}}</td>
            <td>
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
              
            <td class="text-end">
              <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info text-white">Show</a>
              <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;"
                onsubmit="return confirm('Do you want to delete this task?')">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" align="center">No data found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection