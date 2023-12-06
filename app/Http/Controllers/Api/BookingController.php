<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::where('booking_status', 'Provisional')
        ->orWhere('booking_status', 'Confirmado')
        ->orWhere('booking_status', 'Cancelado')
        ->with(['hotel:id,name'])
        ->get();

        return response()->json([
            "booking" => $booking
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $booking = Booking::create($request->validated());
        return response()->json([
            "is_success" => $request->validated(),
            "booking" => $booking
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return response()->json([
            "booking" => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->update($request->validated());
        return response()->json([
            "is_success" => $request->validated(),
            "booking" => $booking
        ]);
    }

    /**
     * Update status of booking specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id) 
    {
        $affected = DB::table('bookings')
            ->where('id', $id)
            ->update(['booking_status' => $request->input('booking_status')]);

        return response()->json([
            "success" => true,
            "id" => $id,
            "request" => $request->input('hotel_id')
        ]);

    }

    public function filtersBooking($search = null, $fecha = null)
    {
        return response()->json([
            "search" => $search,
            "fecha" => $fecha
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        
    }
}
