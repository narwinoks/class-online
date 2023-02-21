@extends('templates.member.main')
@section('content')
    <section class="section mt-5">
        <div class="container p-3 p-lg-5">
            <div class="row mt-4">
                <div class="col-lg-7 text-muted">
                    <section class="section">
                        <div class="ratio ratio-16x9 mb-4 d-lg-none"><iframe src="" title="Course Preview"
                                allowfullscreen="" style="border-radius: 25px;"></iframe></div>
                        <div class="d-flex align-items-center"><img height="65" class="rounded d-none d-lg-block"
                                src="https://image.web.id/images/Membangun_Aplikasi_Ujian_Online_Dengan_Laravel_Inertia.js_dan_Vue.js.png"
                                alt="Membangun Aplikasi Ujian Online (CBT) Dengan Laravel, Inertia.js &amp; Vue.js">
                            <h1 class="section-title ms-lg-3 my-auto h2">Membangun Aplikasi Ujian Online (CBT) Dengan
                                Laravel, Inertia.js &amp; Vue.js</h1>
                        </div>
                        <p class="text-muted my-3">Disini kita akan belajar bagaimana cara membangun aplikasi secara
                            monolith modern menggunakan Inertia.js dan Vue.js di dalam Laravel. Dengan menggunakan
                            Inertia.js, kita sudah tidak perlu repot-repot membuat sebuah Rest API, sehingga proses
                            development akan lebih cepat dan mudah. </p>
                        <div class="d-md-flex d-grid text-center text-lg-start">
                            <span class="badge  border text-primary py-md-2">BEGINNER</span>

                        </div>
                    </section>
                    <div class="row mt-5">
                        <div class="col">
                            <div>
                                <h4 class="section-title">Tentang Kelas</h4>
                                <div class="text-muted">
                                    <p>Pada pembahasan buku ini, kita semua akan belajar bersama-sama bagaimana cara menjadi
                                        seorang Full Stack Web Developer dengan cara membangun sebuah aplikasi Ujian Online
                                        menggunakan Laravel, Inertia.js dan Vue.js 3.</p>
                                    <p>Karena akan menggunakan Inertia.js, maka akan sangat menghemat waktu kita dalam
                                        pembuatan sebuah aplikasi yang bersifat modern dan SPA atau Single Page Application.
                                        Dengan menggunakan Inertia.js, maka kita tidak perlu susah payah dan repot-repot
                                        membuat REST API untuk menghubungkan antara Backend dan Frontend. Karena peran
                                        Inertia.js akan menggantikan REST API untuk menghubungkan Laravel (Backend) dan
                                        Vue.js (Frontend) dengan lebih mudah dan maintainable.</p>
                                    <p>Kita juga akan belajar membuat sistem autentikasi dengan 2 jenis role / peran, yaitu
                                        admin sebagai seseorang yang melakukan input data master, seperti data siswa, kelas,
                                        ujian, report dan lain-lain. Sedangkan role / peran yang satunya adalah siswa, yaitu
                                        yang melakukan proses ujian di dalam aplikasi.</p>
                                    <p>Karena akan membuat aplikasi Ujian Online, maka kita juga akan belajar tentang
                                        melakukan import dan export data, seperti siswa, soal ujian dan bahkan report hasil
                                        ujian dari para siswa.</p>
                                    <p>Setelah proses pembuatan aplikasi sudah selesai, maka kita juga akan belajar
                                        bagaimana cara melakukan deployment atau meng-online kan aplikasi tersebut agar bisa
                                        diakses oleh banyak orang. Dan disini kita akan belajar melakukan Deploy menggunakan
                                        VPS.</p>
                                    <p>Karena akan melakukan Deployment menggunakan VPS, maka kita juga akan belajar tentang
                                        LEMP stack atau kepanjangan dari Linux, Engine X, MySQL dan PHP. Maka secara tidak
                                        langsung, kita juga akan belajar tentang basic Devops.</p>
                                </div>
                            </div>
                            <h4 class="section-title my-5">Daftar Materi</h4>
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by
                                            default, until the collapse plugin adds the appropriate classes that we use to
                                            style each element. These classes control the overall appearance, as well as the
                                            showing and hiding via CSS transitions. You can modify any of this with custom
                                            CSS or overriding our default variables. It's also worth noting that just about
                                            any HTML can go within the <code>.accordion-body</code>, though the transition
                                            does limit overflow.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <div class="card border-0">
                                                <div class="card-body p-0">
                                                    <table class="table table-striped m-0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:50px">
                                                                    <span class="icon-rounded-circle bg-primary p-3">
                                                                        <i class="fas fa-play text-white"></i>
                                                                    </span>
                                                                </td>
                                                                <td class="text-muted">Cover</td>
                                                                <td class="text-end text-muted">
                                                                    <span class="mx-2">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                    00.00
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50px"> <span
                                                                        class="icon-rounded-circle bg-primary p-3">
                                                                        <i class="fas fa-play text-white"></i>
                                                                    </span></td>
                                                                <td class="text-muted">Kata Pengantar</td>
                                                                <td class="text-end text-muted">
                                                                    <span class="mx-2">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                    00.00
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50px"> <span
                                                                        class="icon-rounded-circle bg-primary p-3">
                                                                        <i class="fas fa-play text-white"></i>
                                                                    </span></td>
                                                                <td class="text-muted">License Buku</td>
                                                                <td class="text-end text-muted">
                                                                    <span class="mx-2">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                    00.00
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50px"> <span
                                                                        class="icon-rounded-circle bg-primary p-3">
                                                                        <i class="fas fa-play text-white"></i>
                                                                    </span></td>
                                                                <td class="text-muted">Tentang Buku</td>
                                                                <td class="text-end text-muted">
                                                                    <span class="mx-2">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                    00.00
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section class="section my-5 undefined">
                                <div class="row">
                                    <div class="col">
                                        <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events"
                                            style="padding: 20px 0px;">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="swiper-slide swiper-slide-active"
                                                    style="width: 338.095px; margin-right: 10px;">
                                                    <div class="card shadow-sm mx-1">
                                                        <div class="card-body text-center"><img class="rounded-circle p-3"
                                                                src="https://cdn-cdpl.sgp1.digitaloceanspaces.com/original/840/avatar.png"
                                                                alt="Fika Ridaul Maulayya"
                                                                style="width: 180px; height: 180px; object-fit: cover;">
                                                            <h5 class="text-secondary">Fika Ridaul Maulayya</h5>
                                                            <p class="text-muted"><i>Belum ada keterangan</i></p>
                                                        </div><span class="d-block bg-codepolitan"
                                                            style="height: 3px; width: 60%; align-self: center;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col-auto">
                                    <h4 class="section-title">Testimoni Oleh Siswa</h4>
                                </div>
                                <div class="col-auto text-end ms-auto pe-lg-0">
                                    <div class="btn-group" role="group">
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li class="dropdown-item" role="button">Semua</li>
                                            <li class="dropdown-item" role="button">Bintang 5</li>
                                            <li class="dropdown-item" role="button">Bintang 4</li>
                                            <li class="dropdown-item" role="button">Bintang 3</li>
                                            <li class="dropdown-item" role="button">Bintang 2</li>
                                            <li class="dropdown-item" role="button">Bintang 1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg-3 text-center">
                                    <div class="display-1">0</div>
                                    <div class="my-2">
                                        <span class="">
                                            <span class="start">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="start">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="start">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="start">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="start">
                                                <i class="far fa-star"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <p class="fs-6">(0 reviews)</p>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row pt-3">
                                        <div class="col-3 col-lg-3 px-0 pb-3 ps-lg-3 text-end"><span class="me-2">5
                                                Bintang</span></div>
                                        <div class="col-7 col-lg-8 p-0 pt-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1"><span>0%</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 col-lg-3 px-0 pb-3 text-end"><span class="me-2">4
                                                Bintang</span></div>
                                        <div class="col-7 col-lg-8 p-0 pt-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1"><span>0%</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 col-lg-3 px-0 pb-3 text-end"><span class="me-2">3
                                                Bintang</span></div>
                                        <div class="col-7 col-lg-8 p-0 pt-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1"><span>0%</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 col-lg-3 px-0 pb-3 text-end"><span class="me-2">2
                                                Bintang</span></div>
                                        <div class="col-7 col-lg-8 p-0 pt-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1"><span>0%</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 col-lg-3 px-0 pb-3 text-end"><span class="me-2">1
                                                Bintang</span></div>
                                        <div class="col-7 col-lg-8 p-0 pt-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1"><span>0%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-3 col-lg-3 text-center">
                                            <img src="https://secure.gravatar.com/avatar/686fbb37e866d8728a6a4d56aa92da5c?size=200&amp;default=mm&amp;rating=g"
                                                class="rounded-circle" height="80px" alt="Lamin Surachman">
                                        </div>
                                        <div class="col-8 col-lg-9">
                                            <div>
                                                <h6 class="pt-4 fw-bold SectionTestimonyComment_username__9aXpy">Lamin
                                                    Surachman</h6><small>Mudah dipahami,Keren sekali,Informatif,Kontennya
                                                    menarik,Recommended</small>
                                                <div class="text-end me-4 my-2">
                                                    <span class="">
                                                        <span class="start">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="start">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="start">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="start">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="start">
                                                            <i class="far fa-star"></i>
                                                        </span>
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
                <div class="col-lg-4 offset-lg-1 sticky-top">
                    <div class="sticky-top" style="top: 90px;">
                        <div class="card card-rounded-lg p-0 mt-4 mt-lg-0" id="sidebarCourseDetail">
                            <div class="wrap d-none d-lg-block"><img
                                    src="https://image.web.id/images/Membangun_Aplikasi_Ujian_Online_Dengan_Laravel_Inertia.js_dan_Vue.js.png"
                                    class="image" alt="..."
                                    style="border-radius: 15px 15px 0px 0px; width: 100%; height: 220px; object-fit: cover;">
                            </div>
                            <div class="card-body rounded-0 p-0">
                                <div class="tab-content p-5">
                                    <div><span class="fs-3 fw-bold me-2">Rp.350,000
                                        </span>
                                        </small></div>
                                    <div class="text-center text-muted pt-2"><span>Beli sekali akses selamanya</span></div>
                                    <div class="d-grid gap-2 p-2 px-4 my-2"><a target="_blank"
                                            class="btn btn-success btn-rounded py-3 text-uppercase fw-bold"
                                            href="#">Beli
                                            Sekarang</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
