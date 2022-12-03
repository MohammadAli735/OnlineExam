import { ref } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "../stores/auth";
import HomeView from "../views/HomeView.vue";
const authUser = JSON.parse(sessionStorage.getItem("user"))
let role =ref(0)
if(authUser!==null){
    role.value = authUser.role
}
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {

            path: '/',
            redirect: '/dashboard',
            component: () => import('../components/dashboard/DefaultLayout.vue'),

            
            meta: { requiresAuth: true },
            
            
            children: [
                
                {
                    path: '/dashboard',
                    name: 'Dashboard',
                    component: () => import('../components/dashboard/Dashboard.vue'),
                
                },
                {
                    path: '/profile',
                    name: 'profile',
                    component: () => import('../components/profile/Profile.vue')
                },
                {
                    path: '/change/password',
                    name: 'password.change',
                    component: () => import('../components/profile/ChangePwd.vue')
                },
                {
                    path: '/chart',
                    name: 'chart',
                    component: () => import('../components/chart/Chart.vue')
                },
                {
                    path: '/studentRequest',
                    name: 'StudentRequest',
                    component: () => import('../components/student/StudentRequest.vue')
                },
                {
                    path: '/exam/create',
                    name: 'exam.create',
                    component: () => import('../components/Exam/ExamCreate.vue')
                },
                {
                    path: '/questions',
                    name: 'question.index',
                    component: () => import('../components/question/QuestionIndex.vue')
                },
                
                {
                    path: '/exam/questions/create',
                    name: 'Exam.Question.Create',
                    component: () => import('../components/question/QuestionCreate.vue')
                },
                {
                    path: '/exams',
                    name: 'exam.index',
                    component: () => import('../components/Exam/ExamIndex.vue')
                },
                {
                    path: '/questions/:id/edit',
                    name: 'question.edit',
                    component: () => import('../components/question/QuestionEdit.vue'),
                    props: true
                },
                {
                    path: '/exams/:id/info',
                    name: 'exam.show',
                    component: () => import('../components/Exam/ExamShow.vue'),
                    props: true
                },
                {
                    path: '/start/exam',
                    name: 'exam.start',
                    component: () => import('../components/Exam/ExamStart.vue'),
                    beforeEnter: (to, from, next) => {
                        if (sessionStorage.getItem("examStart") === 'true') {
                            next()
                        } else {
                            alert("you can't go to this route")
                            sessionStorage.removeItem("TOKEN")
                            const authStore=useAuthStore()
                            authStore.token=null
                            next({ name: 'home' })
                        }
                    }
                },
                {
                    path: '/exam/result',
                    name: 'exam.result',
                    component: () => import('../components/result/Result.vue')

                },
                {
                    path: '/ansewer/review',
                    name: 'ansewer.review',
                    component: () => import('../components/review/Review.vue')
                },
                {
                    path: '/exam/result/index',
                    name: 'exam.result.index',
                    component: () => import('../components/student/ExamResult.vue')
                },
                {
                    path: '/addQuestion/:id/questionBox',
                    name: 'addQuestion.questionBox',
                    component: () => import('../components/question/Questionbox.vue'),
                    props: true
                },

            ]
        },
        {

        },


        {
            path: '/home',
            redirect: '/',
            component: () => import('../components/login/AuthLayout.vue'),
            name: 'landing',

            children: [{

                path: "/",
                name: "home",
                component: HomeView,


            },
            {
                path: "/about",
                name: "about",
                component: () => import("../views/AboutView.vue"),
            },

            {
                path: '/auth',
                redirect: '/login',
                name: 'Auth',
                meta: { isGuest: true },
                children: [{
                    path: '/login',
                    name: 'Login',
                    component: () => import('../components/login/Login.vue')
                },

                {
                    path: '/register',
                    name: 'Register',
                    component: () => import('../components/register/Register.vue')
                },
                ]
            }
            ]
        },



    ],
});
router.beforeEach((to, from, next) => {
    const { token } = useAuthStore()
    if (to.meta.requiresAuth && !token) {
        next({ name: 'home' })
    } else if (token && (to.meta.isGuest)) {
        next({ name: 'Dashboard' })
    } else {
        next()
    }
})

export default router;
