<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-color1 flex font-sans">
        <!-- Sidebar -->
        <div class="w-1/6 h-screen bg-color1 border-solid border-gray-400 border-r-4 shadow-md">
            <div class="p-6 pt-10 text-center font-bold text-lg flex justify-center">
                <a href="{{ route('home') }}">
                    <x-icon.application-logo class="h-16 w-40 text-gray-500" />
                </a>
            </div>
            <nav class="p-4">
                <a href="{{ route('home') }}" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110">
                    <x-icon.home-logo class="h-6"></x-icon.home-logo>
                    <h1>Home</h1>
                </a>
                <a href="{{ route('monitoring') }}" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110">
                    <x-icon.monitoring-logo class="h-6"></x-icon.monitoring-logo>
                    <h1>Monitoring</h1>
                </a>
                <a href="{{ route('riwayat_monitoring') }}" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110">
                    <x-icon.riwayat-logo class="h-6"></x-icon.riwayat-logo>
                    <h1>Riwayat Rekam Medis</h1>    
                </a>
                <a href="{{ route('riwayat_gejala_awal') }}" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110">
                    <x-icon.riwayat-gejala-logo class="h-6"></x-icon.riwayat-gejala-logo>
                    <h1>Riwayat Gejala Awal</h1>      
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110">
                        <x-icon.logout-logo class="h-6"></x-icon.logout-logo>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </nav>
            <div class="absolute bottom-0 w-64 p-4">
                <a href="{{ route('bantuan')}}" class="flex flex-row items-center gap-2 py-2.5 px-4 rounded transition duration-200 hover:text-base hover:scale-110 ">
                    <x-icon.bantuan-logo class="h-6"></x-icon.bantuan-logo>
                    <h1>Bantuan & Informasi</h1>     
                </a>
            </div>
        </div>

        <div class="absolute top-6 right-10 p-4">
            <div class="font-sans text-xl font-extrabold flex flex-row justify-center gap-2 items-center font-semibold text-gray-700">
                <h1>{{ date('d F Y') }}</h1>
                <x-icon.tgl-logo class="h-10"></x-icon.tgl-logo>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10">
                @yield('content')
        </div>
    </body>
</html>
