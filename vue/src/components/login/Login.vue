<template>
    <div class="bg">
        <div class="container  pt-5">
            <div class="card mb-3 mt-5 shadow">
                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-body">
                            <form @submit.prevent="submitLogin" id="loginForm">

<!-- {{authStore.error.email}} -->
                                <label for="email" class="form-label mb-2">E-mail</label>
                                <input type="text" class="form-control mb-2" id="email" placeholder="Enter your e-mail"
                                    name="email">

                                <p class="text-danger" v-if="authStore.error.email">{{authStore.error.email[0]}}</p>
                                <p class="text-danger" v-if="authStore.credential">{{authStore.credential}}</p>
                                <label for="password" class="form-label mt-2">Password</label>
                                <input type="password" class="form-control mt-2" id="password"
                                    placeholder="Enter your password" name="password">
                                <p class="text-danger" v-if="authStore.error.password">{{authStore.error.password[0]}}</p>

                                <button class="btn btn-outline-primary mt-3" type="submit" :disabled="submit">login to system

                                    <span v-if="submit" class="fa fa-spin">
                                        <i class="fa fa-spinner"></i>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 hide">
                        <div class="card-body bgSlugon p-5">
                            <h1>
                                Hello, Dear Admin!
                            </h1>
                            <p>
                                To initait the system please enter the required detaits.
                            </p>
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
const submit = ref(false)
const submitLogin =  () => {
    let form = document.getElementById("loginForm")
    let formData = new FormData(form)
    submit.value = true
    setTimeout(async() => {
        await authStore.login(formData)
        submit.value = false

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