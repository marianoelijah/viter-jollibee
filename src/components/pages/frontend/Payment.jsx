import { imgPath } from "@/components/helpers/functions-general";
import { ArrowLeft, CreditCard, PhilippinePeso, X } from "lucide-react";
import React from "react";

const Payment = ({ handleProcessing, setOption }) => {
  return (
    <>
      <div className="max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden">
        <div className="modal-header p-4 flex justify-between items-center border-b border-gray-200">
          <button>
            <ArrowLeft onClick={() => setOption("dining")} />
          </button>
          <h5 className="mb-0">Choose One</h5>
          <button>
            <X onClick={() => setOption("dining")} />
          </button>
        </div>

        <div className="madal-main h-[60vh] w-full flex justify-center items-center">
          <div className="flex flex-col items-center">
            <img
              src={`${imgPath}/jollibee logo.png`}
              alt=""
              className="mx-auto mb-5 w-[90px]"
            />

            <p className="text-2xl mb-5 font-bold">
              Select preferred payment option
            </p>
            <button
              className="bg-primary px-8 py-4 w-[250px] flex justify-center gap-2 font-bold text-white items-center rounded-md"
              onClick={handleProcessing}
            >
              <PhilippinePeso />
              Counter Payment
            </button>
            <h3 className="my-3">or</h3>
            <button
              className="bg-primary px-8 py-4 w-[250px] flex justify-center gap-2 font-bold text-white items-center rounded-md"
              onClick={handleProcessing}
            >
              <CreditCard /> Card / Online Payment
            </button>
          </div>
        </div>
      </div>
    </>
  );
};

export default Payment;