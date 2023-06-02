
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
        <Route exact path={"/app/register"} Component={Register} />
        <Route exact path={"/app/login"} Component={Login}  />
        <Route exact path={"/app/create-asset"} Component={CreateAsset} />
        <Route exact path={"/app/edit-asset/:id"} Component={EditAsset} />

        /app/edit-asset
        </Routes>
        </>
    );
}

export default AppRoutes;
