<template>

  <RouterView />
</template>

<script setup>
import { RouterLink, RouterView } from 'vue-router'
import TheHeader from './components/partials/TheHeader.vue'
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}
</script>