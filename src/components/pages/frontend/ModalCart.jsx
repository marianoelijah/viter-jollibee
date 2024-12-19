import { imgPath } from "@/components/helpers/functions-general";
import {
  ArrowLeft,
  ChevronLeft,
  CreditCard,
  Frown,
  Minus,
  PhilippinePeso,
  Plus,
  ShoppingBag,
  Utensils,
  X,
} from "lucide-react";
import React from "react";
import { useNavigate } from "react-router-dom";
import Processing from "./Processing";
import Payment from "./Payment";
import Dining from "./Dining";

const ModalCart = ({ setShowCart, cartData, setCartData, getTotal }) => {
  const [option, setOption] = React.useState("cart");

  const navigate = useNavigate();

  const handleAdd = (item) => {
    const exist = cartData.find((data) => data.food_aid === item.food_aid);
    if (exist !== undefined) {
      setCartData(
        cartData.map((cart) =>
          cart.food_aid === item.food_aid
            ? { ...exist, quantity: exist.quantity + 1 }
            : cart
        )
      );
    } else {
      setCartData([...cartData, { ...item, quantity: 1 }]);
    }
  };

  const handleRemove = (item) => {
    const exist = cartData.find((cart) => cart.food_aid === item.food_aid);
    if (exist.quantity === 1) {
      setCartData(cartData.filter((cart) => cart.food_aid !== item.food_aid));
    } else {
      setCartData(
        cartData.map((cart) =>
          cart.food_aid === item.food_aid
            ? { ...exist, quantity: exist.quantity - 1 }
            : cart
        )
      );
    }
  };

  const handleProcessing = () => {
    setOption("");
    setCartData([]);
    setTimeout(() => {
      setShowCart(false);
      navigate("/");
    }, 5000);
  };

  return (
    <>
      <div className="fixed top-0 left-0 w-full h-screen">
        <div className="backdrop w-full h-full bg-black bg-opacity-75 absolute top-0 left-0"></div>
        {option === "cart" ? (
          <div className="max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden">
            <div className="modal-header p-4 flex justify-between items-center border-b border-gray-200">
              <h5 className="mb-0">My Cart</h5>
              <button onClick={() => setShowCart(false)}>
                <X />
              </button>
            </div>

            <div className="modal-main p-2">
              <div
                className={`flex flex-wrap gap-6  max-h-[600px] ${
                  cartData.length > 0 ? "mb-[80px]" : ""
                } custom-scroll overflow-y-auto`}
              >
                {cartData.length === 0 ? (
                  <div className="flex items-center flex-col mx-auto opacity-20 py-10">
                    <Frown className="" size={80} />
                    <h2 className="mb-0">Empty Cart</h2>
                  </div>
                ) : (
                  cartData.map((item, key) => (
                    <div
                      className="text-center space-y-1 basis-[30%]"
                      key={key}
                    >
                      <img
                        src={`${imgPath}/${item.food_image}`}
                        alt=""
                        className="w-[100px] mx-auto"
                      />
                      <p className="font-bold mb-1 text-sm line-clamp-1">
                        {item.food_title}
                      </p>
                      <h5>P {item.food_price}</h5>
                      <ul className="flex items-center gap-3 justify-center">
                        <li>
                          <button
                            className="grid size-[30px] place-content-center bg-myred text-white rounded-full"
                            onClick={() => handleAdd(item)}
                          >
                            <Plus size={16} />
                          </button>
                        </li>
                        <li>{item.quantity}</li>
                        <li>
                          <button
                            className="grid size-[30px] place-content-center bg-myred text-white rounded-full"
                            onClick={() => handleRemove(item)}
                          >
                            <Minus size={16} />
                          </button>
                        </li>
                      </ul>
                    </div>
                  ))
                )}
              </div>
            </div>

            {cartData.length > 0 && (
              <div className="modal-summary absolute bottom-0 left-0 w-full p-4 bg-white flex justify-between items-center shadow-[0_10px_30px_rgba(0,0,0,_0.4)]">
                <h3 className="mb-0">Total: P {getTotal.toFixed(2)}</h3>
                <button
                  className="bg-myred px-4 py-2 rounded-md text-white"
                  onClick={() => setOption("dining")}
                >
                  Continue
                </button>
              </div>
            )}
          </div>
        ) : option === "dining" ? (
          <Dining setOption={setOption} handleProcessing={handleProcessing} />
        ) : option === "payment" ? (
          <Payment setOption={setOption} handleProcessing={handleProcessing} />
        ) : (
          <Processing />
        )}
      </div>
    </>
  );
};

export default ModalCart;