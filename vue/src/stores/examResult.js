import { defineStore } from "pinia";
import axiosClient from "../axios";
export const useExamResult=defineStore("examResult",{
    state:()=>{
        return {
            examResults:[],
            exams:[],
            filter:[],
        }
    }
    ,
    actions:{
        async getExamResults(searchTirm=null){
            await axiosClient.post('/getResults',{'search':searchTirm})
            .then((response)=>{
                this.examResults=response.data.result
                this.filter=response.data.result
                this.exams=response.data.exams
                console.log(response.data);
            }).catch((error)=>{
                console.log(error.response.data);
            })
        }
    }
})