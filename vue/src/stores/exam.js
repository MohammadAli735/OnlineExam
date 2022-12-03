import { inject } from 'vue'
import { defineStore } from 'pinia'
import axiosClient from '../axios'
import router from '../router'

export const useExamStore = defineStore("examStore", {
    state: () => {
        return {
            exams: [],
            exam: [],
            examQuestionNumber: sessionStorage.getItem("examQuestionNumber"),
            id: sessionStorage.getItem("exam_id"),
            shaffle:[],
            errors:[],
            examError:[],
            links:[]
        }
    },
    actions: {
        async saveExam(data) {
            await axiosClient.post(`/exams`, data)
                .then((response) => {
                    console.log(response.data.questionNo)
                    this.examQuestionNumber = response.data.questionNo
                    this.id = response.data.id
                    sessionStorage.setItem("examQuestionNumber", response.data.questionNo)
                    sessionStorage.setItem("exam_id", response.data.id)
                    router.push({ name: 'Exam.Question.Create' })
                })
                .catch((error => {
                    this.errors=error.response.data.errors
                    console.log(error.response.data.errors);
                }))
        },
        async getExam(url=null) {
            let ur=url?url:'/exams'
            await axiosClient.get(ur)
                .then((response) => {
                    this.exams=response.data.data
                    this.links=response.data.meta
                })
                .catch((error) => {
                    console.log(error.response.data.message);
                })
        },

      
        async active(id){
            await axiosClient.put(`/exams/${id}/active`)
            .then((response)=>{
                this.exams=[]
                this.getExam()
            })
            .catch((error)=>{
                console.log(error.response.data.message);
            })
        },
        async show(id){
            await axiosClient.get(`/exams/${id}`)
            .then((response)=>{
                this.exam=response.data.data
            })
            .catch((error)=>{
                console.log(error.response.data.message)
            })
        },
        async examStart(){
            const cryoptojs = inject('cryptojs')
            let pwd=cryoptojs.AES.encrypt('123', "test").toString()
            let pwd1=cryoptojs.AES.decrypt(pwd, 'test').toString(cryoptojs.enc.Utf8)
           
            await axiosClient.get(`/exam/question/answer/start`)
            .then((response)=>{
                this.exam=response.data.data
 
            }).catch((error)=>{
                this.examError='no active exam found';
                // console.log(error.response.data.message);
            })
        }
    },
   
})