import React from "react";
import { menus } from "../menu-data";

const DashboardCard = ({ title = "", filterby = "" }) => {
  const getCardDetails = menus.filter(
    (item) => item.menu_category === filterby
  );

  const getActiveMenu = getCardDetails.filter(
    (item) => item.menu_is_active === true
  );

  return (
    <>
      <div className="card bg-secondary p-4 rounded-md border border-line">
        <small>{title}</small>
        <h2 className="text-4xl mt-1 mb-2">{getCardDetails.length}</h2>
        <ul className="flex gap-5 items-center">
          <li className="flex items-center gap-2">
            <span className="size-2 rounded-full bg-success block"></span>
            {getActiveMenu.length} active
          </li>
          <li className="flex items-center gap-2">
            <span className="size-3 rounded-full bg-gray-500 block"></span>
            {getCardDetails.length - getActiveMenu.length} inactive
          </li>
        </ul>
      </div>
    </>
  );
};

export default DashboardCard;