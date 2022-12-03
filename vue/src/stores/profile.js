import { defineStore } from "pinia";
import axiosClient from "../axios";
export const useProfileStore=defineStore("profileStore",{
    state:()=>{
        return {
           profile:[],
           error:[]
        }
    },
    actions:{
        async getProfile(){
            await axiosClient.get('/profile')
            .then((response)=>{
                this.profile=response.data.data
            })
            .catch((error)=>{

            })
        },
        async updateProfile(data){
            await axiosClient.post(`updateProfile/${this.profile[0].id}`,data)
            .then((response)=>{
                this.error=[]
                this.getProfile()
            }).catch((error)=>{
                this.error=error.response.data.errors

            })
        },
        async chnagePwd(data){
            await axiosClient.post(`changePWD/${this.profile[0].id}`,data)
            .then((response)=>{

            }).catch((error)=>{
                
            })
        }
    }
})