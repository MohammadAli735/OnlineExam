<template>
    <div class="container ">
        <div class="bg-white shadow rounded p-2">
            <div class="card">
                <div class="card-header text-center">
                    <b>stay back and wait a few seconds to see your result!!</b>
                </div>
                <div v-if="Object.keys(process).length" class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- {{ user }} -->
                            <div class="card ">
                                <div class="card-header ">
                                    <h3>your information</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td>id</td>
                                            
                                            <td class="floatRight">{{ user.id }}</td>
                                        </tr>


                                        <tr>
                                            <td>name</td>
                                            <td class="floatRight">{{ user.name }}</td>

                                        </tr>
                                        <tr>
                                            <td>last name</td>
                                            <td class="floatRight">{{user.last_name}}</td>

                                        </tr>
                                        <tr>
                                            <td>father</td>
                                            <td class="floatRight">{{user.father_name}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>your resut information</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                total correct answers
                                            </td>
                                            <td class="floatRight">
                                                {{ correctAnswersArr.length}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>total incorrect answers</td>
                                            <td class="floatRight">{{ incorrectAnswersArr.length}}</td>
                                        </tr>
                                        <tr>
                                            <td>total mark</td>
                                            <td class="floatRight">{{ (mark / questionStore.questionAns.length) * correctAnswersArr.length }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                          
                            <router-link :to="{ name: 'ansewer.review' }" class="btn btn-outline-primary m-3 floatRight">review the
                                answer </router-link>
                        </div>
                    </div>

                </div>
                <div v-else>
                    <h1 class="fa fa-spin">
                        <i class="fa fa-spinner text-primary"></i>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useQuestionStore } from '../../stores/question'
import { useResultStore } from '../../stores/result'
import { useAuthStore } from '../../stores/auth';

const autStore=useAuthStore()
const resultStore = useResultStore()
const questionStore = useQuestionStore()
const answers = JSON.parse(sessionStorage.getItem("result"))
const mark = sessionStorage.getItem("mark")
let process = reactive([])
let correctAnswersArr = reactive([])
let incorrectAnswersArr = reactive([])
questionStore.getQuestionAns()
let calculate = ref(false)
let user = JSON.parse(sessionStorage.getItem("user"))
let timer=ref(3000)
if(sessionStorage.getItem("examStart")==='false'){
    timer.value=300
}
setTimeout(() => {
    if (Object.keys(questionStore.questionAns).length) {
        for (let index = 0; index < questionStore.questionAns.length; index++) {
            questionStore.questionAns[index].question
            let Arraydata = answers.find((answer) => answer.question == questionStore.questionAns[index].question)
            process.push(Arraydata.selectedAnswer)
        }
        sessionStorage.setItem("processed", JSON.stringify(process))
    }
    if (process.length > 0) {
        calculate.value = true
    }
    if (calculate.value) {
        for (let index = 0; index < questionStore.questionAns.length; index++) {
            if (questionStore.questionAns[index].correct_ans == process[index]) {
                correctAnswersArr.push(process[index])
            } else {
                incorrectAnswersArr.push(process[index])
            }
        }
    }
    if (calculate.value) {
        let resultData = []
        resultData['mark'] = (mark / questionStore.questionAns.length) * correctAnswersArr.length
        // alert(resultData['mark'])
        resultData['user_id'] = user.id
        if (sessionStorage.getItem("examStart") === 'true') {
            saveResultData({ ...resultData })
        }
    }
}, timer.value)

const saveResultData = async (resultData) => {
    resultStore.saveResult(resultData)
    sessionStorage.setItem("examStart", false)
    // 
    
}
</script>
<style scoped>
    .floatRight{
        float: right;
    }
</style>