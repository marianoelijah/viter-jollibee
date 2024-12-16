import useQueryData from "@/components/custom-hook/useQueryData";
import { imgPath } from "@/components/helpers/functions-general";
import React from "react";
import TableLoader from "../backend/partials/TableLoader";
import FetchingSpinner from "@/components/partials/spinner/FetchingSpinner";

const SideNav = ({ setCategoryId, isLoading, isFetching, result }) => {
  const handleClickCategory = (item) => {
    setCategoryId(item.category_aid);
  };

  return (
    <>
      <h5 className="mb-0 text-center pt-2 text-sm">Menu</h5>
      <ul className="relative">
        {isFetching && isLoading && <FetchingSpinner />}
        {isLoading && <TableLoader cols={1} count={15} />}
        {
          <button
            type="button"
            onClick={() => handleClickCategory(item)}
            className="w-full mx-auto"
          >
            <img
              src={`${imgPath}/jollibee logo.png`}
              alt=""
              className="w-16 mx-auto py-2"
            />
            <small className="text-xs">All</small>
          </button>
        }

        {result?.count > 0 &&
          result.data.map((item, key) => (
            <li className="mb-3" key={key}>
              <button type="button" onClick={() => handleClickCategory(item)}>
                <img src={`${imgPath}/${item.category_image}`} />
                <small className="text-xs">{item.category_title}</small>
              </button>
            </li>
          ))}
      </ul>
    </>
  );
};

export default SideNav;
