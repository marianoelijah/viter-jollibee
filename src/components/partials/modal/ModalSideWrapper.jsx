import { setIsAdd, setIsCompanyInfoEdit, setIsShow } from "@/store/storeAction";
import { StoreContext } from "@/store/storeContext";
import React from "react";

const ModalSideWrapper = (props) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const handleClose = () => {
    dispatch(setIsAdd(false));
    dispatch(setIsCompanyInfoEdit(false));
  };
  return (
    <div className=" fixed top-0 left-0 h-full w-full flex justify-end z-50">
      <div
        className=" backdrop bg-black/60 h-full w-full absolute top-0 left-0 z-[-1] "
        onClick={handleClose}
      ></div>
      {props.children}
    </div>
  );
};

export default ModalSideWrapper;
