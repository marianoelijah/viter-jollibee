import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Welcome from "./components/pages/frontend/Welcome";
import Order from "./components/pages/frontend/Order";

const App = () => {
  return (
   <Router>
     <Routes>
       <Route index element={<Welcome />} />
       <Route path="/order" element={<Order />} />
     </Routes>
   </Router>
  );
};

export default App;