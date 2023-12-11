require('./bootstrap')

import { createApp } from 'vue'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import ReadHotelComponent from './components/hoteles/ReadHotelComponent'

const app = createApp({ components: {
    ReadHotelComponent
}})

app.use(VueSweetalert2)
window.Swal =  app.config.globalProperties.$swal;
app.use(router)
app.mount("#app")