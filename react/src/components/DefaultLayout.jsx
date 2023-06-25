import { Link, Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";
import { MDBContainer } from 'mdb-react-ui-kit';
import axiosClient from '../axios-client';
import { useEffect } from "react";
import {
  Box,
  Flex,
  Drawer,
  DrawerBody,
  Icon,
  useColorModeValue,
  DrawerOverlay,
  useDisclosure,
  DrawerContent,
  DrawerCloseButton,
} from "@chakra-ui/react";
import router from "/src/router.jsx";
import PropTypes from "prop-types";
import { Scrollbars } from "react-custom-scrollbars-2";
import SidebarContent from "/src/views/sidebar/components/Content.jsx";
import {
  renderThumb,
  renderTrack,
  renderView,
} from "/src/components/scrollbar/Scrollbar.jsx";
import Sidebar from "../views/sidebar/Sidebar";
import { SearchBar } from "./navbar/searchBar/SearchBar";
import Layout1 from "../layouts/admin";

function DefaultLayout() {
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
  let menuBg = useColorModeValue('white', 'navy.800');
  const { secondary } = router.routes;
  const shadow = useColorModeValue(
    '14px 17px 40px 4px rgba(112, 144, 176, 0.18)',
    '14px 17px 40px 4px rgba(112, 144, 176, 0.06)'
  );

  useEffect(() => {
    axiosClient.get('/user')
      .then(({ data }) => {
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
      <Layout1 routes={router.routes}/>
        {/* <Box>
        <Box>
            <SearchBar routes={router.routes} />

            <Sidebar routes={router.routes} /> */}
        <Link to="/dashboard">Dashboard</Link>
        <Link to="/users">Users</Link>
        {/* <div className="content">
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
            </div> */}
        <main>
          <MDBContainer fluid>
            <Outlet />
          </MDBContainer>
        </main>
      {/* </Layout1> */}
    </div>

  );


}
export function SidebarResponsive(props) {
  let sidebarBackgroundColor = useColorModeValue("white", "navy.800");
  let menuColor = useColorModeValue("gray.400", "white");
  // // SIDEBAR
  const { isOpen, onOpen, onClose } = useDisclosure();
  const btnRef = React.useRef();

  const { routes } = props;
  // let isWindows = navigator.platform.startsWith("Win");
  //  BRAND

  return (
    <Flex display={{ sm: "flex", xl: "none" }} alignItems='center'>
      <Flex ref={btnRef} w='max-content' h='max-content' onClick={onOpen}>
        <Icon
          // as={IoMenuOutline}
          color={menuColor}
          my='auto'
          w='20px'
          h='20px'
          me='10px'
          _hover={{ cursor: "pointer" }}
        />
      </Flex>
      <Drawer
        isOpen={isOpen}
        onClose={onClose}
        placement={document.documentElement.dir === "rtl" ? "right" : "left"}
        finalFocusRef={btnRef}>
        <DrawerOverlay />
        <DrawerContent w='285px' maxW='285px' bg={sidebarBackgroundColor}>
          <DrawerCloseButton
            zIndex='3'
            onClose={onClose}
            _focus={{ boxShadow: "none" }}
            _hover={{ boxShadow: "none" }}
          />
          <DrawerBody maxW='285px' px='0rem' pb='0'>
            <Scrollbars
              autoHide
              renderTrackVertical={renderTrack}
              renderThumbVertical={renderThumb}
              renderView={renderView}>
              <SidebarContent routes={routes} />
            </Scrollbars>
          </DrawerBody>
        </DrawerContent>
      </Drawer>
    </Flex>
  );
}
// PROPS

DefaultLayout.propTypes = {
  logoText: PropTypes.string,
  routes: PropTypes.arrayOf(PropTypes.object),
  variant: PropTypes.string,
};

export default DefaultLayout;
