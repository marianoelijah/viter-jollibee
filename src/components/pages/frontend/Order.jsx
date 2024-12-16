import React from "react";
import SliderBanner from "./SliderBanner";
import MenuTitle from "./MenuTitle";
import SideNav from "./SideNav";
import MenuList from "./MenuList";
import ModalCart from "./ModalCart";
import ToastSuccess from "./ToastSuccess";
import useQueryData from "@/components/custom-hook/useQueryData";

const Order = () => {
  const [categoryId, setCategoryId] = React.useState("");
  const [cartData, setCartData] = React.useState([]);
  const [showCart, setShowCart] = React.useState(false);
  const [isSuccess, setIsSuccess] = React.useState(false);

  const {
    isLoading,
    isFetching,
    error,
    data: result,
    status,
  } = useQueryData(
    `/v2/category`, // endpoint
    "get", // method
    "category" // key
  );

  const getCategoryName = (categoryId, categoryResult) => {
    let categorySelectedName = "";

    categoryResult?.data.map((item) => {
      if (Number(categoryId) === Number(item.category_aid)) {
        categorySelectedName = item.category_title;
      }
    });

    return categorySelectedName;
  };

  const categoryName =
    categoryId === "" ? "Value Meal" : getCategoryName(categoryId, result);

  const getTotal = cartData.reduce((acc, item) => {
    return acc + item.food_price * item.quantity;
  }, 0);



  return (
    <>
      <SliderBanner />
      <div className="grid grid-rows-[auto,_1fr,_auto] min-h-[calc(100vh-200px)]">
        <MenuTitle categoryId={categoryId} />
        <section className="grid grid-cols-[150px,_1fr] bg-myred px-3">
          <aside className="m-1 bg-white rounded-md h-[60.5vh] overflow-y-scroll custom-scroll">
            <SideNav
              setCategoryId={setCategoryId}
              isFetching={isFetching}
              isLoading={isLoading}
              result={result}
            />
          </aside>
          <main className="m-1 bg-white rounded-md h-[60.5vh] overflow-y-scroll custom-scroll ">
            <MenuList
              categoryId={categoryId}
              cartData={cartData}
              setCartData={setCartData}
              setIsSuccess={setIsSuccess}
            />
          </main>
        </section>
        <div className="flex p-1 px-3 justify-between items-center bg-myred text-white p-1">
          <button className="px-4 py-2 border bg-white text-myred border-white rounded-md">
            Cancel
          </button>
          <div className="px-4 py-2 border border-white rounded-md w-[300px] text-center">
            <small className="text-xs">Total Order</small>
            <h4 className="mb-0">P {getTotal.toFixed(2)}</h4>
          </div>
          <button
            className=" px-4 py-2 bg-myyellow text-white rounded-md relative"
            onClick={() => setShowCart(true)}
          >
            {cartData.length > 0 && (
              <span className="absolute -left-2 -top-2 text-[8] bg-white text-myred rounded-full size-[20px] font-bold grid place-content-center">
                {cartData.length}
              </span>
            )}
            View Cart
          </button>
        </div>
      </div>
      {showCart && (
        <ModalCart
          setShowCart={setShowCart}
          cartData={cartData}
          setCartData={setCartData}
          getTotal={getTotal}
        />
      )}

      {isSuccess && <ToastSuccess setIsSuccess={setIsSuccess} />}
    </>
  );
};

export default Order;
