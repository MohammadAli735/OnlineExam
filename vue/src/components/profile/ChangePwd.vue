<template>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-white shadow rounded ">
                    <h1>update password section</h1>
                    <form @submit.prevent="update" id="updateForm" class="m-3">
                        <label for="name">old password</label>
                        <input type="password" class="form-control mb-2" name="oldpwd"
                            placeholder="enter your old password">
                        <label for="password">enter your new password</label>
                        <input type="password" class="form-control mb-2" name="password"
                             placeholder="enter your new password">
                        <label for="password_confirmation">confirm password</label>
                        <input type="password" class="form-control mb-2" name="password_confirmation"
                            placeholder="confirm your password">
                        <button type="submit" class="btn btn-outline-primary mt-4">update password</button>
                    </form>
                </div>
            </div>
        </div>
    
</template>

<script setup>

import { ref } from 'vue'
import { useProfileStore } from '../../stores/profile'
const profileStore = useProfileStore()
profileStore.getProfile()


const update = async () => {

    let form = document.getElementById("updateForm")
    let formData = new FormData(form)
    formData.append("_method", "PUT")

    await profileStore.chnagePwd(formData);
}
</script>