import { setIsAdd } from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Plus } from "lucide-react";
import React from "react";
import Footer from "../partials/Footer";
import Header from "../partials/Header";
import SearchBar from "../partials/SearchBar";
import SideNavigation from "../partials/SideNavigation";

import ModalError from "../partials/modals/ModalError";
import ModalAddFoods from "./ModalAddFoods";
import FoodsTable from "./FoodsTable";
import ToastSuccess from "../partials/ToastSuccess";

const Foods = () => {
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
          <SideNavigation menu="foods"  submenu="users"/>
          <main>
            <Header title="Foods" subtitle="Manage Kiosk Foods" />
            <div className="p-8">
              <div className="flex justify-between items-center ">
                <SearchBar />

                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <FoodsTable setIsAdd={setIsAdd} setItemEdit={setItemEdit} />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.validate && <ModalValidation />}
      {store.error && <ModalError />}
      {store.success && <ToastSuccess />}
      {store.isAdd && <ModalAddFoods itemEdit={itemEdit} />}
    </>
  );
};

export default Foods;