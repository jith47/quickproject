// Chakra imports
import { Portal, Box, useDisclosure, Text, Button, Link } from '@chakra-ui/react';
// import Footer from 'components/footer/FooterAdmin.js';
// Layout components
import 'mdb-react-ui-kit/dist/css/mdb.min.css';
import '/src/App.css'
import Navbar from '/src/components/navbar/NavbarAdmin.jsx';
import Sidebar from '/src/views/sidebar/Sidebar.jsx';
import { SidebarContext } from '/src/context/SidebarContext.jsx';
import React, { useState } from 'react';
import { Outlet, Route, Routes } from 'react-router-dom';
import router from '/src/router.jsx';
import { ContextProvider } from '../../context/ContextProvider';
import { MDBContainer } from 'mdb-react-ui-kit';

// Custom Chakra theme
export default function Layout1(props) {
	const { ...rest } = props;
	const routes = router.routes[0].children.filter((r) => {
		return r.cat == 1;
	});
	// states and functions
	const [ fixed ] = useState(false);
	const [ toggleSidebar, setToggleSidebar ] = useState(false);
	// functions for changing the states from components
	const getRoute = () => {
		return window.location.pathname !== '/admin/full-screen-maps';
	};
	const getActiveRoute = (routes) => {
		let activeRoute = 'Default Brand Text';
		for (let i = 0; i < routes.length; i++) {
			if (routes[i].collapse) {
				let collapseActiveRoute = getActiveRoute(routes[i].items);
				if (collapseActiveRoute !== activeRoute) {
					return collapseActiveRoute;
				}
			} else if (routes[i].category) {
				let categoryActiveRoute = getActiveRoute(routes[i].items);
				if (categoryActiveRoute !== activeRoute) {
					return categoryActiveRoute;
				}
			} else {
				// if (window.location.href.indexOf(routes[i].layout + routes[i].path) !== -1) {
				if (window.location.href.indexOf(routes[i].path) !== -1) {
					return routes[i].name;
				}
			}
		}
		return activeRoute;
	};
	const getActiveNavbar = (routes) => {
		let activeNavbar = false;
		for (let i = 0; i < routes.length; i++) {
			if (routes[i].collapse) {
				let collapseActiveNavbar = getActiveNavbar(routes[i].items);
				if (collapseActiveNavbar !== activeNavbar) {
					return collapseActiveNavbar;
				}
			} else if (routes[i].category) {
				let categoryActiveNavbar = getActiveNavbar(routes[i].items);
				if (categoryActiveNavbar !== activeNavbar) {
					return categoryActiveNavbar;
				}
			} else {
				// if (window.location.href.indexOf(routes[i].layout + routes[i].path) !== -1) {
				if (window.location.href.indexOf(routes[i].path) !== -1) {
					return routes[i].secondary;
				}
			}
		}
		return activeNavbar;
	};
	const getActiveNavbarText = (routes) => {
		let activeNavbar = false;
		for (let i = 0; i < routes.length; i++) {
			if (routes[i].collapse) {
				let collapseActiveNavbar = getActiveNavbarText(routes[i].items);
				if (collapseActiveNavbar !== activeNavbar) {
					return collapseActiveNavbar;
				}
			} else if (routes[i].category) {
				let categoryActiveNavbar = getActiveNavbarText(routes[i].items);
				if (categoryActiveNavbar !== activeNavbar) {
					return categoryActiveNavbar;
				}
			} else {
				if (window.location.href.indexOf(routes[i].path) !== -1) {
					// if (window.location.href.indexOf(routes[i].layout + routes[i].path) !== -1) {
					return routes[i].messageNavbar;
				}
			}
		}
		return activeNavbar;
	};
	const getRoutes = (routes) => {
		return routes.map((prop, key) => {
			// if (prop.layout === '/admin') {
			// 	return <Route path={prop.path} component={prop.component} key={key} />;
			// }
			// if (prop.collapse) {
			// 	return getRoutes(prop.items);
			// }
			// if (prop.category) {
			// 	return getRoutes(prop.items);
			// } else {
			// 	return null;
			// }
			return <Route path={prop.path} element={prop.element} key={key} />;
		});
	};
	document.documentElement.dir = 'ltr';
	const { onOpen } = useDisclosure();
	document.documentElement.dir = 'ltr';
	return (
		<ContextProvider>
		<Box>
			<Box>
				<SidebarContext.Provider
					value={{
						toggleSidebar,
						setToggleSidebar
					}}>
					<Sidebar routes={routes} display='none' {...rest} />
					<Box
						float='right'
						minHeight='100vh'
						height='100%'
						overflow='auto'
						position='relative'
						maxHeight='100%'
						w={{ base: '100%', xl: 'calc( 100% - 290px )' }}
						maxWidth={{ base: '100%', xl: 'calc( 100% - 290px )' }}
						transition='all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1)'
						transitionDuration='.2s, .2s, .35s'
						transitionProperty='top, bottom, width'
						transitionTimingFunction='linear, linear, ease'>
						<Portal>
							<Box>
								<Navbar
									onOpen={onOpen}
									logoText={'Laravel React'}
									brandText={getActiveRoute(routes)}
									secondary={getActiveNavbar(routes)}
									message={getActiveNavbarText(routes)}
									fixed={fixed}
									{...rest}
								/>
							</Box>
						</Portal>

						{getRoute() ? (
							<Box mx='auto' p={{ base: '20px', md: '30px' }} pe='20px' minH='100vh' pt='50px'>
								{/* <Switch> */}
								<Routes>
									{getRoutes(routes)}
								</Routes>
									{/* <Outlet /> */}

									{/* <Redirect from='/' to='/admin/default' /> */}
								{/* </Switch> */}
							</Box>
						) : null}
						{/* <Box>
							<Footer />
						</Box> */}
					</Box>
				</SidebarContext.Provider>
			</Box>
		</Box>
		</ContextProvider>
	);
}
