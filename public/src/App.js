import logo from "./logo.svg";
import Home from "./page/Home/Home";
import { BrowserRouter, Routes, Route } from "react-router-dom";
// import "./App.css";
// import "./assets/scss/style.scss";
// import "bootstrap/dist/css/bootstrap.min.css";
function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" exact element={<Home />}></Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
