<template>
    <div class="bg">
        <div class="container  pt-5">
            <div class="card mb-3 mt-5 shadow">
                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-body">
                            <form @submit.prevent="submitLogin" id="loginForm">

                                <label for="email" class="form-label mb-2">E-mail</label>
                                <input type="text" class="form-control mb-2" id="email" placeholder="Enter your e-mail" name="email">

                                <label for="password" class="form-label mt-2">Password</label>
                                <input type="text" class="form-control mt-2" id="password"
                                    placeholder="Enter your password" name="password">
                                <button class="btn btn-outline-primary mt-3" type="submit">login to system</button>
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
    const authStore=useAuthStore()
    const submitLogin=async()=>{
        let form=document.getElementById("loginForm")
        let formData=new FormData(form)
        await authStore.login(formData)
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
    background-color: rgb(247, 54, 54);
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