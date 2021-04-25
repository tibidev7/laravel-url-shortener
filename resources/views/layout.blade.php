<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script>
        <title>{{ env('APP_NAME') }}</title>
    </head>
    <body class="antialiased bg-gray-100">
        <div id="app">
            <navbar app_name="{{ env('APP_NAME') }}" user_fetched="{{ Auth::user() }}" route="{{ Route::currentRouteName() }}"></navbar>
            <div>
                @if ($errors->any())
                    <div class="flex items-center justify-center">
                        <div class="bg-red-500 shadow md:rounded-md w-full md:w-7/12 lg:w-5/12 p-4 text-white font-medium mb-6">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (session()->has('token'))
                    <div class="flex items-center justify-center">
                        <div class="bg-blue-500 shadow md:rounded-md w-full md:w-7/12 lg:w-5/12 p-4 text-white font-medium mb-6">
                            URL has been created successfully ({{ env('APP_URL') . '/' . session()->get('token') }})
                        </div>
                    </div>
                @endif
                @yield('content')
                <div class="flex items-center justify-center mt-16 mb-4 break-all px-4 md:px-0">
                    <a href="https://github.com/tibidev7">All rights are reserved to <span class="text-indigo-500 font-medium">tibidev7 (Pricop George-Tiberiu)</span></a>
                </div>
            </div>
        </div>
    </body>
</html>
