<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $table = 'events';
    protected $dates = ['event_date'];

    protected $fillable = [
        'event_name',
        'event_image',
        'event_description',
        'event_date',
    ];
}
