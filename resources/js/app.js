import './bootstrap';
import { createApp } from 'vue';
import Antd from 'ant-design-vue';
import { createPinia } from 'pinia'

import App from './App.vue';
import router from './router/index.js';
import "bootstrap/dist/css/bootstrap.css"
import 'ant-design-vue/dist/antd.css';
const app = createApp(App);
const pinia = createPinia()
app.use(router)
app.use(Antd);
app.use(pinia)
app.mount("#app")