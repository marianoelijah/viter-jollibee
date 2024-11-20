import React from 'react'

const Processing = () => {
  return (
    <>
      <div className="max-w-[600px] w-full bg-white rounded-md absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden">
          <div className="modal-main h-[60vh] w-full flex justify-center items-center text-center">
            <div className="flex flex-col items-center">
              <img
                src={`${imgPath}/jollibee-logo.png`}
                alt=""
                className="mx-auto mb-5 w-[90px]"
              />
              <h2>Processing Order. Please wait...</h2>

            </div>
          </div>
        </div>
    </>
  )
}

export default Processing;
