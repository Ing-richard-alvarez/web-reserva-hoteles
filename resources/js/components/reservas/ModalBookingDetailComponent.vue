<template>
    <div class="modal fade" id="modalBookingDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de la reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <p class="fw-semibold d-inline">Cliente</p> <p class="d-inline">{{ booking.main_guest }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-semibold d-inline">Identificación</p> <p class="d-inline">{{ booking.identification_number_guest }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-semibold d-inline">Fecha de llegada</p> <p class="d-inline">{{ booking.start_date_booking }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-semibold d-inline">Fecha de salida</p> <p class="d-inline">{{ booking.end_date_booking }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-semibold d-inline">Valor de la reserva</p> <p class="d-inline">{{ booking.booking_price }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-semibold d-inline"># Noches</p> <p class="d-inline">{{ booking.amount_night }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="fw-semibold d-inline"># Huesped</p> <p class="d-inline">{{ booking.amount_people }}</p>
                        </div>
                        <div class="col-4">
                            <p class="fw-semibold d-inline">Estado</p> <p class="d-inline">{{ booking.booking_status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { reactive, onMounted } from 'vue'
    

    export default {
        props: {
            booking: {
                required: true,
                type: Object
            }
        },
        setup(props) {

            const booking = props.booking
            onMounted(booking)

            return {
               
            }
        }
    }
</script>