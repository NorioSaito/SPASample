import React from "react";
import {
  BrowserRouter,
  Routes,
  Route,
  Link
} from "react-router-dom";
import Header from './pages/common/header'
import Contents from './pages/contents'
import ContentsCreate from "./pages/contents/create";
import ContentsEdit from "./pages/contents/edit";

const Router = () => {
    return (
        <Header />
    );
}

export default Router