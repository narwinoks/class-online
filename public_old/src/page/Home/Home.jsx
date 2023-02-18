import React from "react";
import Navbar from "../../components/Navbar/Navbar";
import Banner from "../../components/Banner/Banner";
import RoadMap from "../../components/RoadMap/RoadMap";
import "./Home.css";

const Home = () => {
  return (
    <div>
      <Navbar></Navbar>
      <Banner></Banner>
      <RoadMap></RoadMap>
    </div>
  );
};

export default Home;
