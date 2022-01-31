<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Breaking Bad Characters</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    @livewireStyles
</head>
<div class="overflow-x-hidden bg-gray-100">
    <nav class="px-6 py-4 bg-white shadow">
        <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <div>
                    <a href="/" class="text-xl font-bold text-gray-800 md:text-2xl">Breaking Bad</a>
                </div>
                <div>
                    <button type="button" class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-col hidden md:flex md:flex-row md:-mx-4">
                <a href="/" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Home</a>
                <a href="/" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Characters</a>
            </div>
        </div>
    </nav>

    <div class="px-6 py-8">
        @include('messages')
        @yield('content')
    </div>
</div>

@livewireScripts
<script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
