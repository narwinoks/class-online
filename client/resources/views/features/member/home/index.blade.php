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
            <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="4"
            space-between="30" grab-cursor="true">
                @foreach ($roadMap as $key => $road)
                <swiper-slide>
                    <div class="col">
                        <div class="card rounded-lg text-white" style="min-height: 200px;">
                            <img src="{{$road['logo']}}" class="card-img" alt="{{$road['id']}}">
                            <div class="card-img-overlay  d-flex flex-column">
                                <div class="mt-auto">
                                    <h3  class="card-title fw-bold h3 mt-auto">{{$road['name']}}</h3>
                                    <div class="description h5">
                                           <small class="mx-3">
                                              <i class="fas fa-book"></i> <span>{{$road['coursesCount']}} Kelas</span>
                                            </small>
                                            <small>
                                                <i class="fas fa-chart-line"></i>
                                               <span>{{$road['level']}}</span>
                                            </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                @endforeach
          </swiper-container>
    </section>
    <section id="categories" class="bg-light">
        <div class="container px-4 py-5">
            <h3 class="h2 mb-5">Eksplorasi Materi Codepolitan
            </h3>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-3">
                    <div className="row mt-5 mb-5">
                        <div class="card mb-3 shadow d-flex  rounded-4">
                            <div class="row g-0">
                                <div class="col-md-4 my-auto mx-auto py-2 px-2">
                                    <img src="{{$category['logo']}}"  width="100" height="100" class="img-fluid h-50 rounded-start"
                                        alt="{{$category['id']}}">
                                </div>
                                <div class="col-md-8 align-items-center justify-content-center d-flex">
                                    <div class="card-body ">
                                        <h5 class="h5 card-title">{{$category['name']}}</h5>
                                            <i class="fas fa-book"></i> <span>{{$category['categoryCount']}} kelas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @if (count($popularClass) > 0)
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
                <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="4"
                                  space-between="30" grab-cursor="true">
                @foreach ($popularClass as $key => $popular)
                        <swiper-slide>
                            <div class="col">
                                <div class="card card-course">
                                    <img src="{{$popular['thumbnail']}}" class="card-img-top" alt="{{$popular['id']}}">
                                    <div class="card-body">
                                        <span class="text-muted my-5">By {{$popular['Mentor']['name']}}</span>
                                        <h5 class="card-title">{{$popular['name']}}</h5>
                                        <p class="card-text">{{$popular['level']}}</p>
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
                                            <strong>{{covert_money($popular['price']) }}</strong>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                @endforeach
                </swiper-container>

            </div>
        </div>
    </section>
    @endif
    @if(count($allCourse) >0)
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
                     <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="4"
                                          space-between="30" grab-cursor="true">
                         @foreach($allCourse as $key =>$course)
                         <swiper-slide>
                             <div class="col">
                                 <div class="card card-course">
                                     <img src="{{$course['thumbnail']}}" class="card-img-top" alt="{{$course['id']}}">
                                     <div class="card-body">
                                         <span class="text-muted my-5">By {{$course['Mentor']['name']}}</span>
                                         <h5 class="card-title">{{$course['name']}}</h5>
                                         <p class="card-text">{{$course['level']}}</p>
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
                                                <strong>{{covert_money($course['price']) }}</strong>
                                            </span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </swiper-slide>
                         @endforeach
                     </swiper-container>
                </div>
            </div>
        </section>
    @endif
@endsection
