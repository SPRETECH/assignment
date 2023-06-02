import React, { useState } from "react";
import Header from "../Components/Header";
import { Link } from "react-router-dom";

import axios from "axios";

const CreateAsset = () => {


    const [values, setValues] = useState({});


    const handleSubmit = (e) => {
        console.log(values)

        let basicRequest = `http://localhost:8080/asset/save-asset?`

        if(values['name']){
            basicRequest += `&name=${values['name']}`
        }
        if(values['condition']){
            basicRequest += `&condition=${values['condition']}`
        }
        if(values['description']){
            basicRequest += `&description=${values['description']}`
        }
        if(values['estimated_cost']){
            basicRequest += `&estimated_cost=${values['estimated_cost']}`
        }
        if(values['expected_useful_life']){
            basicRequest += `&expected_useful_life=${values['expected_useful_life']}`
        }
        if(values['installation_year']){
            basicRequest += `&installation_year=${values['installation_year']}`
        }

        if(values['quantity']){
            basicRequest += `&quantity=${values['quantity']}`
        }
        if(values['renewable_year']){
            basicRequest += `&renewable_year=${values['renewable_year']}`
        }
        if(values['unit_cost']){
            basicRequest += `&unit_cost=${values['unit_cost']}`
        }

        axios.post(basicRequest).then(data=> {
            console.log(data.data);
            if(data !== undefined){
                setAssets(data.data)
            }
    })


    }

    // console.log(values);
  return (
    <>
      <Header />
      <div class="container-fluid">
        <div class="row justify-content-center text-center">
          <h2>CREATE ASSET</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="mb-3">
                <label for="InputForName" class="form-label">
                  Name
                </label>
                <input
                  type="text"
                  placeholder="Name of Asset"
                  name="name"
                  onChange={e => setValues({...values,"name": e.target.value})}
                  class="form-control"
                  id="InputForName"
                />
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">
                  Description
                </label>
                <input
                  type="text"
                  name="description"
                  onChange={e => setValues({...values,"description": e.target.value})}
                  placeholder="description.."
                  class="form-control"
                  id="description"
                />
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="installation-year" class="form-label">
                      Installation Year
                    </label>
                    <input
                      type="number"
                      placeholder="Example: 1980"
                      minlength="4"
                      maxlength="4"
                      onChange={e => setValues({...values,"installation_year": e.target.value})}
                      name="installation_year"
                      class="form-control"
                      id="installation-year"
                    />
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="expected-useful-life" class="form-label">
                      Ecpected useful Life
                    </label>
                    <input
                      type="number"
                      placeholder="In yearsExample: 50"
                      name="expected_useful_life"
                      onChange={e => setValues({...values,"expected_useful_life": e.target.value})}
                      class="form-control"
                      id="expected-useful-life"
                    />
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="renewable-year" class="form-label">
                      Renewable Year
                    </label>
                    <input
                      type="number"
                      placeholder="Example: 2040"
                      onChange={e => setValues({...values,"renewable_year": e.target.value})}
                      name="renewable_year"
                      class="form-control"
                      id="renewable-year"
                    />
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="condition" class="form-label">
                  Condition
                </label>
                <input
                  type="text"
                  name="condition"
                  onChange={e => setValues({...values,"condition": e.target.value})}

                  placeholder="Example: No Significant deficiencies were observed...."
                  class="form-control"
                  id="condition"
                />
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="quantity" class="form-label">
                      Quantity
                    </label>
                    <input
                      type="number"
                      name="quantity"
                      onChange={e => setValues({...values,"quantity": e.target.value})}
                      placeholder="In numbers Example: 2"
                      class="form-control"
                      id="quantity"
                    />
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="unit-cost" class="form-label">
                      unit Cost
                    </label>
                    <input
                      type="number"
                      placeholder="Example: 70"
                      name="unit_cost"
                      onChange={e => setValues({...values,"unit_cost": e.target.value})}
                      class="form-control"
                      id="unit-cost"
                    />
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="estimated-cost" class="form-label">
                      Estimated Cost
                    </label>
                    <input
                      type="number"
                      placeholder="Example: 80"
                      name="estimated_cost"
                      onChange={e => setValues({...values,"estimated_cost": e.target.value})}
                      class="form-control"
                      id="estimated-cost"
                    />
                  </div>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-6 d-flex justify-content-center">
                  <button

                    onClick={handleSubmit}

                  class="btn btn-primary me-2"
                  >
                    Submit
                  </button>
                  <Link className="btn btn-secondary" to={{ pathname: "/app" }}>Go back</Link>
                  {/* <a href="/app" class="btn btn-secondary shadow-sm">Go back</a> */}
                </div>
              </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default CreateAsset;
