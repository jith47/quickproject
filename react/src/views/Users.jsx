import { useEffect } from "react"
import { useState } from "react"
import axiosClient from "../axios-client"
import { Link, Navigate, Outlet } from "react-router-dom";
import UserList from "./users/dataTables";

export default function Users() {
    const [users, setUsers] = useState([]);
    const [metadata, setMeta] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        getUsers();
        import('../css/Login.module.css')

    }, []);

    const getUsers = () => {
        axiosClient.get('/users')
        .then((data) => {
            setUsers(data.data.data)
            setMeta(data.data)
        }).catch((data) => {
            console.log(data);
        })
            
    };
    return (
        <div>
            <div>Users</div>
            <UserList
                columnsDataCheck={[
                    {
                        Header: "Name",
                        accessor: "name",
                    },
                    {
                        Header: "Email",
                        accessor: "email",
                    }
                ]}
                tableDataCheck={users ?? []}
            />
            <Link to="/users/new">Add new</Link>
        </div>
    );
}
