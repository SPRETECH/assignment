import React from "react";

import { Link } from "react-router-dom";

const Header = () => {
  return (
    <>
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <Link class="btn btn-primary btn-sm" to={{ pathname: "/app" }}>Asset management</Link>
        <div>
        <Link class="btn btn-primary btn-sm" to={{ pathname: "/app/login" }}>Login</Link>
        <Link class="btn btn-primary btn-sm" to={{ pathname: "/app/register" }}>Register</Link>

        <Link class="btn btn-primary btn-sm" to={{ pathname: "/app/create-asset" }}>Create Asset</Link>
        
        {/* <a class="btn btn-primary btn-sm ms-2" href="/app/register">Register</a> */}
        </div>
        </div>
      </nav>
    </>
  );
};

export default Header;
