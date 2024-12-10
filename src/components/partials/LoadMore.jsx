import React from "react";
import ButtonSpinner from "./spinner/ButtonSpinner";

const Loadmore = ({
  fetchNextPage,
  isFetchingNextPage,
  hasNextPage,
  result,
  setPage,
  page,
  refView,
}) => {
  if (page === result?.total_pages) {
    return (
      <>
        {isFetchingNextPage ? (
          <button
            type="button"
            disabled={isFetchingNextPage}
            className="loadmore h-full relative my-8 text-primary p-1.5 rounded-full w-36 disabled:opacity-50 disabled:cursor-not-allowed disabled:!bg-transparent"
          >
            <ButtonSpinner />
          </button>
        ) : (
          <div className="loadmore my-8 p-1.5 text-center text-xs">
            End of list.
          </div>
        )}
      </>
    );
  }
  if (hasNextPage) {
    return (
      <button
        ref={refView}
        type="button"
        disabled={isFetchingNextPage}
        onClick={() => {
          setPage((prev) => prev + 1);
          fetchNextPage();
        }}
        className="loadmore h-full relative my-8 text-primary p-1.5 rounded-full w-36 mx-auto disabled:opacity-50 disabled:cursor-not-allowed disabled:!bg-transparent"
      >
        {isFetchingNextPage ? <ButtonSpinner /> : <span>Load more</span>}
      </button>
    );
  }
};

export default Loadmore;
