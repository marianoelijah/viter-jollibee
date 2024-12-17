import useQueryData from "@/components/custom-hook/useQueryData";
import Loadmore from "@/components/partials/LoadMore";
import ModalDelete from "@/components/partials/modal/ModalDelete";
import ModalRestore from "@/components/partials/modal/ModalRestore";
import FetchingSpinner from "@/components/partials/spinner/FetchingSpinner";
import TableLoader from "@/components/partials/TableLoader";
import {
  setIsAdd,
  setIsArchive,
  setIsDelete,
  setIsRestore,
} from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Archive, ArchiveRestore, FilePenLine, Trash2 } from "lucide-react";
import React from "react";
import IconNoData from "../../partials/IconNoData";
import IconServerError from "../../partials/IconServerError";
import ModalArchive from "../../partials/modals/ModalArchive";
import Pills from "../../partials/Pills";

const User = () => {
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
              <UserList setItemEdit={setItemEdit} />
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

export default User;