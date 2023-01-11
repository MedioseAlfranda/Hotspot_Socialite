<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsAccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_access_logs', function (Blueprint $table) {
            $table->id('access_log_id');              
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('socialprovider_id')->nullable();
            $table->string('method')->nullable();      
            $table->string('mac_address')->nullable();
            $table->timestamps();
            $table->date('last_update_date')->nullable();
            $table->string('last_update_by')->nullable();
            


            $table->foreign('user_id')->references('user_id')->on('hs_user_accounts');
            $table->foreign('location_id')->references('location_id')->on('hs_locations');
          
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hs_access_logs');
    }
}