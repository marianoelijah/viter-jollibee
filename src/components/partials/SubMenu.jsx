import React from "react";
import { Link } from "react-router-dom";

const SubMenu = ({ menu }) => {
  return (
    <div className="pt-2 ml-5">
      <ul className="flex flex-col gap-2 ">
        <li>
          <Link to="/settings/departments">Departments</Link>
        </li>
        <li>
          <Link to="/settings/services">Services</Link>
        </li>
        <li>
          <Link to="/settings/position">Position</Link>
        </li>
      </ul>
    </div>
  );
};

export default SubMenu;
