<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Define which fields are mass assignable
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
