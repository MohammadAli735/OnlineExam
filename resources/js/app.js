import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Home from './components/Home.vue'
import router from './router/index'
createApp({
    components:{
        Home
    }
}).use(router).mount("#app")