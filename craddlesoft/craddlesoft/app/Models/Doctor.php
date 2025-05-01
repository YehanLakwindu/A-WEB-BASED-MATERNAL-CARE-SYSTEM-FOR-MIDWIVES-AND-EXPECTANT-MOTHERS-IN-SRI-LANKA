<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 *
 * @property $id
 * @property $full_name
 * @property $date_of_birth
 * @property $gender
 * @property $contact_number
 * @property $email
 * @property $medical_registration_number
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
class Doctor extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['full_name', 'date_of_birth', 'gender', 'contact_number', 'email', 'medical_registration_number', 'specialty', 'years_of_experience', 'work_location', 'address'];


}
