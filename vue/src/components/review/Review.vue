<template>
    <div class="container mb-5">
        <div class="bg-white shadow rounded p-2">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-end">
                        <div class="col-md-6">

                            <h2>review section </h2>
                        </div>
                        <div class="col-md-6">

                            <a href="/" @click="exitSystem" class="fr btn btn-success">save your result and exit the
                                system</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class=" my-2" v-if="Object.keys(reviewStore.QAS).length">

                        <li class="" v-for="(question, index) in reviewStore.QAS" :key="index">
                            <p>question number {{ index + 1 }}</p>
                            {{ question.question }}
                            <ul class=" mx-5 my-2">
                                <li class="" v-if="question.ans1 === question.correct_ans">
                                    <p v-if="ansedViaStudent[index] !== null">
                                        <i class="fa fa-check text-success"></i> {{ question.ans1 }}
                                    </p>
                                    <p v-else>
                                        no answer was selected
                                    </p>

                                </li>
                                <li v-else>
                                <li class="" v-if="question.ans1 === ansedViaStudent[index]">
                                    <i class="fa fa-times text-danger"></i> {{ question.ans1 }}
                                </li>
                                <li v-else class="">
                                    {{ question.ans1 }}

                                </li>
                        </li>

                        <li class="" v-if="question.ans2 === question.correct_ans">
                        <li class="">
                            <p v-if="ansedViaStudent[index] !== null">
                                <i class="fa fa-check text-success"></i> {{ question.ans2 }}
                            </p>
                            <p v-else>
                                no answer was selected
                            </p>
                        </li>
                        </li>
                        <li v-else>
                        <li class="" v-if="question.ans2 === ansedViaStudent[index]">
                            <i class="fa fa-times text-danger"></i> {{ question.ans2 }}
                        </li>
                        <li v-else class="">
                            {{ question.ans2 }}

                        </li>
                        </li>

                        <li class="" v-if="question.ans3 === question.correct_ans">

                        <li class="">
                            <p v-if="ansedViaStudent[index] !== null">
                                <i class="fa fa-check text-success"></i> {{ question.ans3 }}
                            </p>
                            <p v-else>
                                no answer was selected
                            </p>
                        </li>
                        </li>
                        <li v-else>
                        <li class="" v-if="question.ans3 === ansedViaStudent[index]">
                            <i class="fa fa-times text-danger"></i>{{ question.ans3 }}
                        </li>
                        <li v-else class="">
                            {{ question.ans3 }}

                        </li>
                        </li>

                        <li class="" v-if="question.ans4 === question.correct_ans">
                        <li class="">
                            <p v-if="ansedViaStudent[index] !== null">
                                <i class="fa fa-check text-success"></i> {{ question.ans4 }}
                            </p>
                            <p v-else>
                                no answer was selected
                            </p>
                        </li>
                        </li>
                        <li v-else>
                        <li class="" v-if="question.ans4 === ansedViaStudent[index]">
                            <i class="fa fa-times text-danger"></i> {{ question.ans4 }}
                        </li>
                        <li v-else class="">
                            {{ question.ans4 }}
                        </li>
                        </li>
                    </ul>
                    </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import router from '../../router';
import { useAuthStore } from '../../stores/auth';
import { useReviewStore } from '../../stores/review'
const result = JSON.parse(sessionStorage.getItem("result"))
const ansedViaStudent = JSON.parse(sessionStorage.getItem("processed"))
const reviewStore = useReviewStore()
const authStore = useAuthStore()
reviewStore.getQAS()
const exitSystem = () => {
    sessionStorage.removeItem("TOKEN")
    const authStore = useAuthStore()
    authStore.token = null
    router.push('/')
}
</script>
<style scoped>
.fr {
    float: right;
}
</style>