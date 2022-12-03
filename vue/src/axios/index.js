import axios from "axios"
import {useAuthStore} from '../stores/auth'
const axiosClient = axios.create({
    baseURL:`http://127.0.0.1:8000/api`,
   
})
axiosClient.interceptors.request.use(config => {
    const {token}=useAuthStore()
    config.headers.Authorization = `Bearer ${token}`
    return config
})

export default axiosClient