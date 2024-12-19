import React from "react";
import { FaList, FaSearch } from "react-icons/fa";

import { MdOutlineSearch } from "react-icons/md";
import { setError, setIsSearch, setMessage } from "../store/storeAction";

const SearchBar = ({
  search,
  dispatch,
  store,
  result,
  isFetching,
  setOnSearch,
  onSearch,
}) => {
  const handleChange = (e) => {
    if (e.target.value === "") {
      setOnSearch(!onSearch);
      dispatch(setIsSearch(false));
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    let val = search.current.value;

    if (val === " " || val === "") {
      setOnSearch(!onSearch);
      dispatch(setIsSearch(false));
      dispatch(setError(true));
      dispatch(setMessage("Search keyword cannot be space only or blank."));
    } else {
      setOnSearch(!onSearch);
      dispatch(setIsSearch(true));
    }
  };

  return (
    <form
      onSubmit={(e) => {
        handleSubmit(e);
      }}
      className="search-box flex gap-2"
    >
      <div className="search">
        <input
          id="search"
          type="search"
          placeholder="Search here . . ."
          ref={search}
          onChange={(e) => handleChange(e)}
          className="p-1.5 bg-secondary border border-line rounded-md outline-none 
          pl-8 place-holder:opacity:30 placeholder:text-sm w-[250px] block focus:border-accent"
        />
        <div className="search-icon absolute left-2 top-2.5">
          <MdOutlineSearch fill={"white"} />
        </div>
      </div>
      {/* {store.isSearch && ( )} */}
      <p className="leading-none flex items-center gap-2">
        <FaList />
        <span>{isFetching ? "Searching..." : result?.pages[0].count}</span>
      </p>
    </form>
  );
};

export default SearchBar;