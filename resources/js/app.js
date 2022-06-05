import { createApp } from 'vue'
import App from './App.vue'

import axios from 'axios';
import router from './routes'; 
import 'bootstrap/dist/css/bootstrap.min.css';
const app = createApp(App).use(router)
app.config.globalProperties.axios=axios 

app.mount('#app') 