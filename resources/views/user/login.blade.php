@extends('layout.app')
@section('content')
    <div class="md:w-[60%] m-auto">
        <div class="">
            <h1 class="text-lg text-center pb-3 pt-3 font-bold tracking-widest text-indigo-700 border-b-2">Login Here</h1>
            <div class="w-[70%] m-auto">
               @if (session('failed'))
                <div class="bg-rose-100 border-t-4 border-rose-500 rounded-b text-rose-900 px-4 py-3 mt-3 shadow-md" role="alert">
                    <span class="font-medium">{{ session('failed') }}</span>
                </div>
               @endif
                <form action="{{ url('/login') }}" method="POST" class="pt-4">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="" class="bg-gray-50 border-2  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @if ($errors->has('email'))
                            is-invalid
                            @else
                            border-gray-300
                        @endif" placeholder="E-Mail" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-sm text-rose-600 dark:text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="" class="bg-gray-50 border-2 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @if ($errors->has('password'))
                            is-invalid
                            @else
                            border-gray-300
                        @endif" placeholder="Password">
                        @error('password')
                            <p class="text-sm text-rose-600 dark:text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-2 py-2 text-center dark:blue-600 dark:hover:bg-blue-700 dark:focus:ring-offset-blue-800">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection