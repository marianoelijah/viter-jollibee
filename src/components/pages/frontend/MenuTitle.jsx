import { imgPath } from '@/components/helpers/functions-general'
import React from 'react'

const MenuTitle = ({ category }) => {
  return (
    <>
        <div className='p-4 bg-primary flex items-center text-white gap-5'>
            <img src={`${imgPath}/jollibee logo.png`} alt="" />
            <h2 className='mb-0'>{category}</h2>
        </div>
    </>
  )
}

export default MenuTitle;
