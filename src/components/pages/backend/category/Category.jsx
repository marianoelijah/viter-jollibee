import { Plus } from 'lucide-react'
import React from 'react'
import SideNavigation from '../partials/SideNavigation'
import Header from '../partials/Header'
import Footer from '../partials/Footer'
import SearchBar from '../partials/SearchBar'
import CategoryyTable from './CategoryTable'
import { StoreContext } from '@/components/store/storeContext'
import ModalAddCategoryy from './ModalAddCategoryy'
import ToastSuccess from '../partials/ToastSuccess'
import ModalError from '../partials/modals/ModalError'
import ModalValidation from '../partials/modals/ModalValidation'
import { setIsAdd } from '@/components/store/storeAction'

const Categoryy = () => {
  const { dispatch, store } = React.useContext(StoreContext);

  const handleAdd = () => {
    dispatch(setIsAdd(true));
  };
  return (
    <>
        <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="categoryy" />
          <main>
            <Header title="Categoryy" subtitle="Manage Kiosk Categoryy" />
            <div className="p-8">
              <div className="flex justify-between items-center ">
                <SearchBar />
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <CategoryyTable />
            </div>
            <Footer />
          </main>
        </div>
      </section>
      {store.validate && <ModalValidation />}
      {store.error && <ModalError />}
      {store.success && <ToastSuccess />}
      {store.isAdd && <ModalAddCategoryy />}
    </>
  )
}

export default Categoryy
