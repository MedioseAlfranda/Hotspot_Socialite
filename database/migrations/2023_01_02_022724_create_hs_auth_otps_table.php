<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsAuthOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_auth_otps', function (Blueprint $table) {
            $table->id('auth_otp_id');
            $table->UnsignedBigInteger('user_id');
            $table->string('otp');

            $table->string('amount')->nullable();
            $table->string('package')->nullable();

            $table->string('type_otp')->nullable();
            
            $table->string('status')->default(0);

            $table->timestamps();

            $table->date('last_update_date')->nullable();
            $table->date('last_update_by')->nullable();
            
            $table->foreign('user_id')->references('user_id')->on('hs_user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hs_auth_otps');
    }
}
