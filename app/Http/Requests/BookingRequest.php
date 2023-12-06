<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "hotel_id" => "required",
            "main_guest" => "required",
            "identification_number_guest" => "required",
            "amount_people" => "required",
            "amount_night" => "required",
            "start_date_booking" => "required",
            "end_date_booking" => "required",
            "booking_price" => "required",
            "booking_status" => "required",
        ];
    }
}
