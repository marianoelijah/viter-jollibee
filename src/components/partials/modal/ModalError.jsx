import { GetFocus } from "@/components/helpers/functions-general";
import { setError } from "@/store/storeAction";
import { StoreContext } from "@/store/storeContext";
import React from "react";
const ModalError = () => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [animate, setAnimate] = React.useState("-translate-y-60");
  GetFocus("btnClose");

  const handleClose  = () => {
    setAnimate("-translate-y-60");
    setTimeout(() => {
      dispatch(setError(false));
    }, 200);
  };

  React.useEffect(() => {
    setAnimate("");
  }, []);

  return (
    <>
      <div className="drop-shadow-2xl bg-dark/40 h-screen w-full fixed z-[99] top-0 right-0 bottom-0 left-0"></div>
      <div
        className={`fixed z-[99] top-10 left-1/2 -translate-x-1/2 w-full flex items-center justify-between gap-2 max-w-sm p-4 mb-4 text-dark bg-white rounded-lg shadow-[0_3px_10px_rgb(0,0,0,0.2)]  transform duration-200 ease-in-out ${animate}`}
      >
        <div className="flex items-center gap-3">
          <div className="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-100 bg-orange-500 rounded-lg ">
            <svg
              className="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
            </svg>
            <span className="sr-only">Warning icon</span>
          </div>
          <p className="flex items-center gap-3 mb-0 animate-slideUp">
            {store.message}
          </p>
        </div>

        <button
          type="button"
          id="btnClose"
          className="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-2 hover:bg-gray-100 inline-flex items-center justify-center h-fit w-fit "
          onClick={handleClose}
        >
          <span className="sr-only">Close</span>
          <svg
            className="w-3 h-3"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 14 14"
          >
            <path
              stroke="currentColor"
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
            />
          </svg>
        </button>
      </div>
    </>
  );
};

export default ModalError;
