<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 1rem 0;
            text-align: center;
        }

        input[name="title"] {
            padding: 0.5rem;
            font-size: 1rem;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
            border: none;
            background: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #218838;
        }

        ul {
            list-style-type: none;
            padding: 0;
            max-width: 600px;
            margin: 2rem auto;
        }

        li {
            background: white;
            margin-bottom: 10px;
            padding: 0.75rem;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in;
        }

        input[type="checkbox"] {
            transform: scale(1.2);
            margin-right: 1rem;
            cursor: pointer;
        }

        li form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        li form:last-child button {
            background: #dc3545;
        }

        li form:last-child button:hover {
            background: #c82333;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>

    <form method="POST" action="/todos">
        @csrf
        <input name="title" placeholder="New Task" required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>
                <form method="POST" action="/todos/{{ $todo->id }}">
                    @csrf @method('PATCH')
                    <input type="checkbox" {{ $todo->is_completed ? 'checked' : '' }} onChange="this.form.submit()">
                    <span style="{{ $todo->is_completed ? 'text-decoration: line-through; color: gray;' : '' }}">
                        {{ $todo->title }}
                    </span>
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
