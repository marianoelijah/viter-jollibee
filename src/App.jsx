import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { Route, BrowserRouter as Router, Routes } from "react-router-dom";
import ForgotPassword from "./components/pages/backend/access/ForgotPassword";
import Login from "./components/pages/backend/access/Login";
import SetPassword from "./components/pages/backend/access/SetPassword";
import Order from "./components/pages/frontend/Order";
import Welcome from "./components/pages/frontend/Welcome";
import { StoreProvider } from "./components/store/storeContext";
import { routesDeveloper } from "./routes/RoutesDeveloper";
import { routesAdmin } from "./routes/routesAdmin";
import DeveloperCreatePassword from "./components/pages/backend/access/create-password/DeveloperCreatePassword";


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

            {routesDeveloper.map((item, key) => {
              return (
                <Route path={item.route} key={key} element={item.element} />
              );
            })}

            {/* <Route path="/admin/advertisement" element={<Advertisement />} />
            <Route path="/admin/settings" element={<Settings />} />
            <Route path="/admin/settings/role" element={<Role />} />
            <Route path="/admin/settings/developer" element={<Settings />} />
            <Route path="/admin/settings/admin" element={<Settings />} />
            <Route path="/admin/foods" element={<Foods />} />
            <Route path="/admin/category" element={<Category />} />
            <Route path="/admin/dashboard" element={<Dashboard />} /> */}
            <Route path="/admin/login" element={<Login />} />
            <Route path="/admin/setpassword" element={<SetPassword />} />
            <Route path="/admin/developercreatepassword" element={<DeveloperCreatePassword />} />
            <Route path="/admin/forgotpassword" element={<ForgotPassword />} />
          </Routes>
        </Router>
      </StoreProvider>
    </QueryClientProvider>
  );
};

export default App;