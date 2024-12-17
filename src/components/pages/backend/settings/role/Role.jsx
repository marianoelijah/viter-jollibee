import React from "react";
import RoleList from "./RoleList";
import SideNavigation from "../../partials/SideNavigation";
import Header from "../../partials/Header";
import Footer from "../../partials/Footer";
import { FaPlus } from "react-icons/fa";
import ModalAddRole from "./ModalAddRole";
import { StoreContext } from "@/components/store/storeContext";
import { Plus } from "lucide-react";
import { setIsAdd } from "@/components/store/storeAction";
import ModalSuccess from "@/components/partials/modal/modalSuccess";
import ModalError from "../../partials/modals/ModalError";
import ToastSuccess from "../../partials/ToastSuccess";

const Role = () => {
  const { dispatch, store } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);

  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };

  return (
    <>
      <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="role" />
          <main>
            <Header title="Role" subtitle="Welcome to Jollibee!" />
            <div className="p-5">
              <div className="flex justify-between items-end">
                <div></div>
                <button
                  className="btn btn-add"
                  type="button"
                  onClick={handleAdd}
                >
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <RoleList setItemEdit={setItemEdit} />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.success && <ToastSuccess />}
      {store.error && <ModalError />}
      {/* {store.isAdd && <ModalError />} */}
      {store.isAdd && <ModalAddRole itemEdit={itemEdit} />}
    </>
  );
};

export default Role;