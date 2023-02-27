@extends('templates.member.member')
@section('content')
    <section class="main">
        <div class="row mb-3">
            <div class="col-lg-12 mb-4">
                <h1 class="header-primary mb-3 h4">
                    Kelas Saya
                </h1>
                <p class="subtitle-primary mb-0">
                    Upgrade terus ilmu dan pengalaman <br class="desktop"> terbaru kamu di bidang teknologi
                </p>
            </div>
            <div class="card border-0 shadow-sm px-4 py-1">
                <div class="card-body bg-white">
                    <div class="row mt-5">
                        @foreach ($myRoadMap as $key => $roadmap)
                            <?php
                            ?>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="card rounded-lg shadow-lg border-0  d-flex align-items-center justify-content-center">
                                    <img src="{{ $roadmap['Roadmap']['logo'] }}" class="card-img"
                                        alt="{{ $roadmap['id'] }}">
                                    <div class="card-img-overlay d-flex">
                                        <h4 class="card-title text-center my-auto">{{ $roadmap['Roadmap']['name'] }}</h4>
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
