
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

            <td>
            @if ($task->status == 'Completed')
                <span class="badge badge-success">
                    Completed
                </span>
            @else
                <span class="badge badge-warning">
                    Pending
                </span>
            @endif
            </td>

            <td>
                <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <button type="button"
                        class="btn btn-danger btn-sm"
                        data-toggle="modal"
                        data-target="#deleteModal{{ $task->id }}">
                    Delete
                </button>
                <div class="modal fade" id="deleteModal{{ $task->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>

                <button type="button" class="close"
                        data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this task?
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ url('/tasks/' . $task->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Yes, Delete
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>
            </td>
        </tr>
    @endforeach
        </tbody>
        </table>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
