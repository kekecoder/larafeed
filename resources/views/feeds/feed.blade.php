@extends('layout.app')
@section('content')
{{-- {{ dd($feed->user->name) }} --}}
   <div class="md:w-[60%] m-auto p-4 mb-4">
      <a href="{{ url('/feeds') }}" class="text-blue-500 hover:text-white border-2 border-blue-700 hover:bg-blue-500 rounded-lg px-1 py-1">Go Back</a>
      @if (session('success'))
         <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-5 shadow-md" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
         </div>
      @endif
      <p class="text-gray-800 pb-3 mt-4">{{ $feed->description }}</p>
      @if ($feed->upload_img)
         <img src="{{ asset('storage/'.$feed->upload_img) }}" alt="image" class="mb-4">
      @endif
      <div class="flex border-t-2 border-t-slate-500 pt-3">
         <p class="text-gray-500 text-[0.9rem] leading-tight tracking-wide">{{ $feed->created_at->format('h:i A - D d, M Y') }}</p>
         
        
         {{-- {{ dd($feed->user->id) }} --}}
            @can('delete', $feed)
            <form action='{{ url("/feeds/$feed->id") }}' method="post" class="ml-auto">
               @csrf
               @method('delete')
               <button class="text-rose-700 hover:text-rose-300 border-2 border-rose-400 hover:border-rose-800 hover:bg-rose-900 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm text-center py-1 px-2">Delete</button>
            </form>
            @endcan
            
         
      </div>
     <div class="md:w-[60%] mt-4">
         <form action="/comment" method="POST">
            @csrf
            <textarea name="comment" class="block p-2.5 w-full text-gray-900 text-sm bg-gray-50 rounded-lg border-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dar:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-blue-500 resize-none h-[90px] @if ($errors->has('comment'))
               is-invalid
               @else
               border-gray-300
           @endif" placeholder="Comment"></textarea>
            @error('comment')
            <p class="text-sm text-rose-600 dark:text-rose-500">{{ $message }}</p>
            @enderror
            <button class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2.5 text-center mt-2 dark:bg-blue-600 dark:hover:bg-bluue-700 dark;focus:ring-blue-800">Post</button>
         </form>
     </div>
   </div>
@endsection
