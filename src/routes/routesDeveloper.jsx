import Advertisement from "@/components/pages/backend/advertisement/Advertisement";
import Category from "@/components/pages/backend/category/Category";
import Dashboard from "@/components/pages/backend/dashboard/Dashboard";
import Foods from "@/components/pages/backend/foods/Foods";
import Developer from "@/components/pages/backend/settings/developer/Developer";
import Role from "@/components/pages/backend/settings/role/Role";
import Settings from "@/components/pages/backend/settings/Settings";

export const routesDeveloper = [
  {
    route: `/developer/dashboard`,
    element: <Dashboard />,
  },
  {
    route: `/developer/advertisement`,
    element: <Advertisement />,
  },
  {
    route: `/developer/category`,
    element: <Category />,
  },
  {
    route: `/developer/foods`,
    element: <Foods />,
  },
  {
    route: `/developer/settings`,
    element: <Settings />,
  },
  {
    route: `/developer/settings/role`,
    element: <Role />,
  },
  {
    route: `/developer/settings/developer`,
    element: <Developer />,
  },
];