import { defineStore } from "pinia";
import axiosClient from "../axios";


export const useReviewStore=defineStore("ReviewStore",{
    state:()=>{
        return  {
          QAS:[]
        }
    },
    actions:{
        async getQAS(){
            await axiosClient.post(`/qas`)
            .then((response)=>{
                this.QAS=response.data
            })
            .catch((error)=>{
                console.log(error.response.data.message);
            })
        }
    }
})