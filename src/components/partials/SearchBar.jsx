import React from "react";
import { FaSearch } from "react-icons/fa";
import { setError, setIsSearch, setMessage } from "../../store/StoreAction";
import { MdOutlineSearch } from "react-icons/md";

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
      className="search-box"
    >
      <div className="search">
        <input
          id="search"
          type="search"
          placeholder="Search here . . ."
          ref={search}
          onChange={(e) => handleChange(e)}
        />
        <div className="search-icon">
          <MdOutlineSearch />
        </div>
      </div>
      {/* {store.isSearch && (
        <p>Result: {isFetching ? "Searching..." : result?.[0].count}</p>
      )} */}
    </form>
  );
};

export default SearchBar;
