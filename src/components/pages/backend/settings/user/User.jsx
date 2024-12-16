import ModalSuccess from "@/components/partials/modal/modalSuccess";
import { setIsAdd } from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Plus } from "lucide-react";
import React from "react";
import Footer from "../../partials/Footer";
import Header from "../../partials/Header";
import ModalError from "../../partials/modals/ModalError";
import SideNavigation from "../../partials/SideNavigation";
import ModalAddRole from "./ModalAddUser";
import UserList from "./UserList";

const User = () => {
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
            <Header title="User" subtle="Welcome to Jollibee" />
            <div className="p-5">
              <div className="flex items-end justify-between">
                <div></div>
                <button
                  type="button"
                  className="btn btn-add"
                  onClick={handleAdd}
                >
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <UserList setItemEdit={setItemEdit} />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.success && <ModalSuccess />}
      {store.success && <ModalError />}
      {store.isAdd && <ModalAddUser itemEdit={itemEdit} />}
    </>
  );
};

export default User;
