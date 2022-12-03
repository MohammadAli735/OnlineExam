<template>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
        </div>

        <!-- Content Row -->
        <div class="row" v-if="Object.keys(reportStore.generalReport).length">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ reportStore.generalReport.totalStudent }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Exam</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ reportStore.generalReport.totalExam }}</div>

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Questions

                                </div>
                                {{ reportStore.generalReport.totalQuestion }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12" v-if="show">

                <Chart :examReport="plByMonth" />
            </div>

        </div>
        <div v-else>
            <h1 class="fa fa-spin">
                <i class="fa fa-spinner"></i>
            </h1>
        </div>



    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useReportStore } from '../../stores/report'
import Chart from '../chart/Chart.vue';
const reportStore = useReportStore()
const year = new Date().getFullYear()
// alert(year)

let showChart = ref(false);

const plByMonth = [
    { monthName: 'January', exam: '' },
    { monthName: 'February', exam: '' },
    { monthName: 'March', exam: '' },
    { monthName: 'April', exam: '' },
    { monthName: 'May', exam: '' },
    { monthName: 'June', exam: '' },
    { monthName: 'July', exam: '' },
    { monthName: 'August', exam: '' },
    { monthName: 'September', exam: '' },
    { monthName: 'October', exam: '' },
    { monthName: 'November', exam: '' },
    { monthName: 'December', exam: '' },
]
// console.log("chart befor " + plByMonth);
let data = reactive([])
let result = reactive([])
let show = ref(false)

reportStore.getGeneralReport()
const populateChar = () => {
    setTimeout(() => {
        reportStore.getExamReportByOfThisYear(new Date().getFullYear())
    }, 500);

    setTimeout(() => {
        data = reportStore.examReportByOfThisYear
        // alert(data.length)
        // alert(data[0].month)
        if (Object.keys(reportStore.examReportByOfThisYear).length > 0) {
            // alert(data.length)
            // let i=0
            for (let index = 0; index < plByMonth.length; index++) {
                // i++
                if (index < data.length) {

                    let search = plByMonth.findIndex((monthName) => monthName.monthName === data[index].month)

                    plByMonth[search].exam = data[index].totalExam
                    // alert(data[i].month)
                }
            }
            show.value = true

        

        }
    }, 1000);


}
populateChar()
const reportByear = async (event) => {
    reportStore.examReportByOfThisYear=[]
    // reportStore.years=[]
    show.value=false
    alert(event.target.value)
    await reportStore.getExamReportByOfThisYear(event.target.value)

    populateChar()

}

</script>