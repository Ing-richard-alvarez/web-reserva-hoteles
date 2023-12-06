require('./bootstrap')

import { createApp } from 'vue'
import router from './router'

import ReadHotelComponent from './components/hoteles/ReadHotelComponent'

createApp({
    components: {
        ReadHotelComponent
    }
}).use(router).mount("#app")