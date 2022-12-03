<template>
    <div class="container">
        <div class="bg-white shadow rounded p-2">
            <div class="table-responsive" v-if="Object.keys(examStore.exams).length">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>exam_name</th>
                            <th>subject</th>
                            <th>duration</th>
                            <th>question_no</th>
                            <th>mark</th>
                            <th>room_no</th>
                            <th>state</th>
                            <th>info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="exam in examStore.exams" :key="exam.id">
                            <td>{{ exam.id }}</td>
                            <td>{{ exam.exam_name }}</td>
                            <td>{{ exam.subject }}</td>
                            <td>{{ exam.duration }}</td>
                            <td>{{ exam.question_no }}</td>
                            <td>{{ exam.mark }}</td>
                            <td>{{ exam.room_no }}</td>
                            <td>
                                <button ref="info" class="btn btn-sm " @click="active(exam.id)"
                                    :class="[exam.state == 0 ? 'btn-warning' : 'btn-primary']">

                                    <span v-text="examactive" v-if="exam.state == 1"> </span>
                                    <span v-text="examdeactive" v-else> </span>
                                    <span class="fa mx-1 " :class="[exam.state == 0 ? 'fa-times' : 'fa-check']"></span>
                                </button>
                            </td>
                            <td>
                                <router-link :to="{ name: 'exam.show', params: { id: exam.id } }"
                                    class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :data="examStore.links"  @goForPage="goForPage" />
            </div>
            <div class="text-center" v-else>
                <h1 class="fa fa-spin ">
                    <i class="fa fa-spinner text-primary"></i>
                </h1>
            </div>
        </div>
    </div>
</template>

<script setup>

import { useExamStore } from '../../stores/exam';
import { Tooltip } from 'bootstrap/dist/js/bootstrap.esm'
import Pagination from '../paginate/Pagination.vue';
const examStore = useExamStore()
const examactive = "acitve"
const examdeactive = "deacitve"
const changeLink = () => {
    alert('changeLink')
}
examStore.getExam()
setTimeout(() => {
    // examStore.exam.push({"lata":"i love vue"})
}, 1000);
const active = async (id) => {
    await examStore.active(id)
}


const goForPage = async (link) => {
   
    if (!link.url || link.active) {
        return
    }
    await examStore.getExam(link.url)
    // alert(link)
}
</script>