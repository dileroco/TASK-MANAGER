
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Task</title>

<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">

        <h1>create new task</h1>

        <form action="{{ url('/tasks') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Task Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Save
            </button>

            <a href="{{ url('/tasks') }}" class="btn btn-secondary">
                Cancel
            </a>

</form>

    </div>

</body>
</html>