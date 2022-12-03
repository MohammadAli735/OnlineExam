<template>
    <div class="bg">
        <div class="container  pt-5 mt-5">
            <div class="card mb-3 shadow">
                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-body">
                            <form @submit.prevent="submitLogin" id="registerForm">
                                <label for="name">name</label>
                                <input type="text" class="form-control mb-2" name="name" id="name"
                                    placeholder="enter your name">
                              
                                <label for="last_name">last_name </label>
                                <input type="text" class="form-control mb-2" name="last_name" id="last_name"
                                    placeholder="enter your last name">

                              
                                <label for="father_name">father name </label>
                                <input type="text" class="form-control mb-2" name="father_name" id="father_name"
                                    placeholder="enter your father name">

                                <label for="phone_no">phone number </label>
                                <input type="text" class="form-control mb-2" name="phone_no" id="phone_no"
                                    placeholder="enter your phone number">

                              
                                <label for="email" class="form-label mb-2">E-mail</label>
                                <input type="text" class="form-control mb-2" id="email" placeholder="Enter your e-mail"
                                    name="email">

                             

                                <button class="btn btn-outline-primary mt-3" type="submit" :disabled="submit">register
                                <span class="fa fa-spin" v-if="submit">
                                    <i class="fa fa-spinner"></i>
                                </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 hide">
                        <div class="card-body bgSlugon p-5">
                            <h1>
                                Hello, Dear Applicant!
                            </h1>
                            <p>
                                To access exam page please provide the required detalis.
                            </p>
                            <ul >
                                <li v-for="error in authStore.registerationError" class="text-warning">
                                   {{error[0]}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script setup>
import { useAuthStore } from "../../stores/auth";
import router from "../../router";
import { ref } from "vue";
const authStore = useAuthStore()
const submit=ref(false)
const submitLogin =  () => {
    submit.value=true
    let form = document.getElementById("registerForm")
    let formData = new FormData(form)
    setTimeout(async()=>{
        await authStore.register(formData)
        submit.value=false

    },500)

}

</script>
<style scoped>
.bg {
    overflow: hidden;
    background-color: rgba(226, 234, 236, 0.5);
    min-height: 100vh;
}

.bgSlugon {
    height: 100%;
    background-color: rgba(12,42,52,0.8);
    color: white;
    font-family: sans-serif;
}

.bgSlugon p {
    font-size: 18px;
}

.card-body h1 p {
    font-family: sans-serif;
    color: black;
}

@media(max-width:1000px) {
    .hide {
        display: none;
    }
}
</style>