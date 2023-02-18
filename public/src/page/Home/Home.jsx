import React from "react";
import Navbar from "../../components/Navbar/Navbar";
import Banner from "../../components/Banner/Banner";
import RoadMap from "../../components/RoadMap/RoadMap";
import Category from "../../components/Category/Category";
import "./Home.css";

const Home = () => {
  return (
    <div>
      <Navbar></Navbar>
      <Banner></Banner>
      <RoadMap></RoadMap>
      <Category></Category>
    </div>
  );
};

export default Home;
