<template>
    <div class="container">
        <div class="bg-white shadow rounded p-2">

            <div class="row jusfity-content-center">
                <div class="row" v-if="Object.keys(profileStore.profile).length">
                    <div class="col-md-6">

                        <div class="card">
                            <div v-if="(profileStore.profile[0].image || fileSelected !== null)">
                                <img class="card-img"
                                    :src="fileSelected !== null ? fileSelected : profileStore.profile[0].image" alt="">

                            </div>
                            <img class="card-img" src="../../assets/admin.jpeg" v-else>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form @submit.prevent="update" id="updateForm">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="name">name</label>
                                    <input type="text" class="form-control mb-2" name="name"
                                        :value="profileStore.profile[0].name">

                                    <p class="text-danger" v-if="profileStore.error.name">
                                        {{ profileStore.error.name[0] }}
                                    </p>

                                </div>
                                <div class="col-md-6">

                                    <label for="lastname">last name</label>
                                    <input type="text" class="form-control mb-2" name="last_name"
                                        :value="profileStore.profile[0].lastname">
                                    <p class="text-danger" v-if="profileStore.error.lastname">
                                        {{ profileStore.error.lastname[0] }}
                                    </p>
                                </div>
                                <div class="col-md-6">

                                    <label for="phone_no">phone number</label>
                                    <input type="text" class="form-control mb-2" name="phone_no"
                                        :value="profileStore.profile[0].phone_no">

                                    <p class="text-danger" v-if="profileStore.error.phone_no">
                                        {{ profileStore.error.phone_no[0] }}
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <label for="father_name">father name</label>
                                    <input type="text" class="form-control mb-2" name="father_name"
                                        :value="profileStore.profile[0].fatherName">
                                    <p class="text-danger" v-if="profileStore.error.fatherName">
                                        {{ profileStore.error.fatherName[0] }}
                                    </p>
                                </div>
                            </div>
                            <label for="email">email</label>
                            <input type="text" class="form-control mb-2" name="email"
                                :value="profileStore.profile[0].email">

                            <p class="text-danger" v-if="profileStore.error.email">
                                {{ profileStore.error.email[0] }}
                            </p>

                            <label for="">change profile</label>
                            <input type="file" @change="selectPhoto" id="" class="form-control">

                            
                            <p class="text-danger" v-if="profileStore.error.image">
                                {{ profileStore.error.image[0] }}
                            </p>
                            <button type="submit" class="btn btn-outline-primary mt-4">update information</button>
                        </form>
                    </div>
                </div>
                <div class="text-center" v-else>
                    <h1 class="fa fa-spin">
                        <i class="fa fa-spinner text-primary text-lager"></i>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue'
import { useProfileStore } from '../../stores/profile'
const profileStore = useProfileStore()
profileStore.getProfile()

let imageSelected = ref(0)
let image = ref(null)
let fileSelected = ref(null)
const selectPhoto = (event) => {
    const file = event.target.files[0]
    image.value = file
    const fileReader = new FileReader()
    fileReader.onloadend = () => {
        fileSelected.value = fileReader.result
    }
    fileReader.readAsDataURL(file)
}

const update = async () => {
    let form = document.getElementById("updateForm")
    let formData = new FormData(form)
    formData.append("_method", "PUT")
    if (image.value !== null) {
        formData.append("image", image.value)
    }
    await profileStore.updateProfile(formData)
}
</script>