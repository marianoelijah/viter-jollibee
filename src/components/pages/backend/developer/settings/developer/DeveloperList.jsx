import useQueryData from "@/components/custom-hook/useQueryData";
import ModalArchive from "@/components/partials/modal/ModalArchive";
import ModalDelete from "@/components/partials/modal/ModalDelete";
import ModalRestore from "@/components/partials/modal/ModalRestore";
import { StoreContext } from "@/components/store/storeContext";
import React from "react";
import Pills from "../../partials/Pills";
import { Archive, ArchiveRestore, FilePenLine, Trash2 } from "lucide-react";
import LoadMore from "../../partials/LoadMore";
import SpinnerTable from "../../partials/spinners/SpinnerTable";
import TableLoader from "../../partials/TableLoader";
import IconNoData from "../../partials/IconNoData";
import IconServerError from "../../partials/IconServerError";
import {
  setIsAdd,
  setIsArchive,
  setIsDelete,
  setIsRestore,
} from "@/components/store/storeAction";
import { useInView } from "react-intersection-observer";
import { useInfiniteQuery } from "@tanstack/react-query";
import { queryDataInfinite } from "@/components/helpers/queryDataInfinite";
import SearchBarWithFilterStatus from "@/components/partials/SearchBarWithFilterStatus";
import Status from "@/components/partials/Status";
import { FaArchive, FaEdit, FaTrash, FaTrashRestoreAlt } from "react-icons/fa";

const DeveloperList = ({ setItemEdit }) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [id, setIsId] = React.useState("");
  const [dataItem, setDataItem] = React.useState(null);
  const [isFilter, setIsFilter] = React.useState(false);
  const [onSearch, setOnSearch] = React.useState(false);
  const [statusFilter, setStatusFilter] = React.useState("");
  const search = React.useRef({ value: "" });
  const [page, setPage] = React.useState(1);
  const { ref, inView } = useInView();
  let counter = 1;

  const handleDelete = (item) => {
    dispatch(setIsDelete(true));
    setIsId(item.user_developer_aid);
    setDataItem(item);
  };
  const handleEdit = (item) => {
    dispatch(setIsAdd(true));
    setItemEdit(item);
  };
  const handleRestore = (item) => {
    dispatch(setIsRestore(true));
    setIsId(item.user_developer_aid);
  };
  const handleArchive = (item) => {
    dispatch(setIsArchive(true));
    setIsId(item.user_developer_aid);
  };

  const {
    data: result,
    error,
    fetchNextPage,
    hasNextPage,
    isFetching,
    isFetchingNextPage,
    status,
  } = useInfiniteQuery({
    queryKey: ["developer", onSearch, isFilter, statusFilter],
    queryFn: async ({ pageParam = 1 }) =>
      await queryDataInfinite(
        "/v2/developer/search", // search or filter endpoint
        `/v2/developer/page/${pageParam}`, //page api/endpoint
        isFilter || store.isSearch, //search boolean
        {
          isFilter,
          statusFilter,
          searchValue: search?.current.value,
          id: "",
        } // payload
      ),
    getNextPageParam: (lastPage) => {
      if (lastPage.page < lastPage.total) {
        return lastPage.page + lastPage.count;
        ``;
      }
      return;
    },
    refetchOnWindowFocus: false,
  });

  React.useEffect(() => {
    if (inView) {
      setPage((prev) => prev + 1);
      fetchNextPage();
    }
  }, [inView]);
  return (
    <>
      <div>
        <SearchBarWithFilterStatus
          search={search}
          dispatch={dispatch}
          store={store}
          result={result}
          isFetching={isFetching}
          setOnSearch={setOnSearch}
          onSearch={onSearch}
          statusFilter={statusFilter}
          setStatusFilter={setStatusFilter}
          setIsFilter={setIsFilter}
        />
      </div>
      <div className="p-4 bg-secondary rounded-md mt-10 border border-line relative">
        {/* {isFetching && !isLoading && <SpinnerTable />} */}
        <div className="table-wrapper custom-scroll">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {/* loading or no data */}
              {(status === "pending" || result?.pages[0].data.length === 0) && (
                <tr>
                  <td colSpan={100} className="p-10">
                    {status === "pending" ? (
                      <TableLoader cols={3} count={20} />
                    ) : (
                      <IconNoData />
                    )}
                  </td>
                </tr>
              )}
              {error && (
                <tr>
                  <td colSpan={100}>
                    <IconServerError />
                  </td>
                </tr>
              )}
              {/* result */}
              {result?.pages.map((page, pageKey) => (
                <React.Fragment key={pageKey}>
                  {page.data.map((item, key) => {
                    return (
                      <tr key={key} className="group relative cursor-pointer">
                        <td className="text-center">{counter++}</td>
                        <td>
                          {item.user_developer_is_active === 1 ? (
                            <Status text="Active" />
                          ) : (
                            <Status text="inActive" />
                          )}
                        </td>
                        <td>
                          {item.user_developer_first_name}{" "}
                          {item.user_developer_last_name}
                        </td>
                        <td>{item.user_developer_email}</td>
                        <td
                          colSpan={100}
                          className="opacity-0 group-hover:opacity-100"
                        >
                          <div className="flex items-center justify-end gap-2 mr-5">
                            {item.user_developer_is_active == 1 ? (
                              <>
                                <button
                                  type="button"
                                  className="tooltip"
                                  data-tooltip="Edit"
                                  disabled={isFetching}
                                  onClick={() => handleEdit(item)}
                                >
                                  <FaEdit />
                                </button>
                                <button
                                  type="button"
                                  className="tooltip"
                                  data-tooltip="Archive"
                                  disabled={isFetching}
                                  onClick={() => handleArchive(item)}
                                >
                                  <FaArchive />
                                </button>
                              </>
                            ) : (
                              <>
                                <button
                                  type="button"
                                  className="tooltip"
                                  data-tooltip="Restore"
                                  disabled={isFetching}
                                  onClick={() => handleRestore(item)}
                                >
                                  <FaTrashRestoreAlt />
                                </button>
                                <button
                                  type="button"
                                  className="tooltip"
                                  data-tooltip="Delete"
                                  disabled={isFetching}
                                  onClick={() => handleDelete(item)}
                                >
                                  <FaTrash />
                                </button>
                              </>
                            )}
                          </div>
                        </td>
                      </tr>
                    );
                  })}
                </React.Fragment>
              ))}
            </tbody>
          </table>

          <LoadMore />
        </div>
      </div>

      {store.isDelete && (
        <ModalDelete
          setIsDelete={setIsDelete}
          mysqlApiDelete={`/v2/developer/${id}`}
          queryKey={"developer"}
          item={dataItem.developer_name}
        />
      )}
      {store.isRestore && (
        <ModalRestore
          setIsRestore={setIsRestore}
          mysqlEndpoint={`/v2/developer/active/${id}`}
          queryKey={"developer"}
        />
      )}
      {store.isArchive && (
        <ModalArchive
          setIsArchive={setIsArchive}
          mysqlEndpoint={`/v2/developer/active/${id}`}
          queryKey={"developer"}
        />
      )}
    </>
  );
};

export default DeveloperList;