import { imgPath } from '@/components/helpers/functions-general';
import { ArrowLeft, ChevronLeft, CreditCard, Minus, PhilippinePeso, Plus, ShoppingBag, Utensils, X } from 'lucide-react';
import React from 'react'

const ModalCart = () => {
  return (
    <>
        <div className='fixed top-0 left-0 w-full h-screen'>
          <div className='backdrop absolute top-0 left-0 w-full h-screen bg-black bg-opacity-70'></div>
          {/* <div className='max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden'>
          <div className='modal-header p-4 flex justify-between items-center border-b border-gray-200'>
            <h5 className='mb-0'>My Cart</h5>
            <button>
              <X /> 
            </button>
          </div> */}

          {/* <div className='modal-main p-2'>
            <div className='grid grid-cols-3 gap-4 h-[60vh] custom-scroll overflow-y-auto'>

              {Array.from(Array(10).keys()).map((i) => (
                <div className='text-center space-y-2' key={i}>
                <img src={`${imgPath}/nav-chickenjoy.webp`} alt="" className='w-[140px] mx-auto'/>
                <p className='font-bold'>Chicken Meal 1</p>
                <h5>P 150.00</h5>
                <ul className='flex items-center gap-3 justify-center'>
                  <li>
                    <button className='grid size-[30px] place-content-center bg-primary text-white rounded-full'>
                      <Plus size={16} />
                    </button>
                  </li>
                  <li>1</li>
                  <li>
                    <button className='grid size-[30px] place-content-center bg-primary text-white rounded-full'>
                      <Minus size={16}/>
                    </button>
                  </li>
                </ul>
              </div>
              ))}
              
            </div>
          </div> */}

          {/* <div className='modal-summary absolute bottom-0 left-0 w-full p-4 bg-white flex justify-between items-center shadow-[0_10px_30px_rgba(0,0,0,_0.4)]'>
            <h2>Total: P 1000</h2>
            <button className='bg-primary px-4 py-2 rounded-md text-white'>Continue</button>
          </div> */}

          {/* <div className='max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden'>
          fkjndnas
          </div> */}
          
          <div className='modal-header p-4 flex justify-between items-center border-b border-gray-200'>
            <h5 className='mb-0'>My Cart</h5>
            <button>
              <X /> 
            </button>
          </div>
          <button>
            <ArrowLeft />
          </button>
          <h5 className='mb-0'>Choose One</h5>
          <button>
            <X />
          </button>
        </div>
        <div className='modal-main h-[60vh] w-full flex justify-center items-center text-center'>
          <div className='flex flex-col items-center'>
            <img src={`${imgPath}/jollibee logo.png`} alt="" className='mx-auto mb-5'/>

            <h2>Processing Order. Please wait...</h2>

            <p className='text-2xl mb-5'>Select preferred payment options</p>
             <button className='bg-primary px-8 py-4 w-[250px]  flex justify-center gap-2 font-bold text-white items-center'>
              <PhilippinePeso /> Counter Payment
             </button>
             <h3 className='my-3'>or</h3>
             <button className='bg-primary px-8 py-4 w-[250px] flex justify-center gap-2 font-bold text-white items-center'>
              <CreditCard /> Card / Online Payment
             </button>
          </div>
        </div>
        
    </>
  );
};

export default ModalCart;
