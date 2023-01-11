<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class hs_user_account extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'tanggal_lahir',
        'tempat_lahir',
        'email',   
        'avatar', 
        'handphone',
        'jenis_kelamin',
        'agama',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function  Authenticationotp()
    {
        return $this->hasMany(hs_auth_otp::class, 'user_id');
    }

    /**
     * customer
     *
     * @return void
     */
    public function socialAccounts()
    {
        return $this->hasOne(hs_access_log::class, 'user_id');
    }
}



    

     








