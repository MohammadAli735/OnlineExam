<template>
    <div class="container">
        <div class="bg-white shadow rounded">
            <button class="btn btn-success btn-sm floatright " v-if="examQuestionNumber">{{ examQuestionNumber
            }}</button>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="p-5">


                        <form class="user" id="questionForm" @submit.prevent="createQuestion">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">question</label>
                                        <textarea class="form-control  textarea" aria-describedby="emailHelp"
                                            placeholder="" name="question"></textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.question">
                                            {{ questionStore.questionCreateErrors.question[0] }}
                                        </p>

                                    </div>
                                    <div class="form-group">
                                        <label for="">ans1</label>
                                        <textarea class="form-control  textarea" id="ans1" name="ans1"
                                            placeholder=""></textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans1">
                                            {{ questionStore.questionCreateErrors.ans1[0] }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">ans2</label>
                                        <textarea class="form-control " id="ans2" aria-describedby="emailHelp"
                                            placeholder="ans2..." name="ans2"></textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans2">
                                            {{ questionStore.questionCreateErrors.ans2[0] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ans3</label>

                                        <textarea class="form-control  textarea" id="ans1" name="ans3"
                                            placeholder=""></textarea>

                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans3">
                                            {{ questionStore.questionCreateErrors.ans3[0] }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">ans4</label>
                                        <textarea class="form-control " id="ans4" name="ans4"
                                            aria-describedby="emailHelp" placeholder="mark"></textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans4">
                                            {{ questionStore.questionCreateErrors.ans4[0] }}
                                        </p>
                                    </div>


                                    <div class="form-group mt-2">
                                        <label for="" class="mt-2">correct_ans</label>
                                        <select class="form-control " placeholder="select correct answer"
                                            @change="correctAnswer" name="correct_ans">
                                            <option value="" selected disabled>select correct answer</option>
                                            <option value="ans1">ans1</option>
                                            <option value="ans2">ans2</option>
                                            <option value="ans3">ans3</option>
                                            <option value="ans4">ans4</option>
                                        </select>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.correct_ans">
                                            {{ questionStore.questionCreateErrors.correct_ans[0] }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <button v-if="examQuestionNumber" type="submit"
                                class="mt-2 btn btn-primary btn-user  w-full btn-block ">
                                create exam
                                <span class="fa fa-spin" v-if="submit">
                                    <span class="fa fa-spinner"></span>
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import router from '../../router';
import { useQuestionStore } from '../../stores/question';
import { useExamStore } from '../../stores/exam';
import { ref } from 'vue'
const examStore = useExamStore()
let correctAns = ref(null)
let submit = ref(false)
let examQuestionNumber = ref(sessionStorage.getItem("examQuestionNumber"))
const questionStore = useQuestionStore()
const createQuestion = () => {
    submit.value = true
    setTimeout(async () => {

        let form = document.getElementById('questionForm');
        let formData = new FormData(form)
        formData.append("correct_ans", setCorrect(formData))
        formData.append("exam_id", sessionStorage.getItem("exam_id"))
        // sessionStorage.setItem("examQuestionNumber", examQuestionNumber.value - 1)
        // examQuestionNumber.value = sessionStorage.getItem("examQuestionNumber")
        await questionStore.saveQuestion(formData)
        if (questionStore.save) {
            sessionStorage.setItem("examQuestionNumber", examQuestionNumber.value - 1)
            examQuestionNumber.value = sessionStorage.getItem("examQuestionNumber")
            // console.log(examQuestionNumber.value);
            redirectFunc()
            form.reset()
            submit.value = false

           
        } else {
            submit.value = false
        }
    })
    // after complete clear exam_id and examQuestionNumber storage session
}
const redirectFunc=()=>{
    // alert("sdfksd")
    if (examQuestionNumber.value == 0) {
        router.push({ name: 'exam.index' })
    }

}
// if (examStore.examQuestionNumber === 0) {
//     sessionStorage.removeItem("examQuestionNumber")
//     sessionStorage.removeItem("exam_id")
//     router.push({ name: 'question.index' })
// }
const correctAnswer = (event) => {
    correctAns.value = event.target.value
}
const setCorrect = (formData) => {
    let answer = null
    if (correctAns.value === 'ans1') {
        answer = formData.get("ans1")
    }
    else if (correctAns.value === 'ans2') {
        answer = formData.get("ans2")
    }
    else if (correctAns.value === 'ans3') {
        answer = formData.get("ans3")
    }
    else if (correctAns.value === 'ans4') {
        answer = formData.get("ans4")
    }
    return answer
}
</script>

<style scoped>
.floatright {
    margin: 10px;
    float: right;
    box-sizing: border-box;
    text-align: center;
}
</style>