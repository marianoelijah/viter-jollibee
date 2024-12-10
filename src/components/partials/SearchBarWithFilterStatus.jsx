import React from "react";
import { FaSearch } from "react-icons/fa";
import { setError, setIsSearch, setMessage } from "../../store/StoreAction";
import { MdOutlineSearch } from "react-icons/md";

const SearchBarWithFilterStatus = ({
  search,
  dispatch,
  store,
  result,
  isFetching,
  setOnSearch,
  onSearch,
  isFilter = false,
}) => {
  const handleChange = (e) => {
    if (e.target.value === "") {
      setOnSearch(!onSearch);
      dispatch(setIsSearch(false));
    }
    if (isFilter === true) {
      dispatch(setIsSearch(true));
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
      <div className="search flex items-center relative">
        <div
          type="submit"
          className="absolute pointer-events-none cursor-default left-0 btn-action-table border-0 text-[16px] py-[5px] border-l-0 text-gray-300 border-gray-300 hover:bg-[unset]"
        >
          <FaSearch />
        </div>
        <input
          type="search"
          placeholder="Search here..."
          className="text-xs py-[0px] h-[35px] "
          ref={search}
          onChange={(e) => handleChange(e)}
        />
        <div className="search-icon">
          <MdOutlineSearch />
        </div>
      </div>
    </form>
  );
};

export default SearchBarWithFilterStatus;
