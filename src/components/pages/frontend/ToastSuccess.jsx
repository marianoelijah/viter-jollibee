import { CheckCircle } from "lucide-react";
import React from "react";

const ToastSuccess = ({ setIsSuccess }) => {
  React.useEffect(() => {
    setTimeout(() => {
      setIsSuccess(false);
    }, 1000);
  }, []);
  return (
    <>
      <div className="fixed top-3 left-1/2 -translate-x-1/2 z-50">
        <div className=" bg-white  flex items-center gap-2 rounded-md px-4 py-1.5 shadow-2xl">
          <CheckCircle size={14} stroke="green" />
          <p className="mb-0 text-sm ">Successfully Added To Cart!</p>
        </div>
      </div>
    </>
  );
};

export default ToastSuccess;