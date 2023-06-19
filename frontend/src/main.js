import { createApp } from 'vue'
import router from './routes'
import './style.css'
import './app.js'
import { SnackbarService } from "vue3-snackbar";
import "vue3-snackbar/styles";
import { createPinia } from 'pinia'
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';
import App from './App.vue'

const app = createApp(App)
const pinia = createPinia()

app.use(router)
app.use(SnackbarService)
app.use(pinia)
app.mount('#app')