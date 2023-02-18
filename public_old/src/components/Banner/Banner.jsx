import React from "react";
import "./banner.css";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper";
// Import Swiper styles
import "swiper/css";

const Banner = () => {
  return (
    <section>
      <Swiper
        spaceBetween={30}
        centeredSlides={true}
        autoplay={{
          delay: 2500,
          disableOnInteraction: false,
        }}
        pagination={{
          clickable: true,
        }}
        grabCursor={true}
        modules={[Autoplay]}
        className="mySwiper"
        slidesPerView={"auto"}
      >
        <SwiperSlide>
          <div className="card card_banner">
            <img
              src="https://image.web.id/images/Kelasfullstack-Banner-Depan.png"
              className="card-img-bottom"
              height="200px"
              width="100px"
            />
            <div className="card-body card-img-overlay text-white px-5">
              <h1 className="card-title h2">NODE JS</h1>
              <p className="card-text">
                AngularJS is a Javascript open-source front-end framework that
                is mainly used to develop single-page web applications(SPAs).
              </p>
              <button type="button" className="btn btn-light text-success">
                DETAIL
              </button>
            </div>
          </div>
        </SwiperSlide>
        <SwiperSlide>
          <div className="card card_banner">
            <img
              src="https://image.web.id/images/Kelasfullstack-Banner-Depan.png"
              className="card-img-bottom"
              height="200px"
              width="100px"
            />
            <div className="card-body card-img-overlay text-white px-5">
              <h1 className="card-title h2">NODE JS</h1>
              <p className="card-text">
                AngularJS is a Javascript open-source front-end framework that
                is mainly used to develop single-page web applications(SPAs).
              </p>
              <button type="button" className="btn btn-light text-success">
                DETAIL
              </button>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
    </section>
  );
};

export default Banner;
