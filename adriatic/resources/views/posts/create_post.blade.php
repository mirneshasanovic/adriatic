@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="pt-3 mt-2">
        <button class="text-gray-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">
            <a href="{{ URL::previous() }}">< Go Back</a>
        </button>
        <h1 class="text-3xl">
            Create Post
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-5">
    <form 
        action="/posts"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="headline"
            placeholder="Headline..."
            class="bg-transparent block border-b-2 w-full h-20 text-3xl outline-none">

        <textarea 
            name="text"
            placeholder="Text..."
            class="py-10 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <button    
            type="submit"
            class="border border-blue-600 text-blue-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-2">
            Submit
        </button>
    </form>
</div>

@endsection