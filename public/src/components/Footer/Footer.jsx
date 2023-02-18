import React from "react";

const Footer = () => {
  return (
    <footer id="Footer" style={{ borderTop: "1px solid rgb(221, 221, 221)" }}>
      <div className="container px-5 mt-5">
        <div className="row">
          <div className="col-6 col-md-3 col-lg-3">
            <h6>JOIN US</h6>
            <nav className="nav flex-column my-3">
              <a className="link" href="#">
                How to Learn
              </a>
              <a className="link" href="#">
                Terms &amp; Conditions
              </a>
              <a className="link" href="#">
                Frequently Asked Questions
              </a>
              <a className="link" href="#">
                Privacy Policy
              </a>
            </nav>
          </div>
          <div className="col-6 col-md-3 col-lg-3">
            <h6>PROGRAM</h6>
            <nav className="nav flex-column my-3">
              <a className="link" href="#">
                KelasFullstack.id
              </a>
              <a className="link" href="#">
                Online Bootcamp Catamyst
              </a>
              <a className="link" href="#">
                Become a Mentor
              </a>
              <a className="link" href="#">
                Karier
              </a>
            </nav>
          </div>
          <div className="col-6 col-md-3 col-lg-3">
            <h6>DEVELOPERS</h6>
            <nav className="nav flex-column my-3">
              <a className="link" href="#">
                Forum Discussions
              </a>
              <a className="link" href="#">
                Hall of Fame
              </a>
              <a className="link" href="#">
                Leaderboard
              </a>
              <a className="link" href="#">
                Mentor
              </a>
            </nav>
          </div>
          <div className="col-6 col-md-3 col-lg-3">
            <h6>COMPANY</h6>
            <nav className="nav flex-column my-3">
              <a className="link" href="#">
                About Codepolitan
              </a>
              <a className="link" href="#">
                Tutorial &amp; Artikel
              </a>
            </nav>
          </div>
        </div>
      </div>
      <hr
        style={{
          height: "1px",
          color: "rgb(204, 204, 204)",
          backgroundColor: "rgb(204, 204, 204)",
        }}
      />
      <div className="container px-5">
        <div className="row">
          <div className="col-md-6 text-center text-md-start">
            <p className="text-muted">
              <small>
                © 2023 CodePolitan. All rights reserved. Made with ❤️ in
                Indonesia.
              </small>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
