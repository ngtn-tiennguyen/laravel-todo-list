<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Todo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border-radius: 12px;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.2rem;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand text-primary" href="{{ url('/') }}">Laravel Todo List</a>
      <div>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary me-2">List Task</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
      </div>
    </div>
  </nav>

  <main class="container py-5">
    @yield('content')
  </main>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  @stack('scripts')
</body>

</html>