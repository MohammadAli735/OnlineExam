<template>
    <nav class="navbar navbar-expand-lg navBg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"> Oline Exam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link active text-white" aria-current="page" >Home</router-link>
                    </li>
                  
                    <li class="nav-item">
                        <router-link :to="{name:'Login'}" class="nav-link text-white">login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'Register'}" class="nav-link text-white" >register</router-link>
                    </li>
                
                </ul>
            </div>
        </div>
    </nav>
    <router-view></router-view>

    <footer class="navBg h100 text-center">
        <h2> Online Exam</h2>
        <p>developed year 2022</p>
    </footer>
</template>
<style>
    .navBg{
        background-color: rgba(52, 149, 240, 0.9);
        color: white;
    }
    .h100{
        height: 100px;
        padding:20px;
        box-sizing: border-box;
    }
</style>