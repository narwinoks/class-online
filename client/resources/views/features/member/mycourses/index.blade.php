@extends('templates.member.member')
@section('content')
    <section class="main">
        <div class="row mb-3">
            <div class="col-lg-12 mb-4">
                <h1 class="header-primary mb-3 h3">
                    Kelas Saya
                </h1>
                <p class="subtitle-primary mb-0">
                    Upgrade terus ilmu dan pengalaman <br class="desktop"> terbaru kamu di bidang teknologi
                </p>
            </div>
            <div class="card border-0 shadow-sm px-4 py-1">
                <div class="card-body bg-white">
                    <div class="row mt-5">
                        @foreach ($myCourses as $key => $myCourse)
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="card shadow-sm my-course">
                                    <img src="{{ $myCourse['Course']['thumbnail'] }}" class="card-img-top" alt="..."
                                        width="100px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $myCourse['Course']['name'] }}</h5>
                                        <p class="card-text text-muted">{{ $myCourse['Course']['level'] }}.</p>
                                        <a href="{{route('member.my-course.detail',$myCourse['Course']['slug'])}}" class="btn btn-success">Belajar Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
