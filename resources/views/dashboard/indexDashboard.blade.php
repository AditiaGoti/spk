@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
<style>
.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-weight: 700;
}
.slider-container {
    width: 100%;
    overflow: hidden;
    position: relative;
    margin: auto;
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    box-sizing: border-box;
}

.slide img {
    width: 100%;
    height: 60%;
    display: block;
}
</style>
@endpush
@section('main')
    <div class="mb-4">
    <h4 class="center-container">SPK MODAL EKSPOR
                </h4>
        <div class="slider-container">
            <div class="slides">
                <div class="slide">
                <img src="{{ asset('assets/img/image_4.jpg') }}">
                </div>
                <div class="slide">
                <img src="{{ asset('assets/img/image_1.jpg') }}">
                </div>
                <div class="slide">
                <img src="{{ asset('assets/img/image_5.jpg') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;
    let index = 0;

    setInterval(() => {
        index = (index + 1) % totalSlides;
        slides.style.transform = `translateX(-${index * 100}%)`;
    }, 3000); // Change slide every 3 seconds
});
</script>
@endpush
