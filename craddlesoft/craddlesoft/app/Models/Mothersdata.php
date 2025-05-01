<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import DB facade

class Mothersdata extends Model
{
    // Ensure correct table name
    protected $primaryKey = 'id'; // Define primary key
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Primary key is a string

    protected $fillable = [
        'id',
        'full_name',
        'national_id',
        'date_of_birth',
        'email',
        'address',
        'nearest_landmark',
        'husband_name',
        'husband_contact',
        'husband_occupation',
        'stimated_delivery_date',
        'last_menstrual_period',
        'previous_pregnancy_history',
        'known_medical_conditions',
        'current_health_status',
        'blood_type',
        'rh_factor',
        'chronic_illnesses',
        'allergies',
        'previous_surgeries',
        'occupation',
        'current_weigh',
        'mother_contact_number',
        'profile_picture'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                DB::beginTransaction();
                try {
                    $lastId = DB::table('mothersdata')
                        ->where('id', 'LIKE', 'M%')
                        ->max(DB::raw("CAST(SUBSTRING(id, 2) AS UNSIGNED)")) ?? 0;

                    $newId = 'M' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
                    $model->id = $newId;

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        });
    }

    public function getProfilePictureUrl()
    {
        return asset('storage/' . $this->profile_picture);
    }

    public function healthTrackingsAfter3Month()
    {
        return $this->hasMany(HealthChecksAfter3Month::class, 'mother_id', 'id');
    }

    public function healthTrackingsAfter6Month()
    {
        return $this->hasMany(HealthChecksAfter6Month::class, 'mother_id', 'id');
    }

    public function healthTrackingsAfter9Month()
    {
        return $this->hasMany(HealthChecksAfter9Month::class, 'mother_id', 'id');
    }

    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class, 'mother_id', 'id');
    }

    public function babyDetails()
    {
        return $this->hasMany(BabyDetail::class, 'mother_id', 'id');
    }
}
