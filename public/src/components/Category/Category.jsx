import React from "react";
import IconsTreasure from "../../assets/icons8-mongodb-48.png";

const Category = () => {
  return (
    <section className="categories">
      <div className="container">
        <h1 className="mt-5 mb-5">Eksplorasi Materi Codepolitan</h1>
        <div className="row">
          <div className="col-md-3">
            <div className="px-2 my-3">
              <a className="link" href="/library/?type=mongodb">
                <div
                  className="card border-0 shadow mb-4"
                  style={{ borderRadius: "12px" }}
                >
                  <div className="card-body px-3 py-2">
                    <div className="row text-muted">
                      <div className="col-4 my-auto mx-auto">
                        <img src={IconsTreasure} alt="1" />
                      </div>
                      <div className="col-8 my-auto">
                        <h5 className="title-category" style={{ fontSize: "medium", marginBottom: "0px" }}>
                          MongoDB
                        </h5>
                        <span style={{ fontSize: "small" }}>2 Kelas</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Category;
