import { createApp } from 'vue'
import App from './App.vue'
import router from './route'; 
import store from './store';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

const app = createApp(App);
app.use(router); // Si estás utilizando Vue Router
app.use(store);
app.use(Toast);
app.mount('#app');