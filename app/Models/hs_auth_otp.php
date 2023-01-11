<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\hs_user_account as Authenticatable;
use Illuminate\Notifications\Notifiable;

class hs_auth_otp extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(hs_user_account::class);
    }
}
