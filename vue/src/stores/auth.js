import { defineStore } from "pinia";
import axiosClient from "../axios";
import router from "../router";
export const useAuthStore = defineStore("counter", {
    state: () => {
        return {
            token: sessionStorage.getItem("TOKEN"),
            error: [],
            credential:null,
            user: sessionStorage.getItem("user"),
            registerationError: [],

        };
    },
    actions: {
        async login(data) {
            await axiosClient.post(`/login`, data)
                .then((response) => {
                    this.user = response.data.user
                    this.token = response.data.token
                    sessionStorage.setItem("TOKEN", response.data.token)
                    sessionStorage.setItem("user", JSON.stringify(response.data.user))
                    router.push({ name: 'Dashboard' })
                    //   sessionStorage.setItem("examStart",true)
                }).catch((error) => {
                    console.log(error.response.status);
                    if (error.response.status === 500) {
                        this.error = error.response.data.message = 'please make sure that the database server is active but if you sure that the database server is active the problem is elsewhere please contact to specialist person to solve the isuee'

                    } else {
                        if (!error.response.data.errors) {

                            this.credential = "the credentials are not correct"
                            this.error=[]
                           
                        }else{
                            this.error = error.response.data.errors
                            this.credential=null

                        }

                    }
                })

        },
        async register(data) {
            await axiosClient.post(`/register`, data)
                .then((response) => {
                    this.user = response.data.user
                    this.token = response.data.token
                    sessionStorage.setItem("TOKEN", response.data.token)
                    sessionStorage.setItem("user", JSON.stringify(response.data.user))
                    sessionStorage.setItem("examStart", true)
                    router.push({ name: 'exam.start' })
                }).catch((error) => {
                    this.registerationError = error.response.data.errors

                })
        },
        async logOutUser(id) {
            await axiosClient.post(`/logout`)
                .then((response) => {
                    if (response.status === 200) {
                        this.user = []
                        this.token = null
                        sessionStorage.removeItem("TOKEN")
                        sessionStorage.removeItem("user")
                        router.push('/')
                    }
                }).catch((error) => {
                    console.log(error.response.data.message);
                })
        }
    },
});
