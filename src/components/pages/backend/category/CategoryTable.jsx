import {
  setIsAdd,
  setIsArchive,
    setIsConfirm,
    setIsDelete,
    setIsEdit,
    setIsRestore,
  } from "@/components/store/storeAction";
  import { StoreContext } from "@/components/store/storeContext";
  import {
    Archive,
    ArchiveRestore,
    FilePenLine,
    Trash2,
  } from "lucide-react";
  import React from "react";
  import LoadMore from "../partials/LoadMore";
  import ModalConfirm from "../partials/modals/ModalConfirm";
  import ModalDelete from "../partials/modals/ModalDelete";
  import Pills from "../partials/Pills";
import useQueryData from "@/components/custom-hook/useQueryData";
import Status from "@/components/partials/Status";
import ModalArchive from "@/components/partials/modal/ModalArchive";
import ModalRestore from "@/components/partials/modal/ModalRestore";


  
const CategoryTable = ({ setIsCategoryEdit }) => {
  const [id, setIsId] = React.useState("");
  const { store, dispatch } = React.useContext(StoreContext);

  let counter = 1;

  const handleEdit = (item) => {
    dispatch(setIsAdd(true));
    setIsCategoryEdit(item);
  };

  const handleDelete = (item) => {
    dispatch(setIsDelete(true));
    setIsId(item.category_aid);
  };

  const handleRestore = (item) => {
    dispatch(setIsRestore(true));
    setIsId(item.category_aid);
  };

  const handleArchive = (item) => {
    dispatch(setIsArchive(true));
    setIsId(item.category_aid);
  };

 
  

    return (
      <>
       <div className="p-4 bg-secondary rounded-md mt-10 border border-line relative">
        {/* <SpinnerTable /> */}
        <div className="table-wrapper custom-scroll">
          {/* <TableLoader count={10} cols={4} /> */}
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Title</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {/* <tr>
                <td colSpan={100}>
                  <IconNoData />
                </td>
              </tr>
              <tr>
                <td colSpan={100}>
                  <IconServerError />
                </td>
              </tr> */}

              {result?.count > 0 &&
                result.data.map((item, key) => (
                  <tr key={key}>
                    <td>{counter++}.</td>
                    <td>
                      {item.category_is_active === 1 ? (
                        <Status text="Active" />
                      ) : (
                        <Status text="inactive" />
                      )}
                    </td>
                    <td>{item.category_title}</td>
                    <td>
                      <ul className="table-action">
                        {item.category_is_active ? (
                          <>
                            <li>
                              <button className="tooltip" data-tooltip="Edit">
                                <FilePenLine onClick={() => handleEdit(item)} />
                              </button>
                            </li>
                            <li>
                              <button
                                className="tooltip"
                                data-tooltip="Archive"
                              >
                                <Archive onClick={() => handleArchive(item)} />
                              </button>
                            </li>
                          </>
                        ) : (
                          <>
                            <li>
                              <button
                                className="tooltip"
                                data-tooltip="Restore"
                              >
                                <ArchiveRestore
                                  onClick={() => handleRestore(item)}
                                />
                              </button>
                            </li>
                            <li>
                              <button
                                className="tool-tip"
                                data-tooltip="Delete"
                              >
                                <Trash2 onClick={() => handleDelete(item)} />
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

          <LoadMore />
        </div>
      </div>
  
      {store.isDelete && (
        <ModalDelete
          setIsDelete={setIsDelete}
          mysqlApiDelete={`/v2/category/${id}`}
          queryKey={"category"}
        />
      )}
      {store.isArchive && (
        <ModalArchive
          setIsArchive={setIsArchive}
          mysqlEndpoint={`/v2/category/active/${id}`}
          queryKey={"category"}
        />
      )}
      {store.isRestore && (
        <ModalRestore
          setIsRestore={setIsRestore}
          mysqlEndpoint={`/v2/category/active/${id}`}
          queryKey={"category"}
        />
      )}
        
      </>
    );
  };
  
  export default CategoryTable;