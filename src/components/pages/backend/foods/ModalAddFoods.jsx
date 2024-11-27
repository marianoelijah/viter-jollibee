import React from "react";
import ModalWrapper from "../partials/modals/ModalWrapper";
import { ImagePlusIcon, X } from "lucide-react";
import SpinnerButton from "../partials/spinners/SpinnerButton";
import { StoreContext } from "@/components/store/storeContext";
import { setIsAdd } from "@/components/store/storeAction";
import { Form, Formik } from "formik";
import { InputPhotoUpload, InputSelect, InputText } from "@/components/helpers/FormInputs";
import * as Yup from "Yup";
import useUploadPhoto from "@/components/custom-hook/useUploadPhoto";
import { imgPath } from "@/components/helpers/functions-general";

const  ModalAddFoods = ({ itemEdit }) => {
  const { dispatch } = React.useContext(StoreContext);
  const { uploadPhoto, handleChangePhoto, photo } = useUploadPhoto("");

  const handleClose = () => {
    dispatch(setIsAdd(false));
  };

  const initVal = {
    menu_title : itemEdit ? itemEdit.menu_title : "",
    menu_price : itemEdit ? itemEdit.menu_price : "",
    menu_category : itemEdit ? itemEdit.menu_category : "",

    
  }

  const yupSchema = Yup.object ({
    menu_title : Yup.string().required("Required"),
    menu_price : Yup.string().required("Required"),
    menu_category : Yup.string().required("Required"),
    
  });

  return (
    <>
      <ModalWrapper>
        <div className="main-side absolute top-0 right-0 bg-primary h-[100dvh] w-[300px] border-l border-line">
          <div className="modal-header p-4 flex justify-between items-center">
            <h5 className="mb-0 leading-none">Add Foods</h5>
            <button onClick={handleClose}>
              <X />
            </button>
          </div>


          <Formik
        initialValues={initVal}
        validationSchema={yupSchema}
        onSubmit={async (values) => {
          console.log(values)
        }}
      >
        {(props) => {
          return (
            <Form>

          <div className="modal-form  h-full max-h-[calc(100vh-56px)] grid grid-rows-[1fr_auto]">
            <div className="form-wrapper p-4 max-h-[85vh] h-full overflow-y-auto custom-scroll ">
            
            <div className="input-wrap">
                <InputText 
                label="Title"
                type="text"
                name="food_title"
                />
              </div>
             
              <div className="input-wrap relative  group input-photo-wrap mb-8 h-[150px]">
              <label htmlFor="">Photo</label>
                {itemEdit === null ? (
                  <div className="w-full border border-line rounded-md flex justify-center items-center flex-col h-full">
                    <ImagePlusIcon
                      size={50}
                      strokeWidth={1}
                      className="opacity-20 group-hover:opacity-50 transition-opacity"
                    />
                    <small className="opacity-20 group-hover:opacity-50 transition-opacity">
                      Upload Photo
                    </small>
                  </div>
                ) : (
                  <img
                    src={
                      itemEdit === null
                        ? URL.createObjectURL(photo) // preview
                        : imgPath + "/" + itemEdit?.menu_image // check db
                    }
                    alt="employee photo"
                    className={`group-hover:opacity-30 duration-200 relative object-cover h-full w-full  m-auto `}
                  />
                )}

                       <InputPhotoUpload
                          name="photo"
                          type="file"
                          id="photo"
                          accept="image/*"
                          title="Upload photo"
                          onChange={(e) => handleChangePhoto(e)}
                          onDrop={(e) => handleChangePhoto(e)}
                          className={`opacity-0 absolute top-0 right-0 bottom-0 left-0 rounded-full  m-auto cursor-pointer w-full h-full`}
                        />
              </div>

             
              <div className="input-wrap">
              <InputText
                label="Price"
                type="text"
                name="menu_price"
                />
              </div>
              <div className="input-wrap">
                <label htmlFor="">Category</label>
                <InputSelect label="Category" name="movie_category">
                  <option value="" hidden>
                    Select Category
                  </option>
                  <option value="value meal">Value Meal</option>
                  <option value="chicken joy">Chicken Joy</option>
                  <option value="burger">Burger</option>
                  <option value="spaghetti">Spaghetti</option>
                  <option value="burger steak">Burger Steak</option>
                  <option value="palabok">Palabok</option>
                  <option value="sides">Sides</option>
                  <option value="desserts">Desserts</option>
                  </InputSelect>
              </div>
             
              
              
              
       
            </div>
            <div className="form-action flex p-4 justify-end gap-3">
              <button className="btn btn-info bg-myred" type="submit">
                <SpinnerButton />
                Save
              </button>
              <button className="btn btn-cancel" onClick={handleClose} type="reset">
                Cancel
              </button>
            </div>
          </div>
          </Form>
          );
        }}
      </Formik>

        </div>
      </ModalWrapper>
    </>
  );
};

export default ModalAddFoods;