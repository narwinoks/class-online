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
                            <li class="list-group-item border-0 text-muted px-0" role="button" style="">
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
                                        <ul class="dropdown-menu filter-level" aria-labelledby="dropdownMenuButton1">
                                            <li class="dropdown-item active" role="button">Semua Level</li>
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
                                    <div class="input-group"><input id="search_value" type="search" class="form-control shadow-none"
                                            placeholder="cari kelas dan enter disini..."><button
                                            class="input-group-text bg-white text-muted" role="button" type="submit" onclick="loadCoursesData()"
                                            title="Cari">Search</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="coursesData">
                        <div id="loadingCourses" class="text-center" style="display: none">
                            <img src="{{ asset('assets/plugins/loading.gif') }}" width="30px">
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection
@push("scripts")
    <script>
        $(document).ready(function(){
            $('.filter-level').on('click', '.dropdown-item', function() {
                // Get the selected value from the clicked item
                $('.filter-level .dropdown-item').removeClass('active');
                // Add active class to clicked item
                $(this).addClass('active');
                loadCoursesData();
            });
            loadCoursesData();
            $("#search_value").keyup(function(){
                loadCoursesData();
            })
        });

        function loadPage() {
            $("#loadingCourses").show();
        }

        function loadCoursesData() {
            $("#loadingCourses").show();
            const filter            =encodeURIComponent($(".filter-level .active").text());
            const  search           =$("#search_value").val();
            $("#coursesData").load("{{ route('course.getCourses', ['key' => 'courses_get']) }}&fileter=" + filter + "&name=" + search , () => {
                $("#loadingCourses").hide();
            })
        }
    </script>
@endpush
