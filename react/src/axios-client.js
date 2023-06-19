import axios from "axios";
import { error } from "laravel-mix/src/Log";

const axiosClient = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL + '/api',
    withCredentials: true,
})

// axiosClient.defaults.withCredentials = true;

axiosClient.interceptors.request.use((config) => {
    const token = sessionStorage.getItem('ACCESS_TOKEN')
    config.headers.Authorization = `Bearer ${token}`
    return config;
})

axios.interceptors.response.use((response) => {
    return response;
}, (error) => {
    const {response} = error;
    if (response.status == 401) {
        sessionStorage.removeItem('ACCESS_TOKEN')
    }
    throw error;
})

export default axiosClient;