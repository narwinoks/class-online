import React from "react";
import "./RoadMap.css";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import { DiPhp } from "react-icons/di";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/free-mode";
import "swiper/css/pagination";

// import required modules
import { FreeMode, Pagination } from "swiper";

const RoadMap = () => {
  return (
    <section className="roadmap">
      <div className="container roadmap_container">
        <div className="row">
          <div className="col-md-6">
            <h1 className="h2">Beragam Roadmap Belajar</h1>
          </div>
          <div className="col-md-6 text-end text-success">
            <Link to="/home">Lihat Semua</Link>
          </div>

          <Swiper
            slidesPerView={3}
            spaceBetween={30}
            freeMode={true}
            pagination={{
              clickable: true,
            }}
            modules={[FreeMode]}
            grabCursor={true}
            className="mySwiper"
          >
            <SwiperSlide>
              <div className="card card_roadmap">
                <img
                  src="https://image.web.id/images/Kelasfullstack-Banner-Depan.png"
                  className="card-img-bottom"
                  height="350px"
                  width="100px"
                />
                <div className="card-body banner-body card-img-overlay text-white px-2">
                  <h2 className="card-title">GOLANG</h2>
                  <div className="roadmap-logo">
                    <DiPhp></DiPhp>
                  </div>
                </div>
              </div>
            </SwiperSlide>
            <SwiperSlide>Slide 2</SwiperSlide>
            <SwiperSlide>Slide 3</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 5</SwiperSlide>
            <SwiperSlide>Slide 6</SwiperSlide>
            <SwiperSlide>Slide 7</SwiperSlide>
            <SwiperSlide>Slide 8</SwiperSlide>
            <SwiperSlide>Slide 9</SwiperSlide>
          </Swiper>
        </div>
      </div>
    </section>
  );
};

export default RoadMap;
