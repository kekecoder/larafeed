@extends('layout.app')

@section('content')
<div class="container m-auto">
    @if (session('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @elseif (session('delete'))
        <div class="bg-rose-100 border-t-4 border-rose-500 rounded-b text-rose-900 px-4 py-3 shadow-md" role="alert">
            <span class="font-medium">{{ session('delete') }}</span>
        </div>
    @endif
    <h1 class="text-center mb-3 mt-3 font-semibold text-purple-500 text-lg">All Feeds</h1>
    <div class="w-[90%] m-auto">
        <form action="{{ url('/feeds') }}" method="POST">
            @csrf
            <textarea name="description" class="form-textarea rounded-2xl border-b-4 border-indigo-400 w-[100%] @error('description')
                border-rose-400
            @enderror"></textarea>
            @error('description')
                <div class="text-rose-800">
                    {{ $message }}
                </div>
            @enderror
    
            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow mt-2 mb-2">Create Story</button>
        </form>
    </div>
    <div class="w-[90%] m-auto">
        <div class="grid grid-cols-1 divide-y-8">
            @foreach ($feeds as $feed)
                <div class="px-4 py-3">
                    <p class="mx-3 mb-2"><a href='{{ url("/feeds/$feed->id") }}'>{{ $feed->description }}</a></p>
                    <p class="mx-3 text-gray-400">{{ $feed->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    </div>
    {{ $feeds->links() }}
    </div>
    
@endsection