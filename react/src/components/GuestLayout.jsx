import { Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";
import { MDBContainer } from 'mdb-react-ui-kit';

export default function GuestLayout() {
    const {token} = useStateContext ()

    if (token) {
        return <Navigate to="/"></Navigate>
    }
    return (
        <div>
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
            <MDBContainer fluid>
            <Outlet />
            </MDBContainer>

        </div>
    )
}