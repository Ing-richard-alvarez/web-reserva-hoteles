import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from "vue-router"

export default function useBookings() {

    const bookings = ref([])
    const booking = ref([])
    const errors = ref('')
    const router = useRouter()

    const getBookings = async() => {
        let response = await axios.get('/api/bookings')
        bookings.value = response.data.booking
        console.log(bookings.value)
    }

    const getBooking = async(id) => {
        let response = await axios.get('/api/bookings/' + id)
        booking.value = response.data.booking
    }

    const storeBooking = async( data ) => {
        errors.value = ''
        try {
            await axios.post('/api/bookings', data)
            await router.push({name: 'booking.index'})
        } catch(e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
        
    }

    const updateBooking = async( id ) => {
        errors.value = ''
        try {
            await axios.put('/api/bookings/' + id, booking.value)
            await router.push({name: 'booking.index'})
        } catch(e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
        
    }

    const editStatusBooking = async( id, status ) => {
        const response = await axios.put('/api/bookings/updatestatus/' + id, {"booking_status": status})
        console.log(response)
    }


    return {
        errors,
        bookings,
        booking,
        getBookings,
        getBooking,
        storeBooking,
        updateBooking,
        editStatusBooking
    }
}