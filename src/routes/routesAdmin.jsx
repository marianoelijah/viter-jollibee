import Advertisement from "@/components/pages/backend/advertisement/Advertisement";
import Category from "@/components/pages/backend/category/Category";
import Dashboard from "@/components/pages/backend/dashboard/Dashboard";
import Foods from "@/components/pages/backend/foods/Foods";
import Developer from "@/components/pages/backend/settings/developer/Developer";
import Role from "@/components/pages/backend/settings/role/Role";
import Settings from "@/components/pages/backend/settings/Settings";

export const routesAdmin = [
  {
    route: `/admin/dashboard`,
    element: <Dashboard />,
  },
  {
    route: `/admin/advertisement`,
    element: <Advertisement />,
  },
  {
    route: `/admin/category`,
    element: <Category />,
  },
  {
    route: `/admin/foods`,
    element: <Foods />,
  },
  {
    route: `/admin/settings`,
    element: <Settings />,
  },
  {
    route: `/admin/settings/role`,
    element: <Role />,
  },
  {
    route: `/admin/settings/developer`,
    element: <Developer />,
    },
  
  
];