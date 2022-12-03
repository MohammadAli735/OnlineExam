<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script setup>
    import {studentRequest} from '../../stores/studentRequest'
    const studentRequestStore=studentRequest()
    studentRequestStore.fetchRequest()
</script>