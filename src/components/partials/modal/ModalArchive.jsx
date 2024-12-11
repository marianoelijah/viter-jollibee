import { queryData } from "@/components/helpers/queryData";
import { useMutation, useQueryClient } from "@tanstack/react-query";
import React from "react";
import { FaArchive } from "react-icons/fa";
import { GrFormClose } from "react-icons/gr";
import ButtonSpinner from "../spinner/ButtonSpinner";
import { StoreContext } from "@/components/store/storeContext";

const ModalArchive = ({ setIsArchive, mysqlEndpoint, queryKey, item }) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const handleClose = () => {
    dispatch(setIsArchive(false));
  };

  const queryClient = useQueryClient();

  const mutation = useMutation({
    mutationFn: (values) => queryData(mysqlEndpoint, "put", values),
    onSuccess: (data) => {
      // Invalidate and refetch
      queryClient.invalidateQueries({ queryKey: [queryKey] });
      // dispatch(setIsDelete(false));

      if (!data.success) {
        console.log("May error!");
      } else {
        dispatch(setIsArchive(false));
        console.log("Naysuu!");
      }
    },
  });

  const handleYes = async () => {
    // mutate data
    mutation.mutate({
      isActive: 0,
    });
  };
  return (
    <div className=" fixed top-0 left-0 h-screen w-full flex justify-center items-center z-[999]">
      <div
        className=" backdrop bg-black/80 h-full w-full absolute top-0 left-0 z-[-1] "
        onClick={handleClose}
      ></div>
      <div className="max-w-[450px] w-full bg-white rounded-md">
        <div className="flex items-center justify-between p-4  ">
          <div></div>
          <h2 className="translate-y-2">
            <FaArchive size={30} className="" />
          </h2>
          <button onClick={handleClose}>
            <GrFormClose size={25} />
          </button>
        </div>
        <div className="p-4 text-center">
          <h3 className="text-sm">Are you sure you want to archive {item}?</h3>
          <div className="flex justify-center mt-5 gap-2">
            <button
              className="inline-block rounded-md w-full px-5 py-2 bg-[#9f1659] text-white"
              onClick={handleYes}
            >
              {mutation.isPending ? <ButtonSpinner /> : "Yes"}
            </button>
            <button
              className="inline-block rounded-md w-full px-5 py-2 bg-gray-200 text-gray-800"
              onClick={handleClose}
            >
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ModalArchive;
