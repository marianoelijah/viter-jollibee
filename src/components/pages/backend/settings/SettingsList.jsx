import React from "react";
import { FaChevronRight, FaDev, FaUsers, FaUsersCog } from "react-icons/fa";
import { NavLink } from "react-router-dom";

const SettingsList = () => {
  const links = [
    {
      title: "Role",
      slug: "/admin/settings/role",
      icon: <FaUsersCog size={20} />,
    },
    {
      title: "Developer",
      slug: "/admin/settings/developer",
      icon: <FaDev size={20} />,
    },
    {
      title: "Users",
      slug: "/admin/settings/users",
      icon: <FaUsers size={20} />,
    },
  ];

  return (
    <>
      <ul>
        {links.map((item, key) => {
          return (
            <li key={key} className="flex gap-2 text-base items-center ">
              <NavLink
                to={`${item.slug}`}
                className={
                  "flex item-center gap-2 justify-between py-2 w-full hover:bg-gray-100/5"
                }
              >
                <div className="flex items-center gap-2">
                  {item.icon}
                  {item.title}
                </div>
              </NavLink>
              <div>
                <FaChevronRight />
              </div>
            </li>
          );
        })}
        <li></li>
      </ul>
    </>
  );
};

export default SettingsList;
