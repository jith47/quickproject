import { Navigate, createBrowserRouter } from "react-router-dom";
import Login from './views/Login.jsx';
import Signup from "./views/Signup";
import Users from "./views/Users";
import NotFound from "./views/NotFound";
import GuestLayout from "./components/GuestLayout.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import Dashboard from "./views/Dashboard.jsx";
import UserForm from "./views/Userform.jsx";
import { Icon } from "@chakra-ui/react";

// import Sidebar from "./views/sidebar/Sidebar.jsx";
import Settings from "/src/views/admin/dataTables/index.jsx";
import {
    MdBarChart,
    MdPerson,
    MdHome,
    MdLock,
    MdOutlineShoppingCart,
    MdPeopleAlt
  } from "react-icons/md";
import Layout1 from "./layouts/admin/index.jsx";

const router = createBrowserRouter([
    // {
    //    path: '/',
    //    element: <GuestLayout />
    // },
    {
        path: '/',
        element: <DefaultLayout />,
        layout: '/admin',
        children: [
            {
                name: 'Dashboard',
                path: '/dashboard',
                cat: 1,
                icon: <Icon as={MdHome} width='20px' height='20px' color='inherit' />,
                element: <Dashboard />
            },
            {
                name: 'Dashbboard',
                path:'/',
                element: <Navigate to="/dashboard" />
            },
            {
                name: 'Users',
                path: '/users',
                cat: 1, //sidebar
                icon: <Icon as={MdPeopleAlt} width='20px' height='20px' color='inherit' />,
                element: <Users />,
            },
            {
                path: '/users/new',
                element: <UserForm  key="userCreate"/>
            },
            {
                path: '/users/:id',
                element: <UserForm key="userUpdate"/>
            },

            // {
            //     path : '/sidebar',
            //     element: <Sidebar />
            //     // component: Sidebar,
            // }
            
        ]
    },
    {
        path: '/',
        element: <GuestLayout />,
        children: [
            
            {
                path: '/login',
                element: <Login />
            },
            {
                path: '/signup',
                element: <Signup />
            },
            {
                path: '*',
                element: <NotFound />
            },
        ]
    }
])

export default router;