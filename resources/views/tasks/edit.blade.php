
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Task</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">

        <h1>Edit Task</h1>

        <form action="{{ url('/tasks/' . $task->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Task Title</label>

                <input type="text"
                    name="title"
                    class="form-control"
                    value="{{ $task->title }}">
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea name="description"
                    class="form-control">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Task
            </button>

            <a href="{{ url('/') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</body>
</html>
