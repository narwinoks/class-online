import React from "react";
import { Link } from "react-router-dom";
import "./Popular.css";

const Popular = () => {
  return (
    <section className="popular bg-light">
      {" "}
      <div className="container">
        <div className="row mt-5 mb-5">
          <div className="col-md-6">
            <h1 className="h2">Kelas Popular Minggu Ini</h1>
          </div>
          <div className="col-md-6 text-end text-success">
            <Link to="/home">Lihat Semua</Link>
          </div>
          <div className="col-md-3">
            <a className="link">
              <div className="card border-0 shadow-sm my-2 card_popular">
                <img
                  src="https://image.web.id/images/Membuat-Realtime-Chatroom-dengan-Websocket-Menggunakan-Laravel-dan-Vue.jpg"
                  className="CardCourse_card_img_top__2pvPW card-img-top"
                  loading="lazy"
                />
                <div className="card-body">
                  <span>
                    <small>By Winarno</small>
                  </span>
                  <h2 className="h5">
                    Deploy Projek Machine Learning ke Cloud
                  </h2>
                  <p className="text-muted">Beginner</p>
                </div>
                <div className="card-footer bg-white CardCourse_card_footer__8KuSa">
                  <div className="CardCourse_rate_and_price__mx63I">
                    <div className="row justify-content-between">
                      <div className="col-auto">
                        <strong>Beli</strong>
                        <br />
                      </div>
                      <div className="col-auto ms-auto text-end">
                        <span>
                          <strong>Rp 149,000</strong>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div className="col-md-3"></div>
        </div>
      </div>
    </section>
  );
};

export default Popular;
