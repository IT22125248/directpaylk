<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Hotel extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'name', 
        'description', 
        'image',
    ];

    // Optionally, if you want to display deleted_at in a custom format
    protected $dates = ['deleted_at'];
}

