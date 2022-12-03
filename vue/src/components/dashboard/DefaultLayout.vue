<template>
    <div id="wrapper" :class="[role == 0 ? 'h100 ' : '']">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
            v-if="Object.keys(authStore.user).length && role == 1">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-list"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KEU Online </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <router-link :to="{ name: 'Dashboard' }" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></router-link>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- <li class="nav-item">
                <router-link :to="{name:'StudentRequest'}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Student Requests</span>
                </router-link>
            </li> -->


            <li class="nav-item">
                <router-link :to="{ name: 'exam.result.index' }" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Student Results</span>
                </router-link>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>exam</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <router-link :to="{ name: 'exam.create' }" class="collapse-item">create exam</router-link>
                        <router-link :to="{ name: 'exam.index' }" class="collapse-item">exams</router-link>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <router-link :to="{ name: 'question.index' }" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Question's Banck</span>
                </router-link>
            </li>

            <!-- <li class="nav-item" >
                <router-link :to="{name:'exam.start'}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Start Exam</span>
                </router-link>
            </li> -->

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../../assets/template/img/undraw_rocket.svg" alt="...">

            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" :class="[role == 0 ? 'pt-5' : '']">

            <!-- Main Content -->
            <div id="content" v-if="Object.keys(authStore.user).length">

                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" v-if="role == 1">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <ul class="navbar-nav ml-auto">

                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mx-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="../../assets/template/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <router-link :to="{ name: 'profile' }" class="dropdown-item">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </router-link>
                                <router-link :to="{name:'password.change'}" class="dropdown-item" >
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    change password
                                </router-link>

                                <div class="dropdown-divider"></div>
                                <a @click="logOut" class="dropdown-item" href="#">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <router-view></router-view>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</template>

<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../../stores/auth';
const authStore = useAuthStore()
const authUser = JSON.parse(sessionStorage.getItem("user"))
const role = authUser.role
const model = ref(false);
const logOut = async () => {
    if (confirm("are you sure you want to log out from system")) {

        await authStore.logOutUser(authUser.id);
        model.value = true
    }
}
</script>
<style>
.h100 {
    min-height: 100vh;
}

.hideModel {
    display: none;
}
</style>