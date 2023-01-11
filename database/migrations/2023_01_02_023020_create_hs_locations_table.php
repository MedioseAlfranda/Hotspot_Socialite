<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_locations', function (Blueprint $table) {
            $table->id('location_id');
            $table->string('location_name')->nullable();
            $table->string('server_address')->nullable();
            $table->string('server_name')->nullable();
            $table->timestamps();
            $table->date('last_update_date')->nullable();
            $table->string('last_update_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hs_locations');
    }
}
