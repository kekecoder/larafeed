@extends('layout.app')
@section('content')
   <div class="md:w-[60%] m-auto p-4 mb-4">
      <a href="{{ url('/feeds') }}" class="text-blue-500 hover:text-white border-2 border-blue-700 hover:bg-blue-500 rounded-lg px-1 py-1">Go Back</a>
      <p class="text-gray-800 pb-3 mt-4">{{ $feed->description }}</p>
      @if ($feed->upload_img)
         <img src="{{ asset('storage/'.$feed->upload_img) }}" alt="image" class="">
      @endif
      <div class="flex border-t-2 border-t-slate-500 pt-3">
         <p class="text-gray-500 text-[0.9rem] leading-tight tracking-wide">{{ $feed->created_at->format('h:i A - D d, M Y') }}</p>
         <form action='{{ url("/feeds/$feed->id") }}' method="post" class="ml-auto">
            @csrf
            @method('delete')
            <button class="text-rose-700 hover:text-rose-300 border-2 border-rose-400 hover:border-rose-800 hover:bg-rose-900 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm text-center py-1 px-2">Delete</button>
         </form>
      </div>
   </div>
@endsection
