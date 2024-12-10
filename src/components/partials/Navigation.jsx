import {
  setIsClientOpen,
  setIsLeaveOpen,
  setIsMemoOpen,
  setIsPayrollOpen,
  setIsSettingsOpen,
  setIsShow,
} from "@/store/storeAction";
import { StoreContext } from "@/store/storeContext";
import React, { useEffect, useRef } from "react";
import { GoChevronDown } from "react-icons/go";
import { Link } from "react-router-dom";
import { RiMenuFoldFill, RiMenuUnfoldFill, RiTimerFill } from "react-icons/ri";
import { IoNewspaper, IoSettingsSharp } from "react-icons/io5";
import { MdTask } from "react-icons/md";
import { FaBusinessTime, FaCalendarAlt, FaPersonBooth } from "react-icons/fa";
import { IoIosPeople } from "react-icons/io";
import { GiPayMoney } from "react-icons/gi";
// import { AiOutlineMenuUnfold } from "react-icons/ai";
const Navigation = ({ menu, submenu }) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const handleSettingsOpen = () => {
    dispatch(setIsSettingsOpen(!store.isSettingsOpen));
  };
  const handleLeaveOpen = () => {
    dispatch(setIsLeaveOpen(!store.isLeaveOpen));
  };
  const handleMemoOpen = () => {
    dispatch(setIsMemoOpen(!store.isMemoOpen));
  };
  const handleClientOpen = () => {
    dispatch(setIsClientOpen(!store.isClientOpen));
  };
  const handlePayrollOpen = () => {
    dispatch(setIsPayrollOpen(!store.isPayrollOpen));
  };
  const handleShow = () => {
    dispatch(setIsShow(!store.isShow));
  };

  React.useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth <= 768) {
        dispatch(setIsShow(false));
      } else {
        dispatch(setIsShow(true));
      }
    };
    handleResize();

    window.addEventListener("resize", handleResize);

    return () => window.removeEventListener("resize", handleResize);
  }, [dispatch]);

  return (
    <>
      <div className="navigation">
        <div className="navigation-wrapper">
          <div
            className={`navigation-content duration-200 overflow-hidden ${
              store.isShow ? "w-[200px]" : "w-0"
            }`}
          >
            <nav className="w-[200px]">
              <ul className="overflow-auto h-full pt-2">
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                >
                  <div className="navigation-item">
                    <RiTimerFill />
                    TIME
                  </div>
                </li>
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                >
                  <div className="navigation-item">
                    <MdTask />
                    TASK
                  </div>
                </li>
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                  onClick={handleLeaveOpen}
                >
                  <div className="navigation-item">
                    <FaCalendarAlt />
                    LEAVE
                  </div>
                  <GoChevronDown
                    size={15}
                    className={`duration-200 ${
                      store.isLeaveOpen && "-rotate-180 duration-200"
                    }`}
                  />
                </li>
                {store.isLeaveOpen && (
                  <div className="submenu ml-8">
                    <ul className="flex flex-col gap-3 my-3 ">
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/users">Application</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings">Available</Link>
                      </li>
                    </ul>
                  </div>
                )}
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                >
                  <div className="navigation-item">
                    <FaBusinessTime />
                    OVERTIME
                  </div>
                </li>
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "employees" ? "bg-white/20 " : ""
                  }`}
                >
                  <div className="navigation-item">
                    <IoIosPeople />
                    <Link to="/employees">EMPLOYEES</Link>
                  </div>
                </li>
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                  onClick={handleMemoOpen}
                >
                  <div className="navigation-item">
                    <IoNewspaper />
                    MEMO
                  </div>

                  <GoChevronDown
                    size={15}
                    className={`duration-200 ${
                      store.isMemoOpen && "-rotate-180 duration-200"
                    }`}
                  />
                </li>
                {store.isMemoOpen && (
                  <div className="submenu ml-8">
                    <ul className="flex flex-col gap-3 my-3 ">
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/users">Application</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/">Available</Link>
                      </li>
                    </ul>
                  </div>
                )}
                <li
                  className={`px-5 py-2 flex items-center justify-between  text-white${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                  onClick={handleClientOpen}
                >
                  <div className="navigation-item">
                    <FaPersonBooth />
                    CLIENT
                  </div>

                  <GoChevronDown
                    size={15}
                    className={`duration-200 ${
                      store.isClientOpen && "-rotate-180 duration-200"
                    }`}
                  />
                </li>
                {store.isClientOpen && (
                  <div className="submenu ml-8">
                    <ul className="flex flex-col gap-3 my-3 ">
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/users">Application</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/">Available</Link>
                      </li>
                    </ul>
                  </div>
                )}
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "" ? "bg-white/20 " : ""
                  }`}
                  onClick={handlePayrollOpen}
                >
                  <div className="navigation-item">
                    <GiPayMoney />
                    PAYROLL
                  </div>

                  <GoChevronDown
                    size={15}
                    className={`duration-200 ${
                      store.isPayrollOpen && "-rotate-180 duration-200"
                    }`}
                  />
                </li>
                {store.isPayrollOpen && (
                  <div className="submenu ml-8">
                    <ul className="flex flex-col gap-3 my-3 ">
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/users">Application</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/">Available</Link>
                      </li>
                    </ul>
                  </div>
                )}
                <li
                  className={`px-5 py-2 flex items-center justify-between text-white ${
                    menu === "settings" ? "bg-white/20 text-white" : ""
                  }`}
                  onClick={handleSettingsOpen}
                >
                  <div className="navigation-item">
                    <IoSettingsSharp />
                    SETTINGS
                  </div>

                  <GoChevronDown
                    size={15}
                    className={`duration-200 ${
                      store.isSettingsOpen && "-rotate-180 duration-200"
                    }`}
                  />
                </li>
                {store.isSettingsOpen && (
                  <div className="submenu ml-8">
                    <ul className="flex flex-col gap-3 my-3 ">
                      <li
                        className={`${
                          submenu === "users"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/users">Users</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "job"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/job">Job</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "departments"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/departments">Departments</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "company-info"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/company-info">Company Info</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "position"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/leave">Leave</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/notification">Notification</Link>
                      </li>
                      <li
                        className={`${
                          submenu === "services"
                            ? "border-l-2 border-[#ffa700] text-[#ffa700]"
                            : "border-transparent text-white"
                        }`}
                      >
                        <Link to="/settings/direct-report">Direct Report</Link>
                      </li>
                    </ul>
                  </div>
                )}
              </ul>
            </nav>
          </div>

          <div className={`toggle-menu  ${!store.isShow && "translate-x-0"}`}>
            {store.isShow ? (
              <RiMenuFoldFill
                size={20}
                onClick={handleShow}
                className="text-white"
              />
            ) : (
              <RiMenuUnfoldFill
                size={20}
                onClick={handleShow}
                className="text-white"
              />
            )}
          </div>
        </div>
      </div>
    </>
  );
};

export default Navigation;
