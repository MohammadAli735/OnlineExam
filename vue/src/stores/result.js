import {defineStore} from 'pinia'
import axiosClient from "../axios";

export const useResultStore=defineStore("ResultStore",{
    state:()=>{
        return {
            results:[]
        }
    },
    actions:{
       async saveResult(data){
         await axiosClient.post(`/results`,data)
         .then((response)=>{
            console.log(response.data);
         }).catch((error)=>{
            console.log(error.response.data.message);
         })
       }
    }

})