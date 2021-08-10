<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All Tasks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 40vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .validation {
                color: crimson;
            }
        </style>
    </head>
    <body>
        <div class="content position-ref">
            <h1>Tasks for User</h1>
        </div>
        <div class="flex-center position-ref full-height">
            <table border="1">
                <tr>
                    <td colspan="4" align="center">
                        <form action="{{ route('tasks.search') }}" method="post">
                            @csrf
                            <input type="text" name="filter" id="filter" placeholder="Filter" />
                            <button type="submit">Search</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Finish at
                    </th>
                    <th>
                        ...
                    </th>
                </tr>
                @foreach($tasks as $task)
                    <tr>
                        <td>
                            {{ $task->title }}
                        </td>
                        <td>
                            {{ $task->description }}
                        </td>
                        <td>
                            {{ $task->finish_at }}
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}">Details</a>
                            |
                            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div>
                @if(isset($fields))
                    {{ $tasks->appends($fields)->links() }}
                @else
                    {{ $tasks->links() }}
                @endif
            </div>
            <br />
        </div>

        <div class="content position-ref validation">
            @if(session('msg'))
                <p>
                    {{ session('msg') }}
                </p>
            @endif
        </div>
        <br />
        <div class="content position-ref">
            <a href="{{ route('tasks.new') }}"> New Task </a>
        </div>
    </body>
</html>
