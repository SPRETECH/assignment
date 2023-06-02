
import React from "react";
import { Route, Routes } from 'react-router-dom';
import ReactDOM from 'react-dom'
import Home from "./Pages/Home";
import Register from "./Pages/Register";
import Login from "./Pages/Login";
import CreateAsset from "./Pages/CreateAsset";
import EditAsset from "./Pages/EditAsset";

const AppRoutes = () => {

    return (
        <>
        <Routes>
        <Route exact path={"/app"} Component={Home} key={"home"} />
        <Route exact path={"/app/register"} element={<Register />} />
        <Route exact path={"/app/login"} Component={Login}  />
        <Route exact path={"create-asset"} Component={CreateAsset} />
        <Route exact path={"edit-asset"} Component={EditAsset} />
        </Routes>
        </>
    );
}

export default AppRoutes;
