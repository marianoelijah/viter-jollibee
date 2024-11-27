import { Plus } from 'lucide-react'
import React from 'react'
import SideNavigation from '../partials/SideNavigation'
import Header from '../partials/Header'
import Footer from '../partials/Footer'
import SearchBar from '../partials/SearchBar'
import { StoreContext } from '@/components/store/storeContext'
import ToastSuccess from '../partials/ToastSuccess'
import ModalError from '../partials/modals/ModalError'
import ModalValidation from '../partials/modals/ModalValidation'
import { setIsAdd } from '@/components/store/storeAction'
import ModalAddFoods from './ModalAddFoods'
import FoodsTable from './FoodsTable'

const Food = () => {
  const { dispatch, store } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);
  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };
  return (
    <>
        <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="foods" />
          <main>
            <Header title="Foods" subtitle="Manage List of Foods" />
            <div className="p-8">
              <div className="flex justify-between items-center ">
                <SearchBar />
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} />
                  Add New
                </button>
              </div>
              <FoodsTable setItemEdit={setItemEdit}/>
            </div>
            <Footer />
          </main>
        </div>
      </section>
      {store.validate && <ModalValidation />}
      {store.error && <ModalError />}
      {store.success && <ToastSuccess />}
      {store.isAdd && <ModalAddFoods itemEdit={itemEdit} />}
    </>
  )
}

export default Food;
