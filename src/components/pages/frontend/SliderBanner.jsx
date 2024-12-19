import React from "react";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { imgPath } from "@/components/helpers/functions-general";
import Slider from "react-slick";
import useQueryData from "@/components/custom-hook/useQueryData";
import FetchingSpinner from "@/components/partials/spinner/FetchingSpinner";
import ServerError from "@/components/partials/ServerError";

const SliderBanner = ({
  isLoadingAdvertisement,
  isFetchingAdvertisement,
  errorAdvertisement,
  dataAdvertisement,
}) => {
  let settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2400,
  };

  // const {
  //   isFetching,
  //   isLoading,
  //   error,
  //   data: result,
  //   status,
  // } = useQueryData(
  //   `/v2/advertisement`, // endpoint
  //   "get", // method
  //   "advertisement" // key
  // );

  // const {
  //   isFetching,
  //   isLoading,
  //   error,
  //   data: result,
  //   status,
  // } = useQueryData(
  //   `/v2/advertisement`, // endpoint
  //   "get", // method
  //   "advertisement" // key
  // );

  return (
    <>
      <div className="relative h-[200px]">
        {(isFetchingAdvertisement || isLoadingAdvertisement) && (
          <FetchingSpinner />
        )}
        {errorAdvertisement && <ServerError />}
        <Slider {...settings} className="transition-all">
          {dataAdvertisement?.count > 0 &&
            dataAdvertisement.data.map((item, key) => {
              return (
                <img
                  key={key}
                  src={`${imgPath}/${item.ads_image}`}
                  alt={item.ads_image}
                  className="h-[200px] object-cover object-center"
                />
              );
            })}
          
        </Slider>
      </div>
    </>
  );
};

export default SliderBanner;