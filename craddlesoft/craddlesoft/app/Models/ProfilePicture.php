<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    // Define the table name (if different from the default pluralized name)
    protected $table = 'profile_pictures';

    // Define the fillable fields for mass assignment
    protected $fillable = ['mother_id', 'filename'];

    // Define relationships, if any (e.g., belongsTo relationship with Mothersdata model)
    public function mother()
    {
        return $this->belongsTo(Mothersdata::class, 'mother_id', 'id');
    }
}
