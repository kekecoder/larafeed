@extends('layout.app')

@section('content')
<div class="md:w-[60%] m-auto">
    @if (session('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-5 shadow-md" role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @elseif (session('delete'))
        <div class="bg-rose-100 border-t-4 border-rose-500 rounded-b text-rose-900 px-4 py-3 mt-5 shadow-md" role="alert">
            <span class="font-medium">{{ session('delete') }}</span>
        </div>
    @elseif (session('register'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-5 shadow-md" role="alert">
            <span class="font-medium">{{ session('register') }}</span>
        </div>
    @elseif (session('login'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-5 shadow-md" role="alert">
            <span class="font-medium">{{ session('login') }}</span>
        </div>
    @elseif (session('logout'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-5 shadow-md" role="alert">
            <span class="font-medium">{{ session('logout') }}</span>
        </div>
    @endif
    <h1 class="text-center mb-3 pt-4 font-semibold text-purple-500 text-lg">All Feeds</h1>
    @auth
    <div class="w-[90%] m-auto">
        <form action="{{ url('/feeds') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <textarea name="description" class="form-textarea rounded-2xl h-[10rem] resize-none border-b-4 w-[100%] @if ($errors->has('description'))
                    is-invalid
                    @else 
                    border-indigo-400
                @endif"></textarea>
            @error('description')
                <div class="text-rose-700">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="flex justify-end mt-2">
                <input type="file" name="upload_img" id="" class="w-[36%] text-sm text-white rounded-sm border-none bg-indigo-400">
            </div>
            @error('upload_img')
            <div class="text-rose-800">
                {{ $message }}
            </div>
        @enderror
            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow mt-2 mb-2">Create Story</button>
        </form>
    </div>
    @endauth
    <div class="w-[90%] m-auto">
        <div class="grid grid-cols-1 divide-y-2 divide-slate-400">
            @foreach ($feeds as $feed)
                <div class="px-4 py-3">
                    <p class="text-gray-800 mx-3 mb-2"><a href='{{ url("/feeds/$feed->id") }}'>{{ $feed->description }}</a>
                        <img src="{{ asset('storage/'.$feed->upload_img) }}" alt="">
                    </p>
                   
                    <p class="mx-3 text-gray-500">{{ $feed->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    </div>
    {{ $feeds->links() }}
    </div>
    
@endsection