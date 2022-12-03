<template>
    <div class="container mb-5">
        <div class="bg-white shadow rounded p-2">
            <div v-if="Object.keys(examStore.exam).length">
                <div class="card">
                    <div class="card-header ">
                        <span>
                            exam information
                        </span>
                        <router-link :to="{name:'addQuestion.questionBox',params:{id:examStore.exam.id}}" class="btn btn-outline-primary floatright">add question from question box</router-link>
                    </div>
                    <div class="card-body">
    
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>exam_name</th>
                                        <th>subject</th>
                                        <th>instructor_name</th>
                                        <th>co_instructor_name</th>
                                        <th>credits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ examStore.exam.id}}</td>
                                        <td>{{ examStore.exam.exam_name}}</td>
                                        <td>{{ examStore.exam.subject}}</td>
                                        <td>{{ examStore.exam.instructor_name}}</td>
                                        <td>{{ examStore.exam.co_instructor_name}}</td>
                                        <td>{{ examStore.exam.credits}}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">question information</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>question</th>
                                        <th>first answer</th>
                                        <th>second answer</th>
                                        <th>thrid answer</th>
                                        <th>fourth answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(question,index) in examStore.exam.questions" :key="index">
                                        <td>{{question.id}}</td>
                                        <td>{{question.question}}</td>
                                        <td>{{question.ans1}}</td>
                                        <td>{{question.ans2}}</td>
                                        <td>{{question.ans3}}</td>
                                        <td>{{question.ans4}}</td>
                                    </tr>
                                    <tr >
                                        <td colspan="100%" class="bg-info">
                                            <b class="floatright">
                                                total questions {{examStore.exam.questions.length}}
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            
            <div v-else  class="text-center">
                <h1 class="fa fa-spin">
                    <i class="fa fa-spinner text-primary"></i>
                </h1>
            </div>
        </div>
    </div>
</template>
<script setup>
    import { useExamStore } from '../../stores/exam';

    const props=defineProps({
        id:{
            type:String,
            required:true
        }
    })


    const examStore=useExamStore()
    examStore.show(props.id)


</script>
<style scoped> 
    .floatright{
        float: right;
    }
</style>