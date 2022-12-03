import { defineStore } from "pinia";
import axiosClient from "../axios";
export const studentRequest=defineStore("StudentRequest",{
    state:()=>{
        return {
            studentRequests:[]
        }
    },
    actions:{
        async fetchRequest(){
            await axiosClient.get(`/requests`)
            .then((response)=>{
                this.studentRequests=response.data.data
            })
            .catch((error)=>{
                console.log("message error "+error);
            })
        }
    }
})