// import React from "react";
// import ReactDOM from "react-dom/client";
// import App from "./App.jsx";
// // import "./index.css";
// import router from "./router.jsx";
// import { RouterProvider } from "react-router-dom";
// import { ContextProvider } from "./context/ContextProvider.jsx";
// // import 'mdb-react-ui-kit/dist/css/mdb.min.css';
// // import "@fortawesome/fontawesome-free/css/all.min.css";

// ReactDOM.createRoot(document.getElementById("root")).render(
//   <React.StrictMode>
//     <ContextProvider>
//       <RouterProvider router={router} />
//     </ContextProvider>
//   </React.StrictMode>
// );
import React from "react";
import ReactDOM from "react-dom";
import { createRoot } from "react-dom/client";
// import "assets/css/App.css";
import { HashRouter, Route } from "react-router-dom";
// import AuthLayout from "layouts/auth";
// import AdminLayout from "layouts/admin";
// import RtlLayout from "layouts/rtl";
import { ChakraProvider } from "@chakra-ui/react";
import theme from "/src/theme/theme";
import { ThemeEditorProvider } from "@hypertheme-editor/chakra-ui";
import { ContextProvider } from "/src/context/ContextProvider.jsx";
import { RouterProvider } from "react-router-dom";
import router from "./router.jsx";

createRoot(document.getElementById("root")).render(
  <ChakraProvider theme={theme}>
    <React.StrictMode>
      <ContextProvider>
        <ThemeEditorProvider>
          {/* <HashRouter> */}
            {/* <Switch> */}
              {/* <Route path={`/auth`} component={AuthLayout} /> */}
              {/* <Route path={`/admin`} component={AdminLayout} />
              <Route path={`/rtl`} component={RtlLayout} /> */}
              {/* <Redirect from="/" to="/admin" /> */}
              <RouterProvider router={router} />
            {/* </Switch> */}
          {/* </HashRouter> */}
        </ThemeEditorProvider>
      </ContextProvider>
    </React.StrictMode>
  </ChakraProvider>
);
