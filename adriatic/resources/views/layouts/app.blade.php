<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Adriatic') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen font-sans">
    <header class="shadow-md bg-white py-5 text-black-100">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-800 no-underline">
                    {{ config('app.name', 'Adriatic') }}
                </a>
                <a class="p-4 no-underline font-medium hover:underline" href="{{ route('post.index') }}">Posts</a>
                @if (Auth::check() && !Auth::user()->is_admin)
                    <a href="{{ route('post.create') }}" class="text-grey-600 border border-grey-600  shadow-green-500/50 dark:shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        + Create new post
                    </a>
                @endif
            </div>
            <nav class="space-x-4 text-black-300 text-sm sm:text-base">
                @guest
                    <a class="border rounded-md p-2 no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="border rounded-md p-2 no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    Logged in as <span class="font-bold text-gray-800">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}"
                        class="border rounded-md p-2 no-underline hover:underline"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <div>
        @yield('content')
    </div>
    <div>
        @include('layouts.footer')
    </div>
</body>
</html>
