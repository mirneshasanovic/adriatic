@extends('layouts.app')

@section('content')

<div class="p-4 w-4/5 m-auto">
    <button class="text-gray-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">
        <a href="{{ URL::previous() }}">< Go Back</a>
    </button>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10">
        <p class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@foreach ($posts as $post)
    <div class="hover:bg-white rounded-xl sm:grid grid-cols-1 gap-20 w-4/5 mt-5 mx-auto border-b-4 border-gray-200">
        <div class="p-4">
            <h2 class="sm:rounded-2xl text-gray-700 font-bold text-3xl pb-4">
                {{ $post->headline }}
            </h2>
            <span class="text-gray-500">
                By <span class="font-bold text-gray-800">{{ $post->user->name }}</span><br/>
                Created on: <span class="font-bold text-gray-800">{{ date('jS M Y', strtotime($post->created_at)) }}</span><br/>
                @if (isset(Auth::user()->id) && Auth::user()->is_admin)
                User e-mail: <span class="font-bold text-gray-800">
                                {{ $post->user->email }}
                            </span>
                @endif
            </span>
            <p class="text-align text-xl text-gray-700 pt-2 pb-2 leading-8 font-light pl-2 border-l-2 mt-5 mb-5">
                {{ substr($post->text, 0,  300)  }}...
            </p>
            <div class="keep-reading-and-delete">
                <a href="{{ route('post.show', [$post->id])}}" class="text-gray-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    Read more >
                </a>
    
                @can('view',$post)
                    <span>
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
                    </span>
                @endcan
            </div>
        </div>
    </div>  
@endforeach

@endsection