<template>
    <div>
        <div class="container">
            <div class="bg-white shadow rounded p-2">
                <div class="card">
                    <div class="card-header">questions box</div>
                    <div class="card-body" v-if="Object.keys(question.Questions).length">
                        <table class="table table-striped">
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
                                        <input type="checkbox" @click="addQuestion(question.id)">
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="100%" v-if="selectedData.length">
                                        <p class="alert alert-info mt-2">

                                          total question seleted  {{ selectedData.length }}
                                          <button class="btn btn-primary floatRight mb-2" @click="addExamQuestion">add question</button>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                         
                        </table>
                        <Pagination :data="question.links" @goForPage="goForPage"/>

                    </div>
                    <div class="text-center" v-else>
                        <h1 class="fa fa-spin ">
                            <i class="fa fa-spinner text-primary"></i>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script setup>
import { reactive } from 'vue';
import { useQuestionStore } from '../../stores/question'
import Pagination from '../paginate/Pagination.vue';
const question = useQuestionStore()
defineEmits(['goForPage'])
// question.getQuestion()
const selectedData = reactive([])
const exam_id=defineProps({
    id:{
        type:String,
        required:true
    }
})
question.addFromQuestionBox(null,exam_id.id)

const addQuestion = (questionId) => {
    let search = selectedData.findIndex((question_id) => question_id.question_id === questionId)
    if (search !== -1 && selectedData[search].id !== null) {
        selectedData.splice(search, 1)
    } else {
        selectedData.push({ "question_id": questionId })
    }
}



const addExamQuestion=async()=>{
    await question.saveExamQuestion(exam_id.id,{...selectedData})
}

const goForPage = async (link) => {
   
   if (!link.url || link.active) {
       return
   }
   await question.getQuestion(link.url)
   // alert(link)
}
</script>
<style scoped>
    .floatRight{
        float: right;
    }
</style>