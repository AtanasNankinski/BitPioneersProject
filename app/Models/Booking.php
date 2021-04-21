<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'orderedStartTime',
        'orderedEndTime',
        'recordedStartTime',
        'recordedEndTime',
        'canceled',
        'user'
    ];

    public $timestamps = false;
}
