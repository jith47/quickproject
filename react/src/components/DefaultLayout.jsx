import { Link, Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";
import { MDBContainer } from 'mdb-react-ui-kit';
import axiosClient from '../axios-client';
import { useEffect } from "react";

export default function DefaultLayout() {
  const { user, token, setUser, setToken } = useStateContext();

  if (!token) {
    return <Navigate to="/login" />;
  }

  // const setCsrfToken = async () => {
  //   try {
  //     const response = await axiosClient.get('/sanctum/csrf-cookie');
  //     axiosClient.defaults.headers.common['X-XSRF-TOKEN'] = response.data.csrfToken;
  //   } catch (error) {
  //     console.error('Error setting CSRF token:', error);
  //   }
  // };
  
  // Call the setCsrfToken function before making any other Axios requests
  // setCsrfToken();


  useEffect(() => {
    axiosClient.get('/user')
    .then(({data}) => {
      setUser(data)
    })
  }, [])

  const onLogout = (ev) => {
    ev.preventDefault();
    axiosClient.post('/logout')
        .then(() => {
            setUser({})
            setToken(null)
        })
  }
  return (
    <div id="defaultLayout">
      <aside>
        <Link to="/dashboard">Dashboard</Link>
        <Link to="/users">Users</Link>
      </aside>
      <div className="content">
        <header>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
          <div>Header</div>
          <div>
            {user.name}
            <a href="#" onClick={onLogout}>Logout</a>
          </div>
        </header>
      </div>
      <main>
        <MDBContainer fluid>
            <Outlet />
        </MDBContainer>

      </main>
    </div>
  );
}
