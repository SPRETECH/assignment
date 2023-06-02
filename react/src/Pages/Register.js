import React, { useState } from "react";
import Header from "../Components/Header";
import axios from "axios";
import { Form } from "react-bootstrap";
import { useNavigate } from "react-router-dom";

const Register = () => {
    
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confPassword, setConfPassword] = useState('');

  const [user, setUser] = useState();

  const navigate = useNavigate();

  const handleSubmit = () => {
    let basicRequest = `http://localhost:8080/users/register-user?`

    if(name){
        basicRequest += `&name=${name}`
    }
    
    if(email){
        basicRequest += `&email=${email}`
    }
    if(password){
        basicRequest += `&password=${password}`
    }
    if(confPassword){
        basicRequest += `&confpassword=${confPassword}`
    }

    axios.post(basicRequest).then(data=> {
        console.log(data.data);
        if(data !== undefined){
            console.log(data.data)
            return navigate('/app/login')
        }
})
}

  return (
    <>
      <Header />

      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <h1 class="text-center">Register</h1>

            <Form.Group>

              <div class="mb-3">
                <label for="InputForName" class="form-label">
                  Name
                </label>
                <input
                  type="text"
                //   name="name"
                  class="form-control"
                  onChange={e => setName(e.target.value)}
                  id="InputForName"
                />
              </div>
              <div class="mb-3">
                <label for="InputForEmail" class="form-label">
                  Email address
                </label>
                <input
                  type="email"
                  name="email"
                  onChange={e => setEmail(e.target.value)}
                  class="form-control"
                  id="InputForEmail"
                />
              </div>
              <div class="mb-3">
                <label for="InputForPassword" class="form-label">
                  Password
                </label>
                <input
                  type="password"
                  name="password"
                  onChange={e => setPassword(e.target.value)}
                  class="form-control"
                  id="InputForPassword"
                />
              </div>
              <div class="mb-3">
                <label for="InputForConfPassword" class="form-label">
                  Confirm Password
                </label>
                <input
                  type="password"
                  name="confpassword"
                  onChange={e => setConfPassword(e.target.value)}
                  class="form-control"
                  id="InputForConfPassword"
                />
              </div>
              <button 
              onClick={handleSubmit}
              class="btn btn-primary">
                Register
              </button>
              </Form.Group>
          </div>
        </div>
      </div>
    </>
  );
};

export default Register;
