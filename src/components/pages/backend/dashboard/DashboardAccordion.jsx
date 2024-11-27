import React from 'react'
import { menus } from '../menu-data';
import { ChevronDown } from 'lucide-react';

const DashboardAccordion = ( title, filterby ) => {
    const [isOpen, setIsOpen] = React.useState(false);

    const getCardDetails = menus.filter((item) => item.menu_category === filterby);

    const handleToggleOpen = () => setIsOpen((prev) => !prev);

  return (
                <div className='accordion mb-2'>
                    <div className='accordion-header p-2 flex justify-between bg-secondary rounded-t-md cursor-pointer'
                     onClick={handleToggleOpen}>

                        <h5 className='mb-0'>{title}</h5>
                            <ChevronDown className={`transition-all ${isOpen ? "rotate-180" : ""}`}/>
                    </div>
                    <div className={`accordion-body px-2 py-4 border- border-line rounded-b-md border-t-0 overflow-hidden h-full ${
                        isOpen ? "[max-h-600px]" : "max-h-[0px]" }`}>
                       <ul className="space-y-3 py-4 px-2">
                         {getCardDetails.map((item, key) => (
                         <li className="flex items-center" key={key}>
                      <Dot
                         size={30}
                         className={` ${
                         item.menu_is_active ? "text-success" : "text-gray"
                      }`}
                      />
                      {item.menu_title}
                    </li>
                    ))}
                    </ul>
                    </div>
                </div>
  )
}

export default DashboardAccordion
