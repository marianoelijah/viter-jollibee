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

const UserList = ({ setItemEdit }) => {
  const [id, setIsId] = React.useState("");
  const { store, dispatch } = React.useContext(StoreContext);
  const [dataItem, setDataItem] = React.useState(null);

  let counter = 1;

  const handleEdit = (item) => {
    dispatch(setIsAdd(true));
    setItemEdit(item);
  };

  const handleDelete = (item) => {
    dispatch(setIsDelete(true));
    setIsId(item.role_aid);
    setDataItem(item);
  };

  const handleArchive = (item) => {
    dispatch(setIsArchive(true));
    setIsId(item.role_aid);
  };

  const handleRestore = (item) => {
    dispatch(setIsRestore(true));
    setIsId(item.role_aid);
  };

  const {
    isFetching,
    isLoading,
    error,
    data: result,
    status,
  } = useQueryData(
    `/v2/role`, // endpoint
    "get", // method
    "role" // key
  );

  return (
    <>
      <div className="p-4 bg-secondary rounded-md mt-10 border border-line relative">
        {isFetching && !isLoading && <FetchingSpinner />}
        <div className="table-wrapper custom-scroll">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Role Name</th>
                <th>Description</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {isLoading && (
                <tr>
                  <td colSpan="100%">
                    <TableLoader count={20} cols={5} />
                  </td>
                </tr>
              )}
              {result?.count === 0 && (
                <tr>
                  <td colSpan="100%">
                    <IconNoData />
                  </td>
                </tr>
              )}
              {error && (
                <tr>
                  <td colSpan="100%">
                    <IconServerError />
                  </td>
                </tr>
              )}

              {result?.count > 0 &&
                result.data.map((item, key) => (
                  <tr key={key}>
                    <td>{counter++}.</td>
                    <td>
                      {item.role_is_active === 1 ? (
                        <Pills text="Active" />
                      ) : (
                        <Pills text="Inactive" />
                      )}
                    </td>
                    <td>{item.role_name}</td>
                    <td>{item.role_description}</td>
                    <td></td>
                    <td>
                      <ul className="table-action">
                        {item.role_is_active === 1 ? (
                          <>
                            <li>
                              <button
                                type="button"
                                className="tooltip"
                                data-tooltip="Edit"
                                onClick={() => handleEdit(item)}
                              >
                                <FilePenLine />
                              </button>
                            </li>
                            <li>
                              <button
                                type="button"
                                className="tooltip"
                                data-tooltip="Archive"
                                onClick={() => handleArchive(item)}
                              >
                                <Archive />
                              </button>
                            </li>
                          </>
                        ) : (
                          <>
                            <li>
                              <button
                                type="button"
                                className="tooltip"
                                data-tooltip="Restore"
                                onClick={() => handleRestore(item)}
                              >
                                <ArchiveRestore />
                              </button>
                            </li>
                            <li>
                              <button
                                type="button"
                                className="tool-tip"
                                data-tooltip="Delete"
                                onClick={() => handleDelete(item)}
                              >
                                <Trash2 />
                              </button>
                            </li>
                          </>
                        )}
                      </ul>
                    </td>
                  </tr>
                ))}
            </tbody>
          </table>

          <Loadmore />
        </div>
        {store.isDelete && (
          <ModalDelete
            setIsDelete={setIsDelete}
            mysqlApiDelete={`/v2/role/${id}`}
            queryKey={"role"}
            item={dataItem.role_name}
          />
        )}
        {store.isArchive && (
          <ModalArchive
            setIsArchive={setIsArchive}
            mysqlEndpoint={`/v2/role/active/${id}`}
            queryKey={"role"}
          />
        )}
        {store.isRestore && (
          <ModalRestore
            setIsRestore={setIsRestore}
            mysqlEndpoint={`/v2/role/active/${id}`}
            queryKey={"role"}
          />
        )}
      </div>
    </>
  );
};

export default UserList;