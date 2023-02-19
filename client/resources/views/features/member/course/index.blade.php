@extends('templates.member.main')
@section('content')
    <section class="section" id="course" style="margin-top: 70px">
        <div class="container p-4 lg-p-5">
            <div class="row mb-3">
                <div class="col">
                    <h2 class="section-title h3">Pilihan Kelas Online Pemrograman</h2>
                    <p class="text-muted">Pilih dan jadilah professional!</p>
                </div>
            </div>
            <div class="row" id="filter_course">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sticky-top" style="top:100px">
                        <h3 class="section-title h5 mb-3">Filter Kelas</h3>
                        <ul class="list-group">
                            <li class="list-group-item border-0 text-success px-0" role="button" style="font-weight:bold">
                                <div class="d-flex align-items-center"><img
                                        src="https://codepolitan.com/assets/img/placeholder.jpg" width="30"
                                        class="img-fluid me-2" alt=""><span class="mt-1">Semua Kelas</span></div>
                            </li>
                            <li class="list-group-item border-0 text-muted px-0" role="button" style="font-weight:">
                                <div class="d-flex align-items-center"><img
                                        src="https://cdn-cdpl.sgp1.digitaloceanspaces.com/assets/img/Teknologi/box-icon-html.jpg"
                                        width="30" class="img-fluid me-2" alt="web"><span class="mt-1">Web</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-9">
                    <div class="sticky-top" style="top:70px">
                        <div class="row mb-3 py-3 bg-white">
                            <div class="col-md-6 mb-3 mb-lg-0 my-auto">
                                <div class="d-flex align-items-lg-start">
                                    <div class="dropdown ms-2 ms-lg-0"><button
                                            class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">Level</button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li class="dropdown-item" role="button">Semua Level</li>
                                            <li class="dropdown-item" role="button">Pemula</li>
                                            <li class="dropdown-item" role="button">Menengah</li>
                                            <li class="dropdown-item" role="button">Mahir</li>
                                        </ul>
                                    </div>
                                    <div class="dropdown ms-2"><button
                                            class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">Urutkan</button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li class="dropdown-item" role="button">Kelas Terbaru</li>
                                            <li class="dropdown-item" role="button">Kelas Terpopuler</li>
                                            <li class="dropdown-item" role="button">Harga Tertinggi</li>
                                            <li class="dropdown-item" role="button">Harga Terendah</li>
                                        </ul>
                                    </div>
                                    <div class="dropdown ms-2"><button
                                            class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">Tampilkan</button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li class="dropdown-item" role="button">Semua Kelas</li>
                                            <li class="dropdown-item" role="button">Kelas Gratis</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 ms-auto">
                                <form>
                                    <div class="input-group"><input type="search" class="form-control shadow-none"
                                            placeholder="cari kelas dan enter disini..."><button
                                            class="input-group-text bg-white text-muted" role="button" type="submit"
                                            title="Cari">Search</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-course">
                                <img src="https://via.placeholder.com/400X300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <span class="text-muted my-5">By Winarno</span>
                                    <h5 class="card-title">Membuat Aplikasi Presensi Online Berbasis Web dan Mobile -
                                        Kotlin,
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
            </div>
    </section>
@endsection
