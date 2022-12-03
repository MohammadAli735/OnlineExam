import { createRouter, createWebHistory} from "vue-router";
import Home from '../components/Home.vue'
const routes= [
    {
        path:'/home',
        name:'Home',
        component:Home
    },
    {
        path:'/questions',
        name:'Question.Index',
        component:()=>import('../components/question/QuestionIndex.vue')
    },
    {
        path:'/exam/create',
        name:'Exam.create',
        component:()=>import('../components/Exam/ExamCreate.vue')
    }
]
export default createRouter({
    history:createWebHistory(),
    routes
})