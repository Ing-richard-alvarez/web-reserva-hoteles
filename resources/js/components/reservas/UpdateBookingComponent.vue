<template>
    <div class="row mt-3">
        <div class="col-12 col-md-8">
            <form @submit.prevent="saveBooking">
                <div class="form-group">
                    <label for="">Hotel</label>
                    <input type="text" class="form-control" v-model="booking.hotel_id" name="hotel_id" readonly >
                </div>
                <div class="form-group">
                    <label for="">Nombre del cliente</label>
                    <input type="text" class="form-control" v-model="booking.main_guest" name="main_guest" >
                </div>
                <div class="form-group">
                    <label for="">Identificación del cliente</label>
                    <input type="text" class="form-control" v-model="booking.identification_number_guest" name="identification_number_guest">
                </div>
                <div class="form-group">
                    <label for="">Cantidad de personas</label>
                    <input type="number" class="form-control" v-model="booking.amount_people" name="amount_people" min="1">
                </div>
                <div class="form-group">
                    <label for="">Cantidad de noches</label>
                    <input type="number" class="form-control" v-model="booking.amount_night" name="amount_night" min="1">
                </div>
                <div class="form-group">
                    <label for="">Fecha de llegada</label>
                    <input type="date" class="form-control" v-model="booking.start_date_booking" name="start_date_booking">
                </div>
                <div class="form-group">
                    <label for="">Fecha de salida</label>
                    <input type="date" class="form-control" v-model="booking.end_date_booking" name="end_date_booking" >
                </div>
                <div class="form-group">
                    <label for="">Valor de la reserva</label>
                    <input type="number" class="form-control" v-model="booking.booking_price" name="booking_price" min="0">
                </div>
                <div class="form-group">
                    <label for="">Estado de la reserva</label>
                    <select class="form-select" v-model="booking.booking_status" name="booking_status">
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

    import useHotels from "../../composables/hotels"
    import useBookings from "../../composables/bookings"
    import { onMounted } from "vue"
    
    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },
        setup(props) {

            const {  getHotel } = useHotels()
            const {errors, booking, getBooking, updateBooking } = useBookings()

            onMounted(getBooking(props.id))

            const saveBooking = async() => {
                await updateBooking(props.id)
            }

            return {
                errors,
                booking,
                saveBooking
            }
        }
    }
</script>