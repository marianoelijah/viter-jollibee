import React from "react";
import { setSuccess } from "../../../store/StoreAction";
import { StoreContext } from "../../../store/StoreContext";
import { GetFocus, devNavUrl } from "../../helpers/functions-general";

const ModalSuccess = () => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [animate, setAnimate] = React.useState("-translate-y-60");
  GetFocus("btnClose");

  const handleClose = () => {
    setAnimate("-translate-y-60");
    setTimeout(() => {
      dispatch(setSuccess(false));
      // if (store.isAccountUpdated) {
      //   localStorage.removeItem("glatoken");
      //   store.credentials.data.role_is_developer === 1
      //     ? window.location.replace(`${devNavUrl}/developer/login`)
      //     : window.location.replace(`${devNavUrl}/login`);
      //   dispatch(setIsAccountUpdated(false));
      //   return;c
      // }
    }, 200);
  };

  React.useEffect(() => {
    setAnimate("");

    setTimeout(() => {
      handleClose();
    }, 3000);
  }, []);
  return (
    <>
      <div
        className={`drop-shadow-2xl fixed z-[99] top-10 left-1/2 -translate-x-1/2 flex items-center justify-between w-full gap-2 max-w-sm p-4 mb-4 text-dark bg-white rounded-lg shadow-[0_3px_10px_rgb(0,0,0,0.2)] transform duration-200 ease-in-out ${animate}`}
      >
        <div className="flex items-center gap-3">
          <div className="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
            <svg
              className="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span className="sr-only">Check icon</span>
          </div>
          <div className="ms-3 text-sm font-normal pr-4 ">{store.message}</div>
        </div>

        <button
          type="button"
          className="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
          id="btnClose"
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

export default ModalSuccess;
