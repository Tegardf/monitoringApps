@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Dashboard Monitoring</h1>
    <p class="mt-4">Kesehatan Mental Yang Baik Berawal Dari Pencegahan Dini</p>
    <div class="flex flex-row gap-4">
        <div class="w-3/4 flex flex-col">
            <div class="">
                <div>
                    iconv
                    <h1>Heart Rate</h1>
                </div>
            </div>
            <canvas id="realtimeChart" class="w-full h-full shadow-lg rounded-lg p-4"></canvas>
        </div>
        <div class="w-1/4 flex flex-col">
            <div class="mt-6 h-64 flex flex-col items-center justify-center bg-gray-200 shadow-lg rounded-lg p-6">
                <h3 class="text-2xl text-center font-bold mb-4">Surah<br/>Ar-Rahman</h3>
                <audio id="arRahmanPlayer" controls class="w-full hidden">
                    <source src="{{asset('055_Ar-Rahman.mp3')}}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <div class="mt-4 w-full flex justify-center gap-2 items-center">
                    <span id="currentTime" class="text-sm text-gray-500">0:00</span>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" class="w-full bg-gray-200 h-3 rounded-full">
                    <span id="duration" class="text-sm text-gray-500">0:00</span>
                </div>
                <div class="flex justify-center items-center mt-4 space-x-4">
                    <button id="playBtn" class="p-1 bg-green-500 text-white rounded hover:bg-green-600">
                        <x-icon.play-logo class="text-white w-6"></x-icon.play-logo>
                    </button>
                    <button id="pauseBtn" class="p-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        <x-icon.pause-logo class="text-white w-6"></x-icon.pause-logo>
                    </button>
                    <button id="stopBtn" class="p-1 bg-red-500 text-white rounded hover:bg-red-600">
                        <x-icon.stop-logo class="text-white w-6"></x-icon.stop-logo>
                    </button>
                </div>
            </div>
            <div class="flex flex-col items-center mt-6 bg-gray-200 shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4 text-center">Mental Health Indicator</h3>
                <h3 id="indicator" class="py-4 font-bold text-2xl"></h3>
                <p id="keterangan" class="text-center text-lg"></p>
            </div>
        </div>
    </div>
    <!-- <script>
        
    </script> -->
@endsection