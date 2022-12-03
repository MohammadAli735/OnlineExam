<template>
    <div>
        <div class="container">
            <div class="bg-white shadow rounded p-2"  v-if="Object.keys(question.Questions).length">
                <div class="card">
                    <div class="card-header">
                        <p>
                            <b>question lists</b>
                        </p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>question</th>
                                    <th>ans1</th>
                                    <th>ans2</th>
                                    <th>ans3</th>
                                    <th>ans4</th>
                                    <th>actions</th>
                                </tr>
        
                            </thead>
                            <tbody>
                                <tr v-for="question in question.Questions" :key="question.id">
                                    <td>
                                        {{ question.id }}
                                    </td>
                                    <td>
                                        {{ question.question }}
                                    </td>
                                    <td>
                                        {{ question.ans1 }}
                                    </td>
                                    <td>
        
                                        {{ question.ans2 }}
        
                                    </td>
                                    <td>
                                        {{ question.ans3 }}
                                    </td>
                                    <td>
        
                                        {{ question.ans4 }}
                                    </td>
                                 
        
                                    <td>
                                        <router-link :to="{name:'question.edit',params:{id:question.id}}"  class="btn btn-sm btn-outline-success">
                                            <i class="fa fa-edit"></i>
                                        </router-link>
                                    </td>
        
                                </tr>
                            </tbody>
                           
                        </table>
                        <Pagination :data="question.links" @goForPage="goForPage"/>
                    </div>
                </div>
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
import { useQuestionStore } from '../../stores/question'
import Pagination from '../paginate/Pagination.vue';
const question = useQuestionStore()
question.getQuestion()

const goForPage = async (link) => {
    // alert(exam_id.id)
    if (!link.url || link.active) {
        return
    }
    // question.Questions=[]
    await question.getQuestion(link.url)
}
</script>