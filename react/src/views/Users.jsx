import { useEffect } from "react"
import { useState } from "react"
import axiosClient from "../axios-client"
import { Link, Navigate, Outlet } from "react-router-dom";
import Settings from "./admin/dataTables";

export default function Users() {
    const [users, setUsers] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        getUsers();
    }, []);

    const getUsers = () => {
        const fetchData = async () => {
            setLoading(true);
            try {
              const response = await axiosClient.get('/users');
              setUsers(response.data);
            } catch (error) {
              console.error('Error fetching users:', error);
            } finally {
              setLoading(false);
            }
          };
      
          fetchData();
    };

    return (
        <div>
            <div>Users</div>
            <Settings
                columnsDataCheck={[
                    {
                        Header: "NAME",
                        accessor: "name",
                    },
                    {
                        Header: "TECH",
                        accessor: "tech",
                    },
                    {
                        Header: "DATE",
                        accessor: "date",
                    },
                    {
                        Header: "PROGRESS",
                        accessor: "progress",
                    },
                ]}
                tableDataCheck={{users}}
            />
            <Link to="/users/new">Add new</Link>
        </div>
    );
}
