<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST" action="/todos">
        @csrf
        <input name="title" placeholder="New Task">
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>
                <form method="POST" action="/todos/{{ $todo->id }}">
                    @csrf @method('PATCH')
                    <input type="checkbox" {{ $todo->is_completed ? 'checked' : '' }} onChange="this.form.submit()">
                    {{ $todo->title }}
                </form>
                <form method="POST" action="/todos/{{ $todo->id }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
