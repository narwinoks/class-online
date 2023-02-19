@extends('templates.member.main')
@section('content')
    <section id="banner" class="bg-light">
        <swiper-container class="mySwiper" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
            @foreach ($banner as $key => $b)
                <swiper-slide>
                    <div class="card card_banner mx-5">
                        <img src="{{ $b['image'] }}" class="card-img-bottom" height="200px" width="100px"
                            alt="{{ $b['title'] }}" />
                        <div class="card-body card-img-overlay text-white px-5 mt-5">
                            <h1 class="card-title h2">{{ $b['title'] }}</h1>
                            <p class="card-text">
                                {{ $b['description'] }}
                            </p>
                            <button type="button" class="btn btn-light text-success">
                                DETAIL
                            </button>
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </section>
    <section class="roadmap" class="bg-light">
        <!-- This script got from frontendfreecode.com -->
        <div class="container px-4 py-5" id="custom-cards">
            <h3 class="h2 mb-5">Beragam Roadmap Belajar</h3>
            <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30"
                slides-per-view="3">
                <swiper-slide>
                    <div class="col">
                        <div class="card card-cover h-200  text-white bg-dark rounded-5 shadow-lg"
                            style="background-image: url('https://via.placeholder.com/400X200');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here
                                </h2>
                                <ul class="d-flex list-unstyled mt-auto">

                                    <li class="d-flex align-items-center me-3">
                                        <svg class="bi me-2" width="1em" height="1em">
                                            <use xlink:href="#geo-fill"></use>
                                        </svg>
                                        <small>California</small>
                                    </li>
                                    <li class="d-flex align-items-center me-3">
                                        <svg class="bi me-2" width="1em" height="1em">
                                            <use xlink:href="#geo-fill"></use>
                                        </svg>
                                        <small>California</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </swiper-container>
    </section>
    <section id="categories" class="bg-light">
        <div class="container px-4 py-5">
            <h3 class="h2 mb-5">Eksplorasi Materi Codepolitan
            </h3>
            <div class="row">
                <div class="col-md-3">
                    <div className="row mt-5 mb-5">
                        <div class="card mb-3 shadow rounded-4">
                            <div class="row g-0">
                                <div class="col-md-4 my-auto mx-auto px-2">
                                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section id="popular" class="bg-light">
        <div class="container px-4 py-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h2 mb-5">Kelas Popular Minggu Ini
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="">Lihat Semua</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-course">
                        <img src="https://via.placeholder.com/400X300" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="text-muted my-5">By Winarno</span>
                            <h5 class="card-title">Membuat Aplikasi Presensi Online Berbasis Web dan Mobile - Kotlin,
                                Laravel</h5>
                            <p class="card-text">Beginner</p>
                        </div>
                        <div class="card-footer bg-white CardCourse_card_footer__8KuSa">
                            <div class="CardCourse_rate_and_price__mx63I">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <strong>Beli</strong>
                                        <br />
                                    </div>
                                    <div class="col-auto ms-auto text-end">
                                        <span>
                                            <strong>Rp 149,000</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="courses" class="bg-light">
        <div class="container px-4 py-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h2 mb-5">All Courses
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="">Lihat Semua</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-course">
                        <img src="https://via.placeholder.com/400X300" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="text-muted my-5">By Winarno</span>
                            <h5 class="card-title">Membuat Aplikasi Presensi Online Berbasis Web dan Mobile - Kotlin,
                                Laravel</h5>
                            <p class="card-text">Beginner</p>
                        </div>
                        <div class="card-footer bg-white CardCourse_card_footer__8KuSa">
                            <div class="CardCourse_rate_and_price__mx63I">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <strong>Beli</strong>
                                        <br />
                                    </div>
                                    <div class="col-auto ms-auto text-end">
                                        <span>
                                            <strong>Rp 149,000</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
