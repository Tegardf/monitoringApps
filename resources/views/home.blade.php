@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Halo, Selamat Datang</h1>
    <p class="mt-4">Untuk Mengetahui Kesehatan Mental Bisa Dilakukan Monitoring</p>
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/1.png') }}" alt="Device Image" class="w-full h-48 object-cover">
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/2.png') }}" alt="Device Image" class="w-full h-48 object-cover">
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/3.png') }}" alt="Device Image" class="w-full h-48 object-cover">
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/3.png') }}" alt="Device Image" class="w-full h-48 object-cover">
        </div>
    </div>
@endsection