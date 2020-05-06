<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('users_id');
            $table->tinyInteger('service_types_id');
            $table->tinyInteger('services_id');
            $table->tinyInteger('service_configures_id');
            $table->tinyInteger('events_id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->tinyInteger('room')->nullable();
            $table->string('kib_number')->nullable();
            $table->integer('guest_number');
            $table->double('service_cost');
            $table->double('service_tax');
            $table->double('car_parking')->nullable();
            $table->double('car_tax')->nullable();
            $table->double('discount')->nullable()->default(0);
            $table->double('total_cost');
            $table->text('notes')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
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
        Schema::dropIfExists('service_bookings');
    }
}
