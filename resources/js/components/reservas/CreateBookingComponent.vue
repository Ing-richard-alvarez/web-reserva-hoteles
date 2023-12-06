<template>
    <h1 class="text-center mt-3">Crear Reserva</h1>
    <div class="row mt-3">
        <div class="col-12 col-md-8">
            <form @submit.prevent="saveBooking">
                <div class="form-group">
                    <label for="">Hotel</label>
                    <select class="form-select" v-model="form.hotel_id" name="hotel_id">
                        <option v-for="hotel in hotels" :value="hotel.id">{{hotel.name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nombre del cliente</label>
                    <input type="text" class="form-control" v-model="form.main_guest" name="main_guest" >
                </div>
                <div class="form-group">
                    <label for="">Identificación del cliente</label>
                    <input type="text" class="form-control" v-model="form.identification_number_guest" name="identification_number_guest" >
                </div>
                <div class="form-group">
                    <label for="">Cantidad de personas</label>
                    <input type="number" class="form-control" v-model="form.amount_people" name="amount_people" min="1">
                </div>
                <div class="form-group">
                    <label for="">Cantidad de noches</label>
                    <input type="number" class="form-control" v-model="form.amount_night" name="amount_night" min="1">
                </div>
                <div class="form-group">
                    <label for="">Fecha de llegada</label>
                    <input type="date" class="form-control" v-model="form.start_date_booking" name="start_date_booking" :min="datenow">
                </div>
                <div class="form-group">
                    <label for="">Fecha de salida</label>
                    <input type="date" class="form-control" v-model="form.end_date_booking" name="end_date_booking" :min="datenow">
                </div>
                <div class="form-group">
                    <label for="">Valor de la reserva</label>
                    <input type="number" class="form-control" v-model="form.booking_price" name="booking_price" min="0">
                </div>
                <div class="form-group">
                    <label for="">Estado de la reserva</label>
                    <select class="form-select" v-model="form.booking_status" name="booking_status">
                        <option value="Provisional">Provisional</option>
                        <option value="Confirmado">Confirmar</option>
                        <option value="Cancelado">Cancelar</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import useHotels from "../../composables/hotels";
    import useBookings from "../../composables/bookings";
    import { onMounted, reactive } from "vue"

    export default {

        setup() {
            
            const { hotels, getHotels } = useHotels()
            const { errors, storeBooking } = useBookings()

            let datenow = new Date()
            datenow = datenow.getFullYear() + "-" + (datenow.getMonth() + 1) + "-" + datenow.getDay() 
           console.log(datenow)

            const form = reactive({
                "hotel_id": "",
                "main_guest": "",
                "identification_number_guest": "",
                "amount_people": "",
                "amount_night": "",
                "start_date_booking": "",
                "end_date_booking": "",
                "booking_price": "",
                "booking_status": ""
            })

            onMounted(getHotels)

            const saveBooking = async() => {
                await storeBooking({...form})
            }

            return {
                errors,
                form,
                hotels,
                datenow,
                saveBooking
            }
        }
    }
</script>