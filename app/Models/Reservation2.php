<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Define the name of the database table
    protected $table = 'reservations';

    // Define the properties that can be mass assigned
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'date', 
        'time', 
        'number_of_people', 
        'message'
    ];
}