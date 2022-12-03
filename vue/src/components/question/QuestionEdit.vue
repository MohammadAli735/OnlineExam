<template>
    <div class="container">
        <div class="bg-white shadow rounded">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="p-5">
                        <!-- {{questionStore.Question}} -->

                        <form class="user"  @submit.prevent="doUpdateQuestion" id="questionForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">question</label>
                                        <textarea class="form-control  "
                                            aria-describedby="emailHelp" placeholder="" name="question"
                                            :value="questionStore.Question.question"
                                            >
                                           
                                        </textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.question">
                                            {{ questionStore.questionCreateErrors.question[0] }}
                                        </p>

                                    </div>
                                    <div class="form-group">
                                        <label for="">ans1</label>
                                        <textarea class="form-control  " id="ans1" name="ans1"
                                            placeholder="" :value="questionStore.Question.ans1">
                                            
                                        </textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans1">
                                            {{ questionStore.questionCreateErrors.ans1[0] }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">ans2</label>
                                        <textarea class="form-control " id="ans2" aria-describedby="emailHelp"
                                            placeholder="ans2..." name="ans2" :value="questionStore.Question.ans2">

                                        </textarea>
                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans2">
                                            {{ questionStore.questionCreateErrors.ans2[0] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ans3</label>

                                        <textarea class="form-control  " id="ans1" name="ans3"
                                            placeholder="" :value="questionStore.Question.ans3">
                                            
                                        </textarea>

                                        <p class="text-danger" v-if="questionStore.questionCreateErrors.ans3">
                                            {{ questionStore.questionCreateErrors.ans3[0] }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">ans4</label>
                                        <textarea class="form-control " id="ans4" name="ans4"
                                            aria-describedby="emailHelp" placeholder="mark" :value="questionStore.Question.ans4">
                                            
                                        </textarea>
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
                            <button type="submit" class="mt-2 btn btn-success btn-user  w-full btn-block ">
                                update exam
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
const props = defineProps({ id: { type: String, required: true } })
questionStore.editQuestion(props.id)
const doUpdateQuestion = async() => {
    submit.value = true
    // setTimeout(async () => {
        let form = document.getElementById('questionForm');
        let formData = new FormData(form)
        formData.append("_method","PUT")

        formData.append("correct_ans", setCorrect(formData))
        formData.append("exam_id", sessionStorage.getItem("exam_id"))
        await questionStore.updateQuestion(props.id,formData)
        if (questionStore.save) {

            // router.push({name:'question.index'})
            submit.value = false


        } else {
            submit.value = false
        }
    // })

}


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
textarea{
    text-align: left;
    padding: 10px;
    min-height: 100px;
}
</style>