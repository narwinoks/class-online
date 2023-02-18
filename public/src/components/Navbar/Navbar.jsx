import React from "react";
import "./navbar.css"
import { FaBeer,FaAirFreshener } from 'react-icons/fa';
import {BsCheckCircle,BsCheckCircleFill  } from 'react-icons/bs';


const Navbar = () => {
  return (
    <div className="mb-5">
    <nav className="navbar navbar-expand-xl navbar-light bg-white shadow px-lg-5">
      <div className="container px-lg-5">
        <a className="navbar-brand" href="#">
          <img src="https://codepolitan.com/assets/img/codepolitan-logo.png" height={45} width="auto" alt="code" />
        </a>
        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span className="navbar-toggler-icon" />
        </button>
        <div className="container fw-bold">
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li className="">
                <form className="d-flex">
                  <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                </form>
              </li>
            <li className="nav-item dropdown mx-2">
              <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">Courses</a>
              <ul className="dropdown-menu large">
                <div className="container">
                <div className="row mx-3 my-2">
                  <div className="col-lg-4">
                    <div className="row">
                      <div className="col-12 mb-3">
                        <li>
                          <div className="py-1 border-bottom small fw-bold">Kategori</div>
                        </li>
                      </div>
                      <div className="col-12 p-0 mb-2">
                        <li>
                          <a className="dropdown-item px-0 py-2" href="/library/?type=web">
                            <div className="d-flex align-items-start">
                              <div className="ms-2 my-auto">
                                <h6 style={{fontWeight: 'normal', fontSize: 'smaller', marginBottom: 0}}>Web Development</h6>
                                <small className="text-muted" style={{fontSize: 'small'}} />
                              </div>
                            </div>
                          </a>
                        </li>
                      </div>
                    </div>
                  </div>
                  <div className="col-lg-4">
                    <div className="row">
                      <div className="col-12 mb-3">
                        <li>
                          <div className="py-1 border-bottom small fw-bold">Teknologi Populer</div>
                        </li>
                      </div>
                      <div className="col-12 p-0 mb-2">
                        <li>
                          <a className="dropdown-item px-0 py-2" href="/library/?type=laravel">
                            <div className="d-flex align-items-start">
                              <div className="ms-2 my-auto">
                                <h6 style={{fontWeight: 'normal', fontSize: 'smaller', marginBottom: 0}}>Laravel</h6>
                                <small className="text-muted" style={{fontSize: 'small'}} />
                              </div>
                            </div>
                          </a>
                        </li>
                      </div>
                    </div>
                  </div>
                    <div className="col-lg-4 border-lg-start">
                      <div className="row">
                        <div className="col-12 p-0">
                          <li>
                            <a className="dropdown-item px-0 py-2" href="#">
                              <div className="d-flex align-items-start">
                                <div className="my-auto mx-auto ps-2">
                                  <div className="rounded icon">
                                    <BsCheckCircleFill className="avatar-icon"></BsCheckCircleFill>
                                  </div>
                                </div>
                                <div className="ms-2 my-auto">
                                  <h6 style={{fontWeight: 'bold', fontSize: 'smaller', marginBottom: 0}}>Kelas Terbaru</h6>
                                  <small className="text-muted" style={{fontSize: 'small'}}>Kelas Online Terbaru</small>
                                </div>
                              </div>
                            </a>
                          </li>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
              </ul>
            </li>
            <li className="nav-item dropdown mx-2">
              <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">EXPLORE</a>
              <ul className="dropdown-menu large">
                <div className="container">
                  <div className="row">
                    <div className="col-6">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </div>
                    <div className="col-6">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li className="nav-item dropdown mx-2">
              <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">PROGRAM</a>
              <ul className="dropdown-menu">
                <div className="container">
                  <div className="row">
                    <div className="col-6">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li className="nav-item dropdown mx-2">
              <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">PARTNERSHIP</a>
              <ul className="dropdown-menu">
                <div className="container">
                  <div className="row">
                    <div className="col-6">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li className="nav-item dropdown mx-2">
               <button type="button" className="btn btn-light px-3 mx-1">Login</button>
            </li>
            <li className="nav-item dropdown mx-2">
               <button type="button" className="btn btn-primary px-3 mx-1">REGISTER</button>
            </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    </div>
  );
};

export default Navbar;
