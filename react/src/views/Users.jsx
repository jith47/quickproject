import { useEffect } from "react"
import { useState } from "react"
import axiosClient from "../axios-client"
import { Link, Navigate, Outlet } from "react-router-dom";

export default function Users() {
    const [users, setUsers] =  useState([])
    const [loading, setLoading] = useState(false)
    useEffect(() => {
       getUsers() 
    }, [])

    const getUsers = () => {
        setLoading(true)
        axiosClient.get('/users')
        .then(({data}) => {
            setLoading(false)
            console.log(data);
        }).catch((err) => {
            setLoading(false)
            console.log(err);
        })
    }
    return (
        <div>
            <div>
                Users
            </div>
            <Link to="/users/new">Add new</Link>
        </div>
    )
}