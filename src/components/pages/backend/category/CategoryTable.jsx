import {
  setIsAdd,
    setIsConfirm,
    setIsDelete,
    setIsEdit,
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
import useQueryData from "@/components/custom-hook/useQueryData";
import Status from "@/components/partials/Status";

  
  const CategoryTable = ({ setIsCategoryEdit }) => {
    const { store, dispatch } = React.useContext(StoreContext);
    const [id, setIsId] = React.useState("");
    
    let counter = 1;
  
    const handleEdit = (item) => {
      dispatch(setIsAdd(true));
      setIsCategoryEdit(item)
    };
  
    const handleDelete = () => {
      dispatch(setIsDelete(true));
      setIsId(item)
    };
  
    const handleRestore = () => {
      dispatch(setIsConfirm(true));
    };
  
    const handleArchive = () => {
      dispatch(setIsConfirm(true));
    };

    const {
      isFetching,
      error,
      data:result,
      status,
    } = useQueryData(
      `/v2/category`, //endpoint
      "get", //method
      "other" //key
    );
  
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
                  ):(
                    <Status text="Inactive" />
                  )}
                  
                </td>
                <td>{item.category_title}</td>

                <td>
                  <ul className="table-action">
                    {item.category_is_active ? (
                      <>
                        
                        <li>
                          <button
                            className="tooltip"
                            data-tooltip="Edit"
                            onClick={() => handleEdit(item)}
                          >
                            <FilePenLine />
                          </button>
                        </li>
                        <li>
                          <button
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
                            className="tooltip"
                            data-tooltip="Restore"
                            onClick={() => handleRestore(item)}
                          >
                            <ArchiveRestore />
                          </button>
                        </li>
                        <li>
                          <button
                            className="tool-tip"
                            data-tooltip="Delete"
                            onClick={handleDelete}
                          >
                            <Trash2 />
                          </button>
                        </li>
                      </>
                    )}
                  </ul>
                </td>
              </tr>
               ))
               }
                 
               
              </tbody>
            </table>
  
            <LoadMore />
          </div>
        </div>
  
        {store.isDelete && <ModalDelete />}
        {store.isConfirm && <ModalConfirm />}
        {store.isView && <ModalViewMovie movieInfo={movieInfo}/>}
      </>
    );
  };
  
  export default CategoryTable;