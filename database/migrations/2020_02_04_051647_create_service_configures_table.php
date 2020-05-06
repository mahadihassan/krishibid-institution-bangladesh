<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceConfiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_configures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('service_types_id');
            $table->tinyInteger('services_id');
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->tinyInteger('duration')->nullable();
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
        Schema::dropIfExists('service_configures');
    }
}
