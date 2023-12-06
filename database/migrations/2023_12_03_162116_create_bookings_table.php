<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Hotel;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Hotel::class);
            $table->string("main_guest");
            $table->string("identification_number_guest");
            $table->integer("amount_people");
            $table->integer("amount_night");
            $table->date("start_date_booking");
            $table->date("end_date_booking");
            $table->integer("booking_price");
            $table->string("booking_status")->default("Provisional");
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
