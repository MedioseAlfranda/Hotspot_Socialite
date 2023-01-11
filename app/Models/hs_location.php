<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class hs_location extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id',
        'location_name',
        'server_address',
        'server_name',
    ];

    public function Location()
    {
        return $this->belongsTo(hs_location::class, 'location_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_update_date' => 'datetime',
    ];
}




    

     








