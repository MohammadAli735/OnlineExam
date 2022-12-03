<template>
    <div class="container-fulid mx-2 mt-5">
        <div class="bg-white shadow rounded px-5">
            <div v-if="Object.keys(examStore.exam).length && looping">
                <div class="row">
                    <div class="col-md-7">
                        <h1>question number {{ parseInt(nextPrev + 1) }}</h1>
                        <h3>{{ examStore.exam.questions[nextPrev].question }}</h3>
                        <input type="radio" :value="examStore.exam.questions[nextPrev].ans1" id="ans1"
                        v-model="selectedAns">
                        <label for="ans1"  class="hover mx-3">{{ examStore.exam.questions[nextPrev].ans1 }}</label>
                        <br>
                        <input type="radio" :value="examStore.exam.questions[nextPrev].ans2" id="ans2"
                        v-model="selectedAns">
                        <label for="ans2"  class="hover mx-3">{{ examStore.exam.questions[nextPrev].ans2 }}</label>
                        <br>
                        <input type="radio" :value="examStore.exam.questions[nextPrev].ans3" id="ans3"
                        v-model="selectedAns">
                        <label for="ans3"  class="hover mx-3">{{ examStore.exam.questions[nextPrev].ans3 }}</label> 
                        <br>

                        <input type="radio" :value="examStore.exam.questions[nextPrev].ans4" id="ans4"
                        v-model="selectedAns">
                        <label for="ans4"  class="hover mx-3">{{ examStore.exam.questions[nextPrev].ans4 }}</label>


                    </div>

                    <div class="col-md-5">
                   
                        <Counter2 :duration="examStore.exam.duration" @redirectTo="redirectTo" />
                    </div>

                </div>
                <div class="overFlow">
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <!-- <button class="btn btn-sm  m-1" :class="[question.answerd ? 'btn-success' : 'btn-primary']"
                                v-for="(question, index) in answerd" :key="index" @click="btnClick(index)">
                                {{ question.id + 1 }}
                            </button> -->
                            <select name="" id="" @change="changeClick">
                                <option value="0">switch to question</option>
                                <option :class="[question.answerd ? 'text-success' : 'text-black']" :value="index" v-for="(question, index) in answerd" :key="index">
                                    question number {{ question.id + 1 }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-5">
                            <button v-if="showResultBtn" class="floatRight  p-2 btn btn-sm btn-success "
                                @click="switchToResult">submit the result </button>
                            <button class="btn btn-sm btn-primary floatRight p-2" @click="next">next question <i
                                    class="fa fa-forward"></i></button>
                            <button class="btn btn-sm btn-primary floatRight p-2" @click="previouse"> <i
                                    class="fa fa-backward"></i> previouse question</button>

                        </div>
                    </div>


                </div>
            </div>

            <div class="text-center" v-else>
                <div class="p-5" v-if="(Object.keys(examStore.examError).length)">
                    <h3 class="alert alert-warning">{{examStore.examError}}</h3>
                    <router-link to="/" class="btn btn-outline-primary">back to home</router-link>
                </div>
                <h1 class="fa fa-spin" v-else>
                    <i class="fa fa-spinner text-primary"></i>
                </h1>
            </div>
        </div>
    </div>
</template>

<script setup>
import Counter2 from '../../components/counter/Counter2.vue'
import router from '../../router'
import { reactive, ref, watch } from 'vue'
import { useExamStore } from '../../stores/exam'
const examStore = useExamStore()
examStore.examStart()
let looping = ref(false)
let nextPrev = ref(0)
let selectedAns = ref(null)
let answerd = reactive([])
const showResultBtn = ref(false)
const btnClick = (index) => {
    if (answerd[index].id === index && answerd[index].selectedAnswer !== selectedAns.value) {
        selectedAns.value = answerd[index].selectedAnswer
    }
    nextPrev.value = index
}

const changeClick = (event) => {
    let index = parseInt(event.target.value)

    if (answerd[index].id === index && answerd[index].selectedAnswer !== selectedAns.value) {
        selectedAns.value = answerd[index].selectedAnswer
    }
    nextPrev.value = index
}
const next = () => {
    if (nextPrev.value !== (examStore.exam.questions.length - 1)) {
        nextPrev.value += 1
        if (answerd[nextPrev.value].id === nextPrev.value && answerd[nextPrev.value].selectedAnswer !== selectedAns.value) {
            selectedAns.value = answerd[nextPrev.value].selectedAnswer
        } else {
            selectedAns.value = null
        }
    }
    if (nextPrev.value === (examStore.exam.questions.length - 1)) {
        showResultBtn.value = true
    }
}


const previouse = () => {
    showResultBtn.value = true
    if (nextPrev.value !== 0) {
        nextPrev.value -= 1
        if (answerd[nextPrev.value].id === nextPrev.value && answerd[nextPrev.value].selectedAnswer !== selectedAns.value) {
            selectedAns.value = answerd[nextPrev.value].selectedAnswer
        } else {
            selectedAns.value = null
        }
    } else {
    }
}
const switchToResult = () => {
    const result = JSON.stringify(answerd);
    sessionStorage.setItem("result", result)
    sessionStorage.setItem("mark", examStore.exam.mark)
    router.push({ name: 'exam.result' })
}
setTimeout(() => {
    for (let index = nextPrev.value; index < examStore.exam.questions.length; index++) {
        answerd.push({ id: index, answerd: false, selectedAnswer: null, question: examStore.exam.questions[index].question })
    }
    looping.value = true
}, 1000);

watch(selectedAns, (data) => {
    if (answerd[nextPrev.value].id === nextPrev.value && (answerd[nextPrev.value].selectedAnswer === null || answerd[nextPrev.value].selectedAnswer !== null)) {
        answerd[nextPrev.value].selectedAnswer = data
        if (answerd[nextPrev.value].id === nextPrev.value && answerd[nextPrev.value].selectedAnswer !== null) {
            answerd[nextPrev.value].answerd = true
        }
    }
})
const redirectTo = () => {
    switchToResult()
}
</script>
<style scoped>
.floatRight {
    float: right;
    margin: 10px;
    padding: 3px;
    box-sizing: border-box;
}

.overFlow {
    overflow: hidden;
}

.time__box {
    float: right;
    width: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
    transform: translateY(100px);
}

.time__box p {
    padding: 0 !important;
    margin: 0 !important;
    /* width: 100%; */
    height: 50px;
    line-height: 20px;
    border-radius: 10px;

}
.hover:hover{
    cursor: pointer;
}
</style>