@extends('layout')
@section('content')
<div class="flex justify-center">
    <div class="flex flex-col items-center w-full md:w-7/12 lg:w-5/12">
        @if ($urls->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($urls as $url)
                    <div class="flex flex-col bg-white shadow md:rounded-lg p-4 w-full">
                        <div class="flex items-end justify-center">
                            <h1 class="text-4xl">{{ $url->hits }}</h1>
                            <span class="text-sm uppercase font-bold ml-1">hits</span>
                        </div>
                        <div class="truncate flex items-center justify-center border-2 rounded-lg border-gray-200 py-2 my-2 hover:bg-gray-200 cursor-pointer">
                            <a href="{{ env('APP_URL') . '/' . $url->token }}" target="_blank">{{ env('APP_URL') . '/' . $url->token }}</a>
                        </div>
                        <div class="truncate text-sm uppercase text-gray-400">
                            <span>Base URL: </span>
                            <a href="{{ $url->base_url }}" target="_blank">{{ $url->base_url }}</a>
                        </div>
                        <div class="text-sm uppercase text-gray-400">
                            Created: {{ $url->created_at }}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center text-3xl">
                Create a URL before being able to check the statistics !
            </div>
        @endif
    </div>
</div>
@endsection
