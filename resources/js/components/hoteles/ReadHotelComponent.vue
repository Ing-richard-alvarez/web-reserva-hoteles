<template>
    <div class="row">
        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/hotels">Hoteles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/booking">Reservas</a>
            </li>
        </ul>
    </div>
    <h1 class="text-center mt-3"> Listas de Hoteles</h1>
    <div class="row d-flex justify-content-end mt-2">
        <div class="col-4 d-flex justify-content-end">
            <router-link :to="{ name: 'hotel.add' }" class="btn btn-primary">Añadir</router-link>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Telefono</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <template v-for="item in hotels" :key="item.id">
                    <tr>
                        <th scope="row">{{ item.id}}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.address }}</td>
                        <td>{{ item.country }}</td>
                        <td>{{ item.state }}</td>
                        <td>{{ item.city }}</td>
                        <td>{{ item.nit }}</td>
                        <td>{{ item.phone }}</td>
                        <td class="d-flex justify-content-around">
                            <button class="btn btn-sm btn-danger" @click="deleteHotels(item.id)">Eliminar</button>
                            <router-link :to="{ name: 'hotel.update', params: {id: item.id} }" class="btn btn-primary btn-sm">Editar</router-link>
                            <button class="btn btn-sm btn-primary ml-1" @click="deleteHotels(item.id)">Ver detalle</button>
                        </td>
                    </tr>
                    
                  </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import useHotels from "../../composables/hotels";
    import { onMounted } from "vue"

    export default {

        setup() {

            const { hotels, getHotels, destroyHotel } = useHotels()

            onMounted(getHotels)

            const deleteHotels = async (id) => {
                if(!window.confirm("Estas seguro?")){
                    return 
                }

                await destroyHotel(id)
                await getHotels()
            }

            return {
                hotels,
                deleteHotels
            }
        }
    }
</script>