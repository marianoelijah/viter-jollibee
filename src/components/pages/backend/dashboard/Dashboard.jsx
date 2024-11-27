import Header from '../partials/Header'
import SideNavigation from '../partials/SideNavigation'
import DashboardCard from './DashboardCard'
import DashboardAccordion from './DashboardAccordion'
import Footer from '../partials/Footer'
import {
  BarChart,
  Bar,
  Rectangle,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer,
  Text,
} from "recharts";
import { menus } from '../menu-data'

const Dashboard = () => {
 
  return (
    <>
      <section className="layout-main">
        <div className="layout-division">
          <SideNavigation menu="dashboard" />
          <main>
            <Header title="Dashboard" subtitle="Welcome to Jollibee" />
            <div className="p-8">
              <div className="grid grid-cols-[1fr_400px] gap-5">
                <div className='stats'>
                  <div className='grid grid-cols-4 gap--5'>
                    <DashboardCard title='Chickenjoy' filterby='Chickenjoy'/>
                    <DashboardCard title='Value Meal' filterby='Value Meal'/>
                    <DashboardCard title='Burger' filterby='Burger'/>
                    <DashboardCard title='Burger Steak' filterby='Burger Steak'/>
                    <DashboardCard title='Spaghetti' filterby='Spaghetti'/>
                    <DashboardCard title='Palabok' filterby='Palabok'/>
                    <DashboardCard title='Sides' filterby='Sides'/>
                    <DashboardCard title='Desserts' filterby='Desserts'/>
                  </div>
                </div>
                  <div className='sidebar custom-scroll h-[calc(100vh-200px)]'>
                    <DashboardAccordion title='Chickenjoy' filterby='Chickenjoy'/>
                    <DashboardCard title='Value Meal' filterby='Value Meal'/>
                    <DashboardCard title='Burger Steak' filterby='Burger Steak'/>
                 </div>

                 <div className='charts mt-10'>
                 <h3>Menu Prices</h3>
                    <BarChart
                    width={1200}
                    height={300}
                    data={menus.slice(0, 10)}
                    margin={{
                    top: 5,
                    right: 30,
                    left: 20,
                    bottom: 5,
                    }}
                     >
                  <CartesianGrid strokeDasharray="3 3" />
                    <XAxis dataKey="menu_title" />
                    <YAxis />
                    <Tooltip />
                    <Text scaleToFit={true}/>
                    <Legend />
                   <Bar dataKey="menu_price" 
                   fill="#8884d8" 
                   activeBar={<Rectangle 
                   fill="pink" 
                   stroke="blue" />} />
                  
                   </BarChart>
                  
                 </div>
                </div>
              </div>
                 <Footer/>
          </main>
        </div>
    </section>
      
      
    </>
  )
}

export default Dashboard;
