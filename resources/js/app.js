import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//firebase chart
import { initializeApp } from 'firebase/app';
import { getDatabase,ref,onValue } from 'firebase/database';


const firebaseConfig = {
    apiKey: "AIzaSyBL-7OlKXvKSSkinuz_QsCDXWtqsVP_J80",
    authDomain: "monitoring-5183a.firebaseapp.com",
    databaseURL: "https://monitoring-5183a-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "monitoring-5183a",
    storageBucket: "monitoring-5183a.appspot.com",
    messagingSenderId: "1024915641440",
    appId: "1:1024915641440:web:99ed568f4e1ba983369f05",
    measurementId: "G-NS6W85Y61P"
}
const app = initializeApp(firebaseConfig);
const database = getDatabase(app);


import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

// Initialize your chart
const ctx = document.getElementById('realtimeChart').getContext('2d');
const indicator = document.getElementById('indicator');
const keterangan = document.getElementById('keterangan');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Heart Rate',
            data: [],
            borderColor: 'rgb(255, 99, 132)',
            fill: false
        }, {
            label: 'SPO2',
            data: [],
            borderColor: 'rgb(54, 162, 235)',
            fill: false
        }, {
            label: 'GSR',
            data: [],
            borderColor: 'rgb(75, 192, 192)',
            fill: false
        }, {
            label: 'Blood Pressure',
            data: [],
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
import axios from 'axios';
const dataRef = ref(database)
onValue(dataRef, (snapshot) => {
    const data = snapshot.val();
    // Assuming data is an object with keys: br, gsr, hr, spo
    // console.log(data.timestamp);
    // Update your chart data here
    chart.data.labels.push(new Date().toLocaleTimeString());
    chart.data.datasets[0].data.push(data.hr);
    chart.data.datasets[1].data.push(data.spo);
    chart.data.datasets[2].data.push(data.gsr);
    chart.data.datasets[3].data.push(data.br);

    const indiValue = data.indicator;
    let ketValue = '';
    
    if (indiValue == 'Relax') {
        ketValue = "Hasil Anda menunjukkan bahwa Anda tidak memiliki, atau sangat sedikit, tanda-tanda kecemasan.";
    }else if (indiValue == 'Stress Ringan') {
        ketValue = "Hasil Anda menunjukkan bahwa Anda mungkin mengalami beberapa tanda kecemasan ringan.";
    }else if (indiValue == 'Stress Sedang') {
        ketValue = "Hasil Anda menunjukkan bahwa Anda mungkin mengalami beberapa tanda kecemasan sedang.";
    }else if (indiValue == 'Stress Berat') {
        ketValue = "Hasil Anda menunjukkan bahwa Anda mungkin mengalami beberapa tanda kecemasan yang parah.";
    }
    indicator.textContent = indiValue;
    keterangan.textContent = ketValue;
    // Update the chart
    chart.update();
    axios.post('https://monitoringapps.test/sync-data', { data })
        .then(response => {
            console.log('Data synchronized successfully:', response.data);
        })
        .catch(error => {
            console.error('Error synchronizing data:', error);
        });

});

// import * as functions from 'firebase-functions';


// const functions = require('firebase-funtions');
// // const axios = require('axios');
// const admin = require('firebase-admin');
// admin.initializeApp();

// admin.synDataToLaravel = functions.database.ref("https://monitoring-5183a-default-rtdb.asia-southeast1.firebasedatabase.app").onWrite(async (change,context)=>{
//     const data = change.after.val();
//     try {
//         await axios.post('https://monitoringapps.test/sync-data', { data });
//         console.log('Data synchronized successfully');
//     } catch (error) {
        
//     }
// });

//audio player
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