<template>
    <h1 class="text-center mt-3"> Editar Hotel</h1>
    <div class="row mt-3">
        <div class="col-12 col-md-8">
            <form @submit.prevent="saveHotel">
                <div v-if="errors" class="mb-2">
                    <div v-for="(v,k) in errors" :key="k">
                        <p class=" text-danger" v-for="error in v" :key="error">
                            {{ error }}
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">NIT</label>
                    <input v-model="hotel.nit" type="text" name="nit" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input v-model="hotel.name" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input v-model="hotel.address" type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">País</label>
                    <input v-model="hotel.country" type="text" name="country" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Departamento</label>
                    <input v-model="hotel.state" type="text" name="state" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <input v-model="hotel.city" type="text" name="city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input v-model="hotel.phone" type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Estado</label>
                    <select v-model="hotel.status" class="form-select" name="status" aria-label="Default select example">
                        <option value="Activo" selected>Activo</option>
                        <option value="Inactivo">Inactivo</option>
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
    import { onMounted } from "vue"

    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },
        setup(props) {

            const {errors, hotel, getHotel, updateHotel } = useHotels()

            onMounted(getHotel(props.id))

            const saveHotel = async() => {
                await updateHotel(props.id)
            }

            return {
                errors,
                hotel,
                saveHotel
            }
        }
    }
</script>