<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Task</title>

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

            .top-right {
                padding: 10px 50px;
                left: 10px;
                top: 18px;
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
            <h1>Edit Task: {{ $task->title }}</h1>
        </div>

        <div class="flex-center position-ref full-height">
            <form action="{{ route('tasks.store') }}" method="post">
               {{-- <input type="text" name="_token" value="{{ csrf_token() }}" />--}}
                @csrf
                <label for="title">Title</label>
                <br />
                <input type="text" name="title" id="title" placeholder="Title" value="{{ $task->title }}" />
                <br />
                <label for="description">Description</label>
                <br />
                <textarea name="description" id="description" cols="50" rows="5" placeholder="Description">{{ $task->description) }}</textarea>
                <br />
                <label for="finish_at">Finish at</label>
                <br />
                <input type="datetime-local" name="finish_at"  id="finish_at" pattern="MM-DD-YYYY HH:mm" value="{{ $task->finish_at }}"/>
                <br />
                <br />
                <br />
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="content position-ref validation">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </body>
</html>
