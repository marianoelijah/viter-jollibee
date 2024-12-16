import {
  setIsAdd,
  setIsArchive,
  setIsConfirm,
  setIsDelete,
} from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Archive, ArchiveRestore, FilePenLine, Trash2 } from "lucide-react";
import React from "react";
import LoadMore from "../partials/LoadMore";
import ModalConfirm from "../partials/modals/ModalConfirm";
import ModalDelete from "../partials/modals/ModalDelete";
import Pills from "../partials/Pills";
import { menus } from "../menu-data";
import useQueryData from "@/components/custom-hook/useQueryData";
import Status from "@/components/partials/Status";
import ModalArchive from "@/components/partials/modal/ModalArchive";

const FoodsTable = ({ setItemEdit }) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [onSearch, setOnSearch] = React.useState(false);
    const search = React.useRef(null);
    const [isLoading, setIsLoading] = React.useState(false);
    const [dataItem, setDataItem] = React.useState("");
    const [id, setIsId] = React.useState("");
    const [archive, setArchive] = React.useState(false);
    const [restore, setRestore] = React.useState(false);

    const handleEdit = (item) => {
      dispatch(setIsAdd(true));
      setItemEdit(item);
    };
  
    const handleDelete = (item) => {
      dispatch(setIsDelete(true));
      setIsId(item.food_aid);
    };
  
    const handleRestore = (item) => {
      dispatch(setIsConfirm(true));
      setIsId(item.food_aid);
    };
  
    const handleArchive = (item) => {
      dispatch(setIsArchive(true));
      setIsId(item.food_aid);
    };

    const {
      isFetching,
      error,
      data: result,
      status,
    } = useQueryData(
      `/v2/food`, // endpoint
      "get", // method
      "food" // key
    );
    
  let counter = 1;

  

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
                <th>Price</th>
                <th>Category</th>
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
                  <td>{counter++}</td>
                  <td>
                    {" "}
                    {item.food_is_active === 1 ? (
                      <Status text="Active" />
                    ) : (
                      <Status text="Inactive" />
                    )}
                  </td>
                  <td title={`${item.food_title}`} >{item.food_title}</td>
                  <td title={`${item.food_price}`} >{item.food_price}</td>
                  <td title={`${item.category_title}`} >{item.category_title}</td>
                  
                  <td>
                    <ul className="table-action">
                      {item.food_is_active === 1 ? (
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
                              <ArchiveRestore/>
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
                 ))}
            </tbody>
          </table>

          <LoadMore />
        </div>
      </div>

      {store.isDelete && (
            <ModalDelete
              setIsDelete={setIsDelete}
              mysqlApiDelete={`/v2/food/${id}`}
              queryKey={"food"}
             
            />
          )}
       {store.isArchive && (
            <ModalArchive
              setIsArchive={setIsArchive}
              mysqlEndpoint={`/v2/food/active/${id}`}
              queryKey={"food"}
              
            />
          )}
    </>
  );
};

export default FoodsTable;