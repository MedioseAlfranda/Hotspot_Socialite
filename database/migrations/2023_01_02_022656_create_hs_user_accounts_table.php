<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_user_accounts', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at');
            $table->string('handphone')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();   
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('hs_user_accounts');
    }
}
