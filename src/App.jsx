import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Advertisement from "./components/pages/backend/advertisement/Advertisement";
import { StoreProvider } from "./components/store/storeContext";
import Foods from "./components/pages/backend/Foods/Foods";
import Category from "./components/pages/backend/category/Category";
import Dashboard from "./components/pages/backend/dashboard/Dashboard";
import Login from "./components/pages/backend/access/Login";
import SetPassword from "./components/pages/backend/access/SetPassword";
import ForgotPassword from "./components/pages/backend/access/ForgotPassword";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import Settings from "./components/pages/backend/settings/Settings";
import Role from "./components/pages/backend/settings/role/Role";
import DeveloperCreatePassword from "./components/pages/backend/access/create-password/DeveloperCreatePassword";
import DeveloperLogin from "./components/pages/backend/access/DeveloperLogin";
import Welcome from "./components/pages/frontend/Welcome";
import Order from "./components/pages/frontend/Order";
import { routesAdmin } from "./routes/routesAdmin";
import { routeDeveloper } from "./routes/routesDeveloper";
const App = () => {
  const queryClient = new QueryClient();

  return (
    <QueryClientProvider client={queryClient}>
      <StoreProvider>
        <Router>
          <Routes>
            <Route index element={<Welcome />} />
            <Route path="/order" element={<Order />} />

            {routesAdmin.map((item, key) => {
              return (
                <Route path={item.route} key={key} element={item.element} />
              );
            })}
            {routeDeveloper.map((item, key) => {
              return (
                <Route path={item.route} key={key} element={item.element} />
              );
            })}
            {/* <Route path="/admin/dashboard" element={<Dashboard />} />
            <Route path="/admin/advertisement" element={<Advertisement />} />
            <Route path="/admin/category" element={<Category />} />
            <Route path="/admin/foods" element={<Foods />} />
            <Route path="/admin/settings" element={<Settings />} />
            <Route path="/admin/settings/role" element={<Role />} />
            <Route path="/admin/settings/developer" element={<Settings />} />
            <Route path="/admin/settings/admin" element={<Settings />} /> */}

            <Route
              path="/developer/create-password"
              element={<DeveloperCreatePassword />}
            />
            <Route path="/developer/login" element={<DeveloperLogin />} />

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