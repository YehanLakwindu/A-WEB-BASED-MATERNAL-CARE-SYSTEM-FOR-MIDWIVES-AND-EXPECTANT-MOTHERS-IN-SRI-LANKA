<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Midwife
 *
 * @property $midwife_id
 * @property $full_name
 * @property $email
 * @property $contact_number
 * @property $specialty
 * @property $years_of_experience
 * @property $work_location
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Midwife extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['midwife_id', 'full_name', 'email', 'contact_number', 'specialty', 'years_of_experience', 'work_location', 'address'];


}
