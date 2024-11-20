import { ArrowLeft, ShoppingBag, Utensils, X } from 'lucide-react';
import React from 'react'

const Payment = ({ setOption, handleProccessing, setShowCart }) => {
  return (
    <div className="max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden">
    <div className="modal-header p-4 flex justify-between items-center border-b border-gray-200">
      <button onClick={() => setOption("dining")}>
        <ArrowLeft />
      </button>
      <h5 className="mb-0">Choose One</h5>
      <button onClick={() => setShowCart("false")}>
        <X />
      </button>
    </div>

    <div className="modal-main h-[60vh] w-full flex justify-center items-center text-center">
      <div className="flex flex-col items-center">
        <img
          src={`${imgPath}/jollibee logo.png`}
          alt=""
          className="mx-auto mb-5 w-[90px]"
        />
        <p className="text-2xl mb-5 font-bold">
          Select your preferred dining option
        </p>
        <button className="bg-primary px-8 py-3 text-center w-[250px] flex justify-center gap-2 font-bold text-white items-center rounded-md "
        onClick={handleProccessing}>
          <Utensils /> Dine In
        </button>
        <h3 className="my-3">or</h3>
        <button className="bg-primary px-8 py-3 text-center w-[250px] flex justify-center gap-2 font-bold text-white items-center rounded-md "
        onClick={() => setOption("payment")}>
          <ShoppingBag /> Take Out
        </button>
      </div>
    </div>
  </div>
  )
}

export default Payment;
