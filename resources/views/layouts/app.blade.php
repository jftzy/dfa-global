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

        <!-- Datatables CSS-->
        <link href="./css/datatables.min.css" rel="stylesheet" />

        <!-- Datatables Scripts -->
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="./js/datatables.min.js"></script>

        <!-- Sir Jundrie CDN's -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> -->
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
        <!-- <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet"> -->
        <!-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> -->


        @vite([ 'resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="w-full inline-flex">
                <div class="w-[15%]">

                    <!-- Navigation -->
                    @include('layouts.navigation')

                </div>
                <div class="w-[85%]">

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>

                </div>
            </div>
        </div>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> -->
    </body>
</html>
