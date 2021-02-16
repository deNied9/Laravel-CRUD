<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="">
    <nav class="p-6 flex justify-between mb-6 border-b-2 border-gray-50 font-medium text-gray-600">
        <ul class="flex items-center">
            <li>
                <a href="/"class="p-3">Home</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('anime.create') }}"class="p-3">Add Anime</a>
                </li>
                <li>
                    <a href="{{ route('anime.index')  }}"class="p-3">MyAnimeList</a>
                </li>
            @endauth
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">User: {{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                        @csrf
                            <button type="submit" class="font-medium text-gray-600">Logout</button>      
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}"class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}"class="p-3">Register</a>
                </li>
            @endguest

        </ul>
    </nav>
    @yield('content')
</body>
</html>
