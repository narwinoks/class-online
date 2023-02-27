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
                                src="{{ $course['thumbnail'] }}" alt="{{ $course['name'] }}">
                            <h1 class="section-title ms-lg-3 my-auto h2">{{ $course['name'] }}</h1>
                        </div>
                        <p class="text-muted my-3">Disini kita akan belajar bagaimana cara membangun aplikasi secara
                            monolith modern menggunakan Inertia.js dan Vue.js di dalam Laravel. Dengan menggunakan
                            Inertia.js, kita sudah tidak perlu repot-repot membuat sebuah Rest API, sehingga proses
                            development akan lebih cepat dan mudah. </p>
                        <div class="d-md-flex d-grid text-center text-lg-start">
                            <span class="badge  border text-primary py-md-2">{{ $course['level'] }}</span>

                        </div>
                    </section>
                    <div class="row mt-5">
                        <div class="col">
                            <div>
                                <h4 class="section-title">Tentang Kelas</h4>
                                <div class="text-muted">
                                    {!! $course['description'] !!}
                                </div>
                            </div>
                            <h4 class="section-title my-5">Daftar Materi</h4>
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                @foreach ($course['Chapters'] as $key => $chapter)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-{{ $chapter['id'] }}">
                                            <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapse{{ $chapter['id'] }}"
                                                aria-expanded="false"
                                                aria-controls="panelsStayOpen-collapse{{ $chapter['id'] }}">
                                                {{ $chapter['name'] }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse{{ $chapter['id'] }}"
                                            class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                            aria-labelledby="panelsStayOpen-{{ $chapter['id'] }}">
                                            <div class="accordion-body">
                                                <div class="card border-0">
                                                    <div class="card-body p-0">
                                                        <table class="table table-striped m-0">
                                                            <tbody>
                                                                @foreach ($chapter['Lessons'] as $key => $lesson)
                                                                    <tr>
                                                                        <td style="width:50px">
                                                                            <span
                                                                                class="icon-rounded-circle bg-primary p-3">
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
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <section class="section my-5 undefined">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events"
                                            style="padding: 20px 0px;">
                                            <div class="card shadow-sm mx-1">
                                                <div class="card-body text-center"><img class="rounded-circle p-3"
                                                        src="{{ $course['Mentor']['profile'] }}"
                                                        alt="{{ $course['Mentor']['name'] }}"
                                                        style="width: 180px; height: 180px; object-fit: cover;">
                                                    <h5 class="text-secondary">{{ $course['Mentor']['name'] }}</h5>
                                                    <p class="text-muted"><i>{{ $course['Mentor']['profession'] }}</i></p>
                                                </div><span class="d-block"
                                                    style="height: 3px; width: 60%; align-self: center;"></span>
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
                                    <p class="fs-6">({{ count($course['Reviews']) }} reviews)</p>
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
                            @foreach ($course['Reviews'] as $key => $review)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-3 col-lg-3 text-center">
                                                <img src="http://localhost:3001/images/default.png" class="rounded-circle"
                                                    height="80px" alt="{{ $review['id'] }}">
                                            </div>
                                            <div class="col-8 col-lg-9">
                                                <div>
                                                    <h6 class="pt-4 fw-bold">Hamba Allah</h6>
                                                    <small>{{ $review['note'] }}</small>
                                                    <div class="text-end me-4 my-2">
                                                        <span class="">
                                                            <span class="start">
                                                                <i
                                                                    class="{{ $review['rating'] >= 1 ? 'fas' : 'far' }} fa-star"></i>
                                                            </span>
                                                            <span class="start">
                                                                <i
                                                                    class="{{ $review['rating'] >= 2 ? 'fas' : 'far' }} fa-star"></i>
                                                            </span>
                                                            <span class="start">
                                                                <i
                                                                    class="{{ $review['rating'] >= 3 ? 'fas' : 'far' }} fa-star"></i>
                                                            </span>
                                                            <span class="start">
                                                                <i
                                                                    class="{{ $review['rating'] >= 4 ? 'fas' : 'far' }} fa-star"></i>
                                                            </span>
                                                            <span class="start">
                                                                <i
                                                                    class="{{ $review['rating'] >= 5 ? 'fas' : 'far' }} fa-star"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 sticky-top">
                    <div class="sticky-top" style="top: 90px;">
                        <div class="card card-rounded-lg p-0 mt-4 mt-lg-0" id="sidebarCourseDetail">
                            <div class="wrap d-none d-lg-block"><img src="{{ $course['thumbnail'] }}" class="image"
                                    alt="{{ $course['name'] }}"
                                    style="border-radius: 15px 15px 0px 0px; width: 100%; height: 220px; object-fit: cover;">
                            </div>
                            <div class="card-body rounded-0 p-0">
                                <div class="tab-content p-5">
                                    <div><span class="fs-3 fw-bold me-2">{{ covert_money($course['price']) }}
                                        </span>
                                        </small></div>
                                    <div class="text-center text-muted pt-2"><span>Beli sekali akses selamanya</span></div>
                                    <div class="d-grid gap-2 p-2 px-4 my-2"><a  onclick="event.preventDefault();
                                        document.getElementById('form-order').submit();"
                                            class="btn btn-success btn-rounded py-3 text-uppercase fw-bold"
                                            href="#">Beli
                                            Sekarang</a></div>

                                            <form action="{{route('course.order.post')}}" id="form-order" method="POST" target="_blank">
                                            @csrf
                                            @method("POST")
                                            <input type="hidden" value="{{$course['id']}}" name="course_id">
                                            <input type="hidden" value="{{$course['type']}}" name="type">
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
