import {
  Bar,
  BarChart,
  CartesianGrid,
  Legend,
  Rectangle,
  ResponsiveContainer,
  Tooltip,
  XAxis,
  YAxis,
} from "recharts";
import Footer from "../partials/Footer";
import Header from "../partials/Header";
import SideNavigation from "../partials/SideNavigation";
import DashboardAccordion from "./DashboardAccordion";
import DashboardCard from "./DashboardCard";


import useQueryData from "@/components/custom-hook/useQueryData";
import FetchingSpinner from "@/components/partials/spinner/FetchingSpinner";
import TableLoader from "@/components/partials/TableLoader";
import IconNoData from "../partials/IconNoData";
import { menus } from "../../menu-data";

const Dashboard = ({}) => {
  const {
    isFetching: isFetchingCategory,
    isLoading: isLoadingCategory,
    error: errorCategory,
    data: resultCategory,
  } = useQueryData(
    `/v2/category`, // endpoint
    "get", // method
    "category" // key
  );

  const {
    isFetching: isFetchingFood,
    isLoading: isLoadingFood,
    error: errorFood,
    data: resultFood,
  } = useQueryData(
    `/v2/food`, // endpoint
    "get", // method
    "food" // key
  );
 console.log(resultFood);
  return (
    <>
      <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="dashboard" />
          <main>
            <Header title="Dashboard" subtitle="Welcome to Jollibee!" />
            <div className="p-5 overflow-y-auto custom-scroll">
              <div className="grid grid-cols-[1fr_400px] gap-5">
                <div className="stats">
                  <div className="chart pb-20">
                    <ResponsiveContainer width={1000} height={300}>
                      <h3>Menu Prices</h3>
                      <BarChart
                        width={1200}
                        height={250}
                        data={menus.slice(0, 80)}
                        margin={{
                          top: 10,
                          right: 30,
                          left: 20,
                          bottom: 5,
                        }}
                      >
                        <CartesianGrid strokeDasharray="3 3" />
                        <XAxis dataKey="menu_title" />
                        <YAxis />
                        <Tooltip />
                        <Legend />
                        <Bar
                          dataKey="menu_price"
                          fill="#8884d8"
                          activeBar={<Rectangle fill="pink" stroke="blue" />}
                        />
                      </BarChart>
                    </ResponsiveContainer>
                  </div>
                  <div className="relative">
                    {isFetchingCategory && !isLoadingCategory && (
                      <FetchingSpinner />
                    )}
                    {isLoadingCategory && <TableLoader cols={4} count={20} />}
                    {resultCategory?.count === 0 && <IconNoData />}

                    <div className="grid grid-cols-4 gap-5 mt-20">
                      {resultCategory?.count > 0 &&
                        resultCategory?.data.map((item, key) => {
                          return (
                            <DashboardCard
                              key={key}
                              item={item}
                              resultFood={resultFood}
                            />
                          );
                        })}
                    </div>
                  </div>
                </div>

                <div className="sidebar custom-scroll h-[calc(100vh-150px)] overflow-auto">
                  
                </div>
              </div>
            </div>
            <Footer />
          </main>
        </div>
      </section>
    </>
  );
};

export default Dashboard;