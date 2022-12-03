import {defineStore} from 'pinia'
import axiosClient from '../axios'

export const useReportStore = defineStore('reportStore',{
    state:()=>{
        return {
            generalReport:[],
            chartReport:[],
            examReportByOfThisYear:[],
            years:[],
        }
    },
    actions:{
        async getGeneralReport(){
            await axiosClient.get(`/generalReport`)
            .then((response)=>{
                this.generalReport=response.data
            }).catch((error)=>{

            })
        },
        async getExamReportByOfThisYear(data){
            // alert(data)
            await axiosClient.post(`/examReportByOfThisYear`,{'year':data})
            .then((response)=>{
                // console.log(response.data);
                this.examReportByOfThisYear=response.data.examReport
                console.log(this.examReportByOfThisYear);
                this.years=response.data.examYears
            }).catch((error)=>{
                console.log(error.response.data.message);
            })
        }
    }
})