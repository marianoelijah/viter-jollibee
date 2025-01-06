import React from "react";
import UserList from "./DeveloperList";
import SideNavigation from "../../partials/SideNavigation";
import Header from "../../partials/Header";
import Footer from "../../partials/Footer";
import ModalError from "../../partials/Modals/ModalError";
import ToastSuccess from "../../partials/ToastSuccess";
import ModalAddUser from "./ModalAddDeveloper";
import { StoreContext } from "@/components/store/storeContext";
import { Plus } from "lucide-react";
import DeveloperList from "./DeveloperList";
import ModalAddDeveloper from "./ModalAddDeveloper";
import { setError, setIsAdd, setMessage } from "@/components/store/storeAction";
import useQueryData from "@/components/custom-hook/useQueryData";

const Developer = () => {
  const { dispatch, store } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);
  
   const {
     isFetching,
     data: role,
   } = useQueryData(
     `/v2/role`, //endpoint
     "get", //method
     "role" //key
   );

   const developerRole = role?.data.filter((item)=>item.role_is_developer == 1);
   const handleAdd = () => {
     if (developerRole?.length === 0){
      dispatch(setError(true));
      dispatch(setMessage("developer role is required"));
      return;
     } dispatch(setIsAdd(true));
     setItemEdit(null);
   };
  //  console.log(developerRole);
  return (
    <>
      <section className="layout-main">
        <div className="layout-div">
          <SideNavigation menu="settings" />
          <main>
            <Header title="Developer" subtitle="Welcome to Jollibee" />
            <div className="p-5">
              <div className="flex justify-between items-center">
                <div></div>
                {isFetching ? (
                  "Loading..."
                ) : (
                  <button className="btn btn-add" onClick={handleAdd}>
                    <Plus size={16} /> Add New
                  </button>
                )}
              </div>
              <div className="flex items-end"></div>
              <DeveloperList setItemEdit={setItemEdit} />
            </div>

            <Footer />
          </main>
        </div>
      </section>
      {store.error && <ModalError />}
      {store.success && <ToastSuccess />}
      {store.isAdd && <ModalAddDeveloper itemEdit={itemEdit} developerRole={developerRole} />}
    </>
  );
};

export default Developer;