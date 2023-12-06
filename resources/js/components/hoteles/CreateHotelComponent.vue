<template>
    <h1 class="text-center mt-3"> Crear Hotel</h1>
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
                    <input v-model="form.nit" type="text" name="nit" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input v-model="form.name" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input v-model="form.address" type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">País</label>
                    <input v-model="form.country" type="text" name="country" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Departamento</label>
                    <input v-model="form.state" type="text" name="state" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <input v-model="form.city" type="text" name="city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input v-model="form.phone" type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Estado</label>
                    <select v-model="form.status" class="form-select" name="status" aria-label="Default select example">
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

    import { reactive } from "vue"
    import useHotels from "../../composables/hotels"
    

    export default {

        setup() {
            
            const { storeHotel, errors } = useHotels()
           
            const form = reactive({
                "nit":"",
                "name": "",
                "address": "",
                "country": "",
                "state": "",
                "city": "",
                "phone": "",
                "status": ""
            })

            const saveHotel = async() => {
                await storeHotel({...form})
            }

            return {
                errors,
                form,
                saveHotel
            }
        }

    }
</script>