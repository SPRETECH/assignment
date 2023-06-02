import React from 'react';
import { BrowserRouter } from 'react-router-dom';

import Home from './Pages/Home';
import { createRoot } from 'react-dom/client';
import AppRoutes from './AppRoutes';

const container = document.getElementById('react-app');
const root = createRoot(container); // createRoot(container!) if you use TypeScript
root.render(
    <>
    <BrowserRouter>
    {/* <Home /> */}
    <AppRoutes />
    </BrowserRouter>
    </>

);
