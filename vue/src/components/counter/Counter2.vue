<template>

    <div class="time__box">
        <p> day : {{ displayDays }} </p>
        <p>hour: {{ displayHours }}</p>
        <p>minutes: {{ displayMinutes }}</p>
        <p>seconds: {{ displaSeconds }}</p>
    </div>
</template>
<script setup>
import { ref, onMounted, computed } from 'vue';
const emit=defineEmits(['redirectTo'])
const props=defineProps({
    duration:{
        type:String,
        required:true
    }
})
let displayDays = ref(0)
let displayHours = ref(0)
let displayMinutes = ref(0)
let displaSeconds = ref(0)

let countSeconds = computed(() => {
    return 1000
})
let countMinutes = computed(() => {
    return countSeconds.value * 60
})
let countHours = computed(() => {
    return countMinutes.value * 60
})
let countDays = computed(() => {
    return countHours.value * 24
})

// alert(new Date().getFullYear());
// alert(new Date().getMonth());
// alert(new Date().getDate())

const countRemaining = () => {
    // alert(props.duration)
    let durationArray=props.duration.split(":")
    console.log(durationArray);
    const timer = setInterval(() => {
        const now = new Date()
        const end = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(),  durationArray[0],  durationArray[1], 10, 10)
        const distance = end.getTime() - now.getTime()
        // alert(distance)
        if (distance < 0) {
            clearInterval(timer)
            emit('redirectTo')
        }

        const days = Math.floor(distance / countDays.value);
        // alert(days)
        const hours = Math.floor((distance % countDays.value) / countHours.value)
        const minutes = Math.floor((distance % countHours.value) / countMinutes.value)
        const seconds = Math.floor((distance % countMinutes.value) / countSeconds.value)


        displayMinutes.value = minutes < 10 ? '0' + minutes : minutes;
        displaSeconds.value = seconds < 10 ? '0' + seconds : seconds;
        displayHours.value = hours < 10 ? '0' + hours : hours;
        displayDays.value = days < 10 ? '0' + days : days;

    }, 1000)
}
onMounted(countRemaining)
</script>