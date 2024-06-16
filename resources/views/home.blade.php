@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Halo, Selamat Datang</h1>
    <p class="mt-4">Untuk Mengetahui Kesehatan Mental Bisa Dilakukan Monitoring</p>
    <div class="w-full flex-row items-center">
        <div class=" mt-10 gap-6">
            <div class="slider-container relative overflow-hidden w-full m-auto">
                <div class="slides flex items-center justify-center transition-transform duration-500">
                    <div class="slide w-4/5 box-border bg-white p-6 rounded-lg shadow-md ">
                        <img src="{{ asset('images/1.png') }}" alt="Device Image" class="w-full block object-cover">
                    </div>
                    <div class="slide w-4/5 box-border bg-white p-6 rounded-lg shadow-md ">
                        <img src="{{ asset('images/2.png') }}" alt="Device Image" class="w-full block object-cover">
                    </div>
                    <div class="slide w-4/5 box-border bg-white p-6 rounded-lg shadow-md ">
                        <img src="{{ asset('images/3.png') }}" alt="Device Image" class="w-full block object-cover">
                    </div>
                    <div class="slide w-4/5 box-border bg-white p-6 rounded-lg shadow-md ">
                        <img src="{{ asset('images/4.png') }}" alt="Device Image" class="w-full block object-cover">
                    </div>
                </div>
            </div>
            <!-- <div class="flex flex-row relative -top-56 w-full justify-between">
                <a class="prev transform -translate-y-1/2 bg-black bg-opacity-50 text-white font-bold text-lg p-2 rounded-full cursor-pointer hover:scale-110 active:scale-100" onclick="moveSlide(-1)">&#10094;</a>
                <a class="next transform -translate-y-1/2 bg-black bg-opacity-50 text-white font-bold text-lg p-2 rounded-full cursor-pointer hover:scale-110 active:scale-100" onclick="moveSlide(1)">&#10095;</a>
            </div> -->
            <div class="dot-container relative -bottom-7 w-full flex justify-center space-x-2">
                <span class="dot cursor-pointer h-4 w-4 bg-black bg-opacity-50 rounded-full hover:scale-110 active:scale-100" onclick="currentSlide(1)"></span>
                <span class="dot cursor-pointer h-4 w-4 bg-black bg-opacity-50 rounded-full hover:scale-110 active:scale-100" onclick="currentSlide(2)"></span>
                <span class="dot cursor-pointer h-4 w-4 bg-black bg-opacity-50 rounded-full hover:scale-110 active:scale-100" onclick="currentSlide(3)"></span>
                <span class="dot cursor-pointer h-4 w-4 bg-black bg-opacity-50 rounded-full hover:scale-110 active:scale-100" onclick="currentSlide(4)"></span>
            </div>
        </div>
    </div>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function showSlides(n) {
            let slides = document.getElementsByClassName("slide");
            console.log(slides);
            let dots = document.getElementsByClassName("dot");
            console.log(dots);
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active scale-125", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active scale-125";
        }

        function currentSlide(n) {
            showSlides(slideIndex=n);
        }

    </script>
@endsection

