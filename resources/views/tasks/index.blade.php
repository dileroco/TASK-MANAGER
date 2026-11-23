
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">

        <h1>Task Manager</h1>

        <a href="{{ url('/tasks/create') }}" class="btn btn-primary mb-3">
            Add Task
        </a>

        <table class="table table-bordered">
        <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
        </thead>

        <tbody>
@foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>

            <td>{{ $task->created_at->format('Y-m-d') }}</td>

            <td>{{ $task->status }}</td>

            <td>
                <button></button>
            </td>
        </tr>
    @endforeach
        </tbody>
        </table>

    </div>

</body>
</html>
