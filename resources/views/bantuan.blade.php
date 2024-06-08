@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Bantuan & Informasi</h1>
    <p class="mt-4">Segala Informasi Terkait Penggunaan Alat Pengujian Ada Disini</p>
    <div class="flex justify-center pt-10">
        <iframe width="600" height="400" class="rounded-xl" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6919770919044!2d112.79118077499969!3d-7.275847092731261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09c7!2sPoliteknik%20Elektronika%20Negeri%20Surabaya!5e0!3m2!1sid!2sid!4v1717697709761!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="flex flex-col items-center gap-2 bg-gray-200  p-6 rounded-lg shadow-md">
            <x-icon.location-logo class="w-12"></x-icon.location-logo>
            <h1>Politeknik Elektronika Negeri Surabaya
            Institut Teknologi Sepuluh Nopember, Kampus Jl. Raya ITS, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111</h1>
            <div class="w-full">
                <h1>Email   : https://www.pens.ac.id/</h1>
                <h1>Phone : 0315947280 </h1>
            </div>
        </div>
    </div>
@endsection