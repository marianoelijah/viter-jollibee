import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Welcome from "./components/pages/frontend/Welcome";
import Order from "./components/pages/frontend/Order";
import Advertisement from "./components/pages/backend/advertisement/Advertisement";
import { StoreProvider } from "./components/store/storeContext";
import Foods from "./components/pages/backend/foods/Foods";
import Category from "./components/pages/backend/category/Category";
import Dashboard from "./components/pages/backend/dashboard/Dashboard";

import SetPassword from "./components/pages/backend/access/SetPassword";
import ForgotPassword from "./components/pages/backend/access/ForgotPassword";
import Login from "./components/pages/backend/access/Login";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";

const App = () => {
  const queryClient = new QueryClient();
  return (
    <QueryClientProvider client={queryClient}>
    <StoreProvider >
      <Router>
       <Routes>
       <Route index element={<Welcome />} />
       <Route path="/order" element={<Order />} />
       <Route path="/admin/dashboard" element={<Dashboard />} />
       <Route path="/admin/advertisement" element={<Advertisement />} />
       <Route path="/admin/foods" element={<Foods />} />
       <Route path="/admin/category" element={<Category />} />
       

       <Route path="/admin/login" element={<Login />} />
       <Route path="/admin/set-password" element={<SetPassword />} />
       <Route path="/admin/forgot-password" element={<ForgotPassword />} />
       </Routes>
      </Router>
    </StoreProvider>
    </QueryClientProvider>
  
  );
};

export default App;