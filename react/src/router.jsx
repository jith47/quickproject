import { Navigate, createBrowserRouter } from "react-router-dom";
import Login from './views/Login.jsx';
import Signup from "./views/Signup";
import Users from "./views/Users";
import NotFound from "./views/NotFound";
import GuestLayout from "./components/GuestLayout.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import Dashboard from "./views/Dashboard.jsx";

const router = createBrowserRouter([
    // {
    //    path: '/',
    //    element: <GuestLayout />
    // },
    {
        path: '/',
        element: <DefaultLayout />,
        children: [
            {
                path:'/',
                element: <Navigate to="/users" />
            },
            {
                path: '/users',
                element: <Users />
            },
            {
                path: '/dashboard',
                element: <Dashboard />
            },
            
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
            }
        ]
    }
])

export default router;