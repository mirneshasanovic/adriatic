@extends('layouts.app')

@section('content')

<div class="pt-4 w-4/5 m-auto">
    <button class="text-gray-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">
        <a href="{{ URL::previous() }}">< Go Back</a>
    </button>
</div>

<div class="w-4/5 m-auto text-left">
    <div class="pt-3 mt-2">
        <h1 class="text-3xl">
            {{ $post->headline }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-5">
    By <span class="font-bold text-gray-800">{{ $post->user->name }}</span><br/>
        Created on: <span class="font-bold text-gray-800">{{ date('jS M Y', strtotime($post->created_at)) }}</span><br/>
    @if (isset(Auth::user()->id) && Auth::user()->is_admin)
        User e-mail: <span class="font-bold italic text-gray-800">
                        {{ $post->user->email }}
                    </span>
    @endif
    <p class="text-justify text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->text }}
    </p>
</div>

@if (isset(Auth::user()->id) && (Auth::user()->id == $post->user_id || Auth::user()->is_admin))
    <div class="pt-15 w-4/5 m-auto">
        <form 
            action="{{ route('post.delete', [$post->id])}}"
            method="POST">
            @csrf
            @method('delete')

            <button
                class="border border-red-600 text-red-600 hover:bg-to-red focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                type="submit">
                Delete
            </button>
        </form>
    </div>
@endif

@endsection 