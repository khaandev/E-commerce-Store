<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
  <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
     

        <div class="flex">
            <div class="w-[20%] bg-orange-500 min-h-screen relative">
                <x-admin-sidBar></x-admin-sidBar>
            </div>
            <div class="w-[80%] bg-gray-200"> {{ $slot }} </div>

        </div>

                
            
    </body>
</html>
