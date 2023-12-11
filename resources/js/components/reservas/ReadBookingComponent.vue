<template>
    <div class="row">
        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Hoteles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/booking">Reservas</a>
            </li>
        </ul>
    </div>
    <h1 class="text-center mt-3"> Listas de Reservas</h1>
    <div class="row d-flex justify-content-end mt-2">
        <div class="col-4 d-flex justify-content-end">
            <router-link :to="{ name: 'booking.add' }" class="btn btn-primary">Añadir</router-link>
        </div>
    </div>

    <!-- Show datatble for booing -->
    <div class="row mt-3">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Fecha de llegada</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Valor reserva</th>
                    <th scope="col"># Noches</th>
                    <th scope="col"># Huéspedes</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <template v-for="item in bookings" :key="item.id">
                    <tr>
                        <th scope="row">{{ item.id}}</th>
                        <td>{{ item.main_guest }}</td>
                        <td>{{ item.identification_number_guest }}</td>
                        <td>{{ item.start_date_booking }}</td>
                        <td>{{ item.end_date_booking }}</td>
                        <td>{{ item.booking_price }}</td>
                        <td>{{ item.amount_night }}</td>
                        <td>{{ item.amount_people }}</td>
                        <td>{{ item.booking_status }}</td>
                        <td class="d-flex justify-content-around">
                            <router-link :to="{ name: 'booking.update', params: {id: item.id} }" class="btn btn-primary btn-sm">Editar</router-link>
                            <button class="btn btn-primary btn-sm" @click="updateStatusBooking(item.id, 'Cancelado')">Cancelar</button>
                            <button class="btn btn-primary btn-sm" v-if="item.booking_status === 'Provisional'" @click="updateStatusBooking(item.id, 'Confirmado')">Confirmar</button>
                            <button class="btn btn-primary btn-sm" v-if="item.booking_status === 'Confirmado'" @click="updateStatusBooking(item.id, 'Provisional')">Provisional</button>
                            <button class="btn btn-primary btn-sm" @click="showModal(item.id)">Ver</button>
                        </td>
                    </tr>
                    
                  </template>
                </tbody>
            </table>
        </div>
        <!-- show modal detail booking -->
        <ModalBookingDetailComponent :booking="booking"></ModalBookingDetailComponent>
    </div>
</template>

<script>

   // import useHotels from "../../composables/hotels"
    import useBookings from "../../composables/bookings"
    import ModalBookingDetailComponent from "./ModalBookingDetailComponent.vue"
    

    import { onMounted } from "vue"

    export default {
        components: {
            ModalBookingDetailComponent
        },
        setup() {

            const { booking, bookings, getBookings, getBooking, editStatusBooking } = useBookings()
            const bootstrap = require("bootstrap")

            onMounted(getBookings)
            
            const updateStatusBooking = async(id, status) => {

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "La reserva cambiará a estado " + status,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Confirmar!"
                }).then(async(result) => {
                    if(result.isConfirmed) {
                        await editStatusBooking(id, status)
                        await getBookings()
                    }
                }); 

                
            }
            
            

            const showModal = async(id) => {
                const modal = new bootstrap.Modal('#modalBookingDetail', {})
                await getBooking(id)
                console.log(booking.value)
                modal.show()
                
            }

            return {
                booking,
                bookings,
                showModal,
                updateStatusBooking,
            }
        }
    }

</script>