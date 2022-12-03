<template>

    <div class="container">
        <div class="bg-white shadow rounded p-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <button v-print="'#printMe'" class="btn btn-primary ml-2 mx-2"><i
                                    class="fa fa-print"></i></button>
                            <button class="btn btn-success" @click="syncData" v-if="activePrint">
                                <i class="fa " :class="[spin ? 'fa-spin' : '']">

                                    <i class="fa fa-sync-alt"></i>
                                </i>
                            </button>
                        </div>
                        <div class="col-md-8">

                            <select class=" form-control" id="" @change="filterByExamId" v-if="activePrint">
                                <option value="">filter by exam name</option>
                                <option value="all">all exams</option>
                                <option :value="exam.id" v-for="(exam, index) in examResult.exams" :key="exam.id">
                                    {{ exam.exam_name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <input type="text" v-model="search" placeholder="search by student name,exam,subject"
                        class="form-control">
                </div>
                <!-- <div class="col-md-8">
                    <input type="text" class="inputForm mt-2" placeholder="student name" v-model="rName">
                    <input type="text" class="inputForm mt-2" placeholder="subject" v-model="rSubject">
                    <input type="text" class="inputForm mt-2" placeholder="exam " v-model="rExamName">

                    <button @click="filterByNameSubjectExam">filter data</button>
                </div> -->
            </div>
            <hr>
            <div class="card" v-if="Object.keys(examResult.examResults).length" id="printMe">
                <div class="card-header">
                    the student exam results
                </div>

                <div class="card-body">
                    <section class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>last name</th>
                                    <th>father name</th>
                                    <th>phone</th>
                                    <th>exam</th>
                                    <th>subject</th>
                                    <th> mark</th>
                                    <th>achived</th>
                                    <th>date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(result, index) in examResult.examResults" :key="result.id">
                                    <td>
                                        {{ result.user.id }}
                                    </td>
                                    <td>
                                        {{ result.user.name }}
                                    </td>
                                    <td>
                                        {{ result.user.lastname }}
                                    </td>
                                    <td>
                                        {{ result.user.fatherName }}
                                    </td>
                                    <td>
                                        {{ result.user.phone_no }}
                                    </td>

                                    <td>
                                        {{ result.exam.exam_name }}
                                    </td>
                                    <td>
                                        {{ result.exam.subject }}
                                    </td>
                                    <td>
                                        {{ result.exam.mark }}
                                    </td>
                                    <td>
                                        {{ result.achivedMark }}
                                    </td>
                                    <td>
                                        {{ result.created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>

            </div>
            <div class="text-center" v-else>
                <h1 v-if="ifNoDataExists">no data exists</h1>
                <h1 class="fa fa-spin" v-else>
                    <span class="fa fa-spinner text-primary"></span>
                </h1>
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useExamResult } from '../../stores/examResult';
import print from 'vue3-print-nb'
const examResult = useExamResult()
let rName = ref(null)
let rSubject = ref(null)
let rExamName = ref(null)
examResult.getExamResults()
let spin = ref(false)
let activePrint = ref(true)
let search = ref(null)
const syncData = () => {
    spin.value = true
    examResult.examResults = []
    // alert( examResult.examResults.length)
    examResult.getExamResults()
    spin.value = false


}

const filterByExamId = (event) => {
    examResult.examResults = examResult.filter

    // alert("filter here")
    if (event.target.value === "all") {
        examResult.examResults = examResult.filter

    } else {

        let arr = examResult.examResults.filter((el) => {
            return el.exam.id == event.target.value
        })
        if (arr.length > 0) {
            examResult.examResults = arr

        } else {
            alert("no match found")
        }
        console.log(arr);
    }

}
const filterByNameSubjectExam = () => {
    let filteredData = examResult.examResults.filter((name, subject, exam) => {
        name.exam.name = rName.value;
        subject.exam.subject = rSubject.value;
        exam.exam.exam_name = rExamName.value;
    })
    console.log(filteredData);
}
watch(search, async (val) => {
    await examResult.getExamResults(val)
})

// 

let ifNoDataExists = ref(false)
setTimeout(() => {
    ifNoDataExists.value = true
}, 1000);
</script>
<style scoped>
.h20 {
    min-height: 33px;
    margin-left: 2px;
    margin-top: 2px;
}

.inputForm {
    border-radius: 4px;
    width: 180px;
    padding: 5px;
    /* border: #ddd; */
    margin-left: 2px;
    box-sizing: border-box;
    background-color: #fff;
}
</style>