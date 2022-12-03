<template>
    
        <div class="bg-white shadow rounded p-2">
            <div class="table-responsive pt-5">
                <Responsive class="w-full">
                    <template #main="{ width }">
                        <Chart :size="{ width, height: 200 }" :data="data" :margin="margin" >
                            <template #layers>
                                <Line :dataKeys="['monthName', 'exam']" />
                                <LabelsLayer :dataKeys="['monthName', 'exam']" />
                            </template>
                        </Chart>
                    </template>
                </Responsive>
                <!-- <h1 class="text-primar">{{props.examReport.exam.length}}</h1> -->
            </div>
        </div>
    
</template>
<script setup lang="ts">
import {  ref } from 'vue'
import LabelsLayer from './LabelsLayer.vue'
import { Responsive, Chart, Line } from 'vue3-charts'
const props=defineProps(['examReport'])
console.log(props.examReport);
const data=props.examReport

const direction = ref('horizontal')
const margin = ref({
    left: 10,
    top: 20,
    right: 20,
    bottom: 10
})


</script>
