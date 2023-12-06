import { createRouter, createWebHistory } from "vue-router";

import ReadHotelComponent from '../components/hoteles/ReadHotelComponent'
import CreateHotelComponent from '../components/hoteles/CreateHotelComponent'
import UpdateHotelComponent from '../components/hoteles/UpdateHotelComponent'
import ReadBookingComponent from '../components/reservas/ReadBookingComponent'
import CreateBookingComponent from '../components/reservas/CreateBookingComponent'
import UpdateBookingComponent from '../components/reservas/UpdateBookingComponent'


const routes = [
    {
        path: '/',
        name: 'hotel.index',
        component: ReadHotelComponent
    },
    {
        path: '/hotel/add',
        name: 'hotel.add',
        component: CreateHotelComponent
    },
    {
        path: '/hotel/:id/update',
        name: 'hotel.update',
        component: UpdateHotelComponent,
        props: true
    },
    {
        path: '/booking',
        name: 'booking.index',
        component: ReadBookingComponent
    },
    {
        path: '/booking/add',
        name: 'booking.add',
        component: CreateBookingComponent
    },
    {
        path: '/booking/:id/update',
        name: 'booking.update',
        component: UpdateBookingComponent,
        props: true
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})