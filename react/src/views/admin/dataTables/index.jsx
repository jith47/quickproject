/*!
  _   _  ___  ____  ___ ________  _   _   _   _ ___
 | | | |/ _ \|  _ \|_ _|__  / _ \| \ | | | | | |_ _|
 | |_| | | | | |_) || |  / / | | |  \| | | | | || |
 |  _  | |_| |  _ < | | / /| |_| | |\  | | |_| || |
 |_| |_|\___/|_| \_\___/____\___/|_| \_|  \___/|___|

=========================================================
* Horizon UI - v1.1.0
=========================================================

* Product Page: https://www.horizon-ui.com/
* Copyright 2023 Horizon UI (https://www.horizon-ui.com/)

* Designed and Coded by Simmmple

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

// Chakra imports
import { Box, Flex, SimpleGrid } from "@chakra-ui/react";
import DevelopmentTable from "/src/views/admin/dataTables/components/DevelopmentTable.jsx";
import CheckTable from "/src/views/admin/dataTables/components/CheckTable.jsx";
import ColumnsTable from "/src/views/admin/dataTables/components/ColumnsTable.jsx";
import ComplexTable from "/src/views/admin/dataTables/components/ComplexTable.jsx";
// import {
//   columnsDataDevelopment,
//   columnsDataCheck,
//   columnsDataColumns,
//   columnsDataComplex,
// } from "/src/views/admin/dataTables/variables/columnsData.js";
import tableDataDevelopment from "/src/views/admin/dataTables/variables/tableDataDevelopment.json";
import tableDataCheck from "/src/views/admin/dataTables/variables/tableDataCheck.json";
import tableDataColumns from "/src/views/admin/dataTables/variables/tableDataColumns.json";
import tableDataComplex from "/src/views/admin/dataTables/variables/tableDataComplex.json";
import React from "react";

// export default function Settings() {
  export default function Settings(props) {

  const {columnsDataCheck, tableDataCheck} = props;
  // Chakra Color Mode
  return (
    <Box pt={{ base: "130px", md: "80px", xl: "80px" }}>
      <Flex px='25px' justify='space-between' mb='20px' align='center'>
      {/* <SimpleGrid
        mb='20px'
        columns={{ sm: 1, md: 2 }}
        spacing={{ base: "20px", xl: "20px" }}> */}
        {/* <DevelopmentTable
          columnsData={columnsDataDevelopment}
          tableData={tableDataDevelopment}
        /> */}
        <CheckTable columnsData={columnsDataCheck} tableData={tableDataCheck} />
        {/* <ColumnsTable
          columnsData={columnsDataColumns}
          tableData={tableDataColumns}
        />
        <ComplexTable
          columnsData={columnsDataComplex}
          tableData={tableDataComplex}
        /> */}
      {/* </SimpleGrid> */}
      </Flex>
    </Box>
  );
}
