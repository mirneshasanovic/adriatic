@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-gray-800 text-5xl font-bold text-shadow-md pb-14">
                    Adriatic makes it easy for you to start your own blog.
                </h1>
                <h1 class="sm:text-gray-800 text-5xl font-bold text-shadow-md pb-14">
                    Signup for free to start sharing your ideas.
                </h1>
                <a  href="{{ route('post.index') }}"
                    class="border border-blue-600 text-blue-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    See all posts >
                </a>
            </div>
        </div>
    </div>
@endsection