import { setError, setIsAdd, setMessage } from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import React from "react";
import DeveloperList from "./DeveloperList";
import ModalAddDeveloper from "./ModalAddDeveloper";
import Role from "../role/Role";
import useQueryData from "@/components/custom-hook/useQueryData";
import SideNavigation from "../../partials/SideNavigation";
import Header from "../../partials/Header";
import Footer from "../../partials/Footer";
import ToastSuccess from "../../partials/ToastSuccess";
import ModalError from "../../partials/modals/ModalError";
import { Plus } from "lucide-react";

const Developer = () => {
  const { dispatch, store } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);

  const { isFetching, data: role } = useQueryData(`/v2/role`, "get", "role");

  const developerRole = role?.data.filter(
    (item) => item.role_is_developer == 1
  );

  const handleAdd = () => {
    if (developerRole?.length === 0) {
      dispatch(setError(true));
      dispatch(setMessage("Developer role is required."));
      return;
    }
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };
  return (
    <>
      <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="settings" />
          <main>
            <Header title="Developer" subtitle="Welcome to Jollibee!" />
            <div className="p-5">
              <div className="flex justify-between items-end">
                <div></div>

                {isFetching ? (
                  "Loading..."
                ) : (
                  <button
                    className="btn btn-add"
                    type="button"
                    onClick={handleAdd}
                  >
                    <Plus size={16} />
                    Add New
                  </button>
                )}
              </div>
              <DeveloperList setItemEdit={setItemEdit} />
            </div>
            <Footer />
          </main>
        </div>
      </section>

      {store.success && <ToastSuccess />}
      {store.error && <ModalError />}
      {store.isAdd && (
        <ModalAddDeveloper itemEdit={itemEdit} developerRole={developerRole} />
      )}
    </>
  );
};

export default Developer;