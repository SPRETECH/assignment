import React from "react";
import Header from "../Components/Header";
import axios from "axios";
import { useState } from "react";
import { Form } from "react-bootstrap";
import { useNavigate } from "react-router-dom";

const Login = () => {

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const [userId, setUserId] = useState(0); 

    const navigate = useNavigate();

    

    const handleSubmit = (e) => {
        e.preventDefault();
        
        let basicRequest = `http://localhost:8080/users/user-login?`

    

        if(email){
            basicRequest += `&email=${email}`
        }
        if(password){
            basicRequest += `&password=${password}`
        }

        console.log(basicRequest);

        axios.post(basicRequest).then(data=> {
            console.log(data.data);
            if(data !== undefined){
                console.log(data.data)
                if(data.data !== undefined){
        
                    if(data.data.status === "success"){
                        localStorage.setItem("userId", data.data.userId)
                        return navigate('/app')
                    }
                }
            }
    })
    }
  return (
    <>
      <Header />
      <Form.Group></Form.Group>
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <h1 class="text-center">Login</h1>

       
              <div class="mb-3">
                <label for="InputForEmail" class="form-label">
                  Email address
                </label>
                <input
                  type="email"
                  onChange={e => setEmail(e.target.value)}
                  name="email"
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
              <button 
              onClick={handleSubmit}
              class="btn btn-primary">
                Login
              </button>
          </div>
        </div>
      </div>
    </>
  );
};

export default Login;
