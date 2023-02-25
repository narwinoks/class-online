
@extends('templates.member.member')
@section('content')
                <section class="section bg-white shadow mb-5">
                    <div class="row justify-content-center p-3">
                        <div class="col-auto col-lg-1 my-auto mb-3 mb-lg-auto"><img height="50"
                                width="50" class="d-block mx-auto"
                                src="https://dashboard.codepolitan.com/assets/img/codepolitan-logo-mobile.png"
                                alt="Codepolitan"></div>
                        <div class="col-auto col-lg-9 mb-3 mb-lg-auto">
                            <h5 class="my-2 ms-0 ms-lg-4">Kamu belum melengkapi informasi profilmu. Yuk lengkapi
                                dulu supaya semakin nyaman belajarnya.</h5>
                        </div>
                        <div class="col-auto col-lg-2 my-auto"><a class="btn btn-rounded btn-primary"
                                href="/user/settings/profile">Lengkapi Sekarang</a></div>

                    </div>
                </section>
                <section class="mb-5">
                    <h4 class="section-title mb-5">My Learn</h4>
                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <div class="card border-0 shadow-sm p-3 text-primary">
                                <h2 class="fw-bold text-dark">6</h2>
                                <p class="text-muted fw-bolder">Kelas Saya</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="card border-0 shadow-sm p-3 text-primary">
                                <h2 class="fw-bold text-dark">3</h2>
                                <p class="text-muted fw-bolder">Roadmap Saya</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="card border-0 shadow-sm p-3 text-primary">
                                <h2 class="fw-bold text-dark">4</h2>
                                <p class="text-muted fw-bolder">Sertifikat Saya</p>
                            </div>
                        </div>
                    </div>
                </section>
@endsection