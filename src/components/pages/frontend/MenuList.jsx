import { imgPath } from '@/components/helpers/functions-general'
import React from 'react'
import { menus } from '../backend/menu-data';

const MenuList = ({category, cartData, setCartData, setIsSuccess}) => {

    const menuFilter = menus.filter((item) => item.menu_category === category);

    const handleAdd = (item) => {
      const exist = cartData.find((data) => data.menu_aid === item.menu_aid);
      if (exist !== undefined) {
        setCartData(
          cartData.map((cart) =>
            cart.menu_aid === item.menu_aid
              ? { ...exist, quantity: exist.quantity + 1 }
              : cart
          )
        );
      } else {
        setCartData([...cartData, { ...item, quantity: 1 }]);
      }
      setIsSuccess(true)
    };
    
    console.log(cartData);

  return (
    <div className='grid grid-cols-3 gap-4 p-4'>
        {menuFilter.map((item,key) => (
        <button key={key} onClick={() => handleAdd(item)}>
            <img src={`${imgPath}/${item.menu_image}`} alt="" className='w-[80%] mx-auto'/>
            <h6 className='font-bold text-sm'>{item.menu_title}</h6>
            <p className='text-xm'>P {item.menu_price}</p>
        </button>

        ))}
    </div>
  )
}

export default MenuList