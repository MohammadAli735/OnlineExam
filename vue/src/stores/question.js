import {defineStore} from 'pinia'
import axiosClient from '../axios'
import router from '../router'

export const useQuestionStore=defineStore("QuestionStore",{
    state:()=>{
        return {
            Questions:[],
            Question:[],
            questionAns:[],
            questionCreateErrors:[],
            decrement:false,
            save:false,
            links:[]
        }
    },

    actions:{
        async saveQuestion(data){
            
            this.decrement=true
            await axiosClient.post(`/questions`,data)
            .then((response)=>{
                this.save=true

                console.log(response.data.message);
                this.decrement=response.data.message
            })
            .catch((error)=>{
                this.decrement=false
                this.questionCreateErrors=error.response.data.errors
                console.log(error.response.data.errors)
            })
        },
        async getQuestion(url=null){
            let ur=url?url:'/questions'
            await axiosClient.get(ur)
            .then((response)=>{
                this.Questions=response.data.data
               
                this.links=response.data.meta
            }).catch((error)=>{
                console.log(error.response.data.message);
            })
        },

        async addFromQuestionBox(url=null,id){
            let ur=url?url:'/add/from/questionBox'
            await axiosClient.get(ur+'/'+id)
            .then((response)=>{
                this.Questions=response.data.data
               
                this.links=response.data.meta
            }).catch((error)=>{
                console.log(error.response.data.message);
            })
        },

        async getQuestionAns(){
            await axiosClient.post(`/questionAns`)
            .then((response)=>{
                this.questionAns=response.data
            }).catch((error)=>{
                console.log(error.response.data.message);
            })
        },
        async saveExamQuestion(exam_id,data){
            await axiosClient.post(`/exam/questions/${exam_id}`,data)
            .then((response)=>{
               router.push({name:'exam.show',params:{id:exam_id}})
            })
            .catch((error)=>{
                console.log(error.response.data.message);
            })
        },
        async editQuestion(question_id){
            await axiosClient.get(`/questions/${question_id}`)
            .then((response)=>{
                this.Question=response.data.data
            })
            .catch((error)=>{
                console.log(error.response.data.message)
            })
        }
        ,
        async updateQuestion(question_id,data){
            // alert("doUpdateQuestion")
            await axiosClient.post(`/questions/${question_id}`,data)
            .then((response)=>{
                router.push({name:'question.index'})
            }).catch((error)=>{
                console.log(error.response.data.message)
            })
        }
    }

})