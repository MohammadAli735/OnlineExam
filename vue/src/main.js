import 'bootstrap/dist/css/bootstrap.css'
import './assets/template/css/sb-admin-2.css'
import './assets/template/vendor/fontawesome-free/css/all.min.css'
import './assets/landing.css'
import { createApp } from 'vue'
import VueCryptojs from 'vue-cryptojs'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import print from 'vue3-print-nb'

// window.sr=ScrollReveal({ duration: 4000});
// sr.reveal('.nav-item');

// sr.reveal('.site-content .d-flex');
// sr.reveal('.section-1 .card');
// sr.reveal('.section-2 .d-flex');
// sr.reveal('.section-3 .col-md-4');
// sr.reveal('.section-4 .col-md-7,.col-md-7');
// sr.reveal('footer .section-5');

  
const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueCryptojs)
app.use(print)
app.mount('#app')

import './assets/template/vendor/jquery/jquery.js'
import 'bootstrap/dist/js/bootstrap.js'
import './assets/template/vendor/jquery-easing/jquery.easing.min.js'
import './assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js'
import './assets/template/js/sb-admin-2.js'
