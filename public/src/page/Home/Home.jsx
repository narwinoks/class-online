import React from "react";
import Navbar from "../../components/Navbar/Navbar";
import Banner from "../../components/Banner/Banner";
import RoadMap from "../../components/RoadMap/RoadMap";
import Category from "../../components/Category/Category";
import Popular from "../../components/Popular/Popular";
import Footer from "../../components/Footer/Footer";
import "./Home.css";

const Home = () => {
  return (
    <div>
      <Navbar></Navbar>
      <div className="bg-light">
        <Banner></Banner>
        <RoadMap></RoadMap>
        <Category></Category>
        <Popular></Popular>
        <Footer></Footer>
      </div>
    </div>
  );
};

export default Home;
