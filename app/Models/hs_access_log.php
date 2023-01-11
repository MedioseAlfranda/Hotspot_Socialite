<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class hs_access_log extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_update_date' => 'datetime',
    ];

    public function Location()
    {
        return $this->hasMany(hs_location::class, 'location_id');
    }
    
     /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function user()
    {
        return $this->hasMany(hs_user_account::class,'user_id');
    }       
}

