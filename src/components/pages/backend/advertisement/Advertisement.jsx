import { Plus } from "lucide-react";
import React from "react";
import Header from "../partials/Header";
import SearchBar from "../partials/SearchBar";
import Footer from "../partials/Footer";
import SideNavigation from "../partials/SideNavigation";
import AdvertisementTable from "./AdvertisementTable";
import { StoreContext } from "@/components/store/storeContext";
import { setIsAdd } from "@/components/store/storeAction";
import ModalAddAdvertisement from "./ModalAddAdvertisement";
import ModalError from "../partials/modals/ModalError";
import ToastSuccess from "../partials/ToastSuccess";
import ModalValidation from "../partials/modals/ModalValidation";

const Advertisement = () => {
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
          <SideNavigation menu="advertisement" />
          <main>
            <Header
              title="Advertisement"
              subtitle="Manage Kiosk Advertisement"
            />
            <div className="p-1">
              <div className="flex justify-between items-center ">
                <div></div>
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <AdvertisementTable
                itemEdit={itemEdit}
                setItemEdit={setItemEdit}
              />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.validate && <ModalValidation />}
      {store.error && <ModalError />}
      {store.success && <ToastSuccess />}
      {/* <SpinnerWindow /> */}

      {store.isAdd && (
        <ModalAddAdvertisement itemEdit={itemEdit} setItemEdit={setItemEdit} />
      )}
    </>
  );
};

export default Advertisement;