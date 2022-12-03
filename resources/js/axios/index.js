window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import axios from axios

const axiosClient=axios.create({
    baseURL:'/api'
})

axiosClient.interceptors.request.use((config=>{
    config.header.Authorization= `Bearer ${authStore.token}`
    return config
}))
export default axiosClient;