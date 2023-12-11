import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from "vue-router"

export default function useHotels() {

    const hotels = ref([])
    const hotel = ref([])
    const errors = ref('')
    const router = useRouter()

    const getHotels = async() => {
        let response = await axios.get('/api/hotels')
        hotels.value = response.data.data
    }

    const getHotel = async(id) => {
        let response = await axios.get('/api/hotels/' + id)
        hotel.value = response.data.data
    }

    const storeHotel = async( data ) => {
        errors.value = ''
        try {

            //call service to create hotel 
            await axios.post('/api/hotels', data)

            //show modal
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Registro Creado exitosamente!",
                showConfirmButton: false,
                timer: 2000
            });

            //redirect to index
            await router.push({name: 'hotel.index'})

        } catch(e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
        
    }

    const updateHotel = async( id ) => {
        errors.value = ''
        try {
            // service to update hotel
            await axios.put('/api/hotels/' + id, hotel.value)
            
            //show modal
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Registro Actualizado exitosamente!",
                showConfirmButton: false,
                timer: 2000
            });

            //redirect to index
            await router.push({name: 'hotel.index'})

        } catch(e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
        
    }


    const destroyHotel = async(id) => {
        await axios.delete('/api/hotels/' + id)
    }

    return {
        errors,
        hotels,
        hotel,
        getHotels,
        getHotel,
        storeHotel,
        updateHotel,
        destroyHotel
    }
}