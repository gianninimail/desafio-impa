<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Details Task</title>

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

            .top-right {
                padding: 10px 50px;
                left: 10px;
                top: 18px;
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
        <div class="top-right">
            <a href="{{ route('tasks.all') }}">Home</a>
        </div>

        <div class="content position-ref">
            <h1>Details Task</h1>
        </div>
        <div class="flex-center position-ref full-height">
        <table border="1">
            <tr>
                <th>
                    Title:
                </th>
                <th>
                    {{ $task->title }}
                </th>
            </tr>
            <tr>
                <th>
                    Description:
                </th>
                <th>
                    {{ $task->description }}
                </th>
            </tr>
            <tr>
                <th>
                    Finish at:
                </th>
                <th>
                    {{ $task->finish_at }}
                </th>
            </tr>
            <tr>
                {{--<th colspan="2">
                    <a href="{{ route('tasks.delete', $task->id) }}">Delete</a>
                </th>--}}

                <th colspan="2">
                    <form action="{{ route('tasks.delete', $task->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Delete</button>
                    </form>

                    <form action="{{ route('tasks.completed', $task->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit">Completed</button>
                    </form>
                </th>
            </tr>
        </table>
        </div>

    </body>
</html>
