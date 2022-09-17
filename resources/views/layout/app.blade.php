<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @vite('resources/css/app.css')
    <title>All Feeds</title>

</head>
<body class="bg-gray-100">
    <div class="bg-gray-100">
        <nav class="flex pt-3 mb-3">
            <a href="" class="ml-4 text-lg tracking-widest"><span class="border-b-4 border-b-indigo-700 pb-1">laraFeed</span></a>
            <ul class="flex ml-auto pr-3">
                @guest
                    <li class="pl-3 pr-3 border-2 border-indigo-600 hover:bg-indigo-400 hover:text-white rounded-lg mr-2 uppercase"><a href="{{ url('/register') }}">register</a></li>
                    <li class="pl-3 pr-3 border-2 border-indigo-600 hover:bg-indigo-400 hover:text-white rounded-lg mr-2 uppercase"><a href="{{ url('/login') }}">login</a></li>
                @endguest
                @auth
                    <li class="pl-3 pr-3 border-2 border-indigo-600 hover:bg-indigo-400 hover:text-white rounded-lg mr-2 capitalize"><a href="{{ url('/feeds') }}"> home</a></li>
                    <li class="pl-3 pr-3 border-2 border-indigo-600 hover:bg-indigo-400 hover:text-white rounded-lg mr-2 capitalize">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                    </li>
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button class="pl-3 pr-3 border-2 border-rose-600 text-rose-700 rounded-lg mr-2 capitalize">Logout</button>
                    </form> 
                @endauth
            </ul>
        </nav>
        @yield('content')
    </div>
</body>
</html>