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
            <div class="mt-6 bg-gray-200 shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">Mental Health Indicator</h3>
            </div>
        </div>
    </div>
    <!-- <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-database.js"></script> -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const audioPlayer = document.getElementById('arRahmanPlayer');
        const playBtn = document.getElementById('playBtn');
        const pauseBtn = document.getElementById('pauseBtn');
        const stopBtn = document.getElementById('stopBtn');
        const seekSlider = document.getElementById('seekSlider');
        const currentTimeSpan = document.getElementById('currentTime');
        const durationSpan = document.getElementById('duration');

        playBtn.addEventListener('click', () => {
            audioPlayer.play();
        });

        pauseBtn.addEventListener('click', () => {
            audioPlayer.pause();
        });

        stopBtn.addEventListener('click', () => {
            audioPlayer.pause();
            audioPlayer.currentTime = 0;
        });
        seekSlider.addEventListener('input', () => {
            audioPlayer.currentTime = seekSlider.value;
        });

        audioPlayer.addEventListener('timeupdate', () => {
            seekSlider.value = audioPlayer.currentTime;
            currentTimeSpan.textContent = formatTime(audioPlayer.currentTime);
        });
        audioPlayer.addEventListener('loadedmetadata', () => {
            durationSpan.textContent = formatTime(audioPlayer.duration);
        });

        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let remainingSeconds = Math.floor(seconds % 60);
            return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
    }
        // Firebase configuration
        // const firebaseConfig = {
        //     apiKey: "YOUR_API_KEY",
        //     authDomain: "YOUR_AUTH_DOMAIN",
        //     databaseURL: "YOUR_DATABASE_URL",
        //     projectId: "YOUR_PROJECT_ID",
        //     storageBucket: "YOUR_STORAGE_BUCKET",
        //     messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
        //     appId: "YOUR_APP_ID"
        // };

        // // Initialize Firebase
        // const app = firebase.initializeApp(firebaseConfig);
        // const database = firebase.database();

        // // Real-time chart setup
        const ctx = document.getElementById('realtimeChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1,2,3,4,5,6,7,8,9],
                datasets: [{
                    label: 'Heart Rate',
                    data: [1,2,2,3,5,7,5,3,2],
                    borderColor: 'rgb(255, 99, 132)',
                    fill: false
                }, {
                    label: 'SPO2',
                    data: [3,7,2,3,4,6,3,4,6],
                    borderColor: 'rgb(54, 162, 235)',
                    fill: false
                }, {
                    label: 'GSR',
                    data: [1,8,2,3,1,4,6,8,6],
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false
                }, {
                    label: 'Blood Pressure',
                    data: [8,9,2,6,4,8,9,7,8],
                    borderColor: 'rgb(153, 102, 255)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });

        // // Function to update the chart
        // function updateChart(data) {
        //     const time = new Date().toLocaleTimeString();
        //     chart.data.labels.push(time);
        //     if (chart.data.labels.length > 10) {
        //         chart.data.labels.shift();
        //     }
        //     chart.data.datasets[0].data.push(data.heartRate);
        //     if (chart.data.datasets[0].data.length > 10) {
        //         chart.data.datasets[0].data.shift();
        //     }
        //     chart.data.datasets[1].data.push(data.spo2);
        //     if (chart.data.datasets[1].data.length > 10) {
        //         chart.data.datasets[1].data.shift();
        //     }
        //     chart.data.datasets[2].data.push(data.gsr);
        //     if (chart.data.datasets[2].data.length > 10) {
        //         chart.data.datasets[2].data.shift();
        //     }
        //     chart.data.datasets[3].data.push(data.bloodPressure);
        //     if (chart.data.datasets[3].data.length > 10) {
        //         chart.data.datasets[3].data.shift();
        //     }
        //     chart.update();
        // }

        // // Listen for real-time updates
        // const dataRef = firebase.database().ref('realtimeData');
        // dataRef.on('value', (snapshot) => {
        //     const data = snapshot.val();
        //     updateChart(data);
        // });
    </script>
@endsection