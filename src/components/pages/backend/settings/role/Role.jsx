import { FaPlus } from "react-icons/fa";
import Footer from "../../partials/Footer";
import ModalAddRole from "./ModalAddRole";
import { Plus } from "lucide-react";
import ModalSuccess from "@/components/partials/modal/modalSuccess";
import ModalError from "../../partials/modals/ModalError";
import Header from "../../partials/Header";
import RoleList from "./RoleList";
import React from "react";
import { StoreContext } from "@/components/store/storeContext";
import SideNavigation from "../../partials/SideNavigation";
import { setIsAdd } from "@/components/store/storeAction";

const Role = () => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);

  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };
  return (
    <>
      <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="settings" />
          <main>
            <Header title="Role" subtle="Welcome to Jollibee" />
            <div className="p-5">
              <div className="flex items-end justify-between">
                <div></div>
                <button type="button" className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <RoleList />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.success && <ModalSuccess />}
      {store.success && <ModalError />}
      {store.isAdd && <ModalAddRole itemEdit={itemEdit} />}
    </>
  );
};

export default Role;
