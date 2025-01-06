import DeveloperProtectedRoute from "@/components/pages/backend/access/DeveloperProtectedRoute";
import Advertisement from "@/components/pages/backend/advertisement/Advertisement";
import Category from "@/components/pages/backend/category/Category";
import Dashboard from "@/components/pages/backend/dashboard/Dashboard";
import Foods from "@/components/pages/backend/Foods/Foods";
import Developer from "@/components/pages/backend/settings/developer/Developer";

import DeveloperList from "@/components/pages/backend/settings/developer/DeveloperList";
import Role from "@/components/pages/backend/settings/role/Role";
import Settings from "@/components/pages/backend/settings/Settings";
import User from "@/components/pages/backend/settings/user/User";

export const routeDeveloper = [
  {
    route: `/developer/`,
    element: (
      <DeveloperProtectedRoute>
        <Developer />
      </DeveloperProtectedRoute>
    ),
  },
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
    element: (
      <DeveloperProtectedRoute>
        <Developer />
      </DeveloperProtectedRoute>
    ),
  },

  // {
  //   route: `/developer/settings/developer`,
  //   element: <Developer />,
  // },

  {
    route: `/developer/settings/users`,
    element: <User />,
  },
];