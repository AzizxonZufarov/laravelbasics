<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{asset('build/assets/app.css')}}" rel="stylesheet">
    </head>
    <body>
    <div  class="container">
        <nav class="row">
            <ul>
                <li><a href="{{ route('main.index')  }}">Main</a> </li>
                <li><a href="{{ route('post.index')  }}">posts</a> </li>
                <li><a href="{{ route('about.index')  }}">about</a> </li>
                <li><a href="{{ route('contact.index')  }}">contact</a> </li>
            </ul>
        </nav>
        @yield('content')
    </div>
    </body>
</html>
