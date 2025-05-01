<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BabyDetail
 *
 * @property $id
 * @property $mother_id
 * @property $baby_name
 * @property $gender
 * @property $date_of_birth
 * @property $birth_weight
 * @property $birth_length
 * @property $blood_type
 * @property $medical_conditions
 * @property $created_at
 * @property $updated_at
 *
 * @property Mothersdata $mothersdata
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BabyDetail extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['mother_id', 'baby_name', 'gender', 'date_of_birth', 'birth_weight', 'birth_length', 'blood_type', 'medical_conditions'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mothersdata()
    {
        return $this->belongsTo(\App\Models\Mothersdata::class, 'mother_id', 'id');
    }

    public function vaccinations()
    {
        return $this->hasMany(BabyVaccination::class, 'baby_id');
    }

    public function mother()
    {
        return $this->belongsTo(Mothersdata::class, 'mother_id', 'id');
    }

    public function healthCheckups()
    {
        return $this->hasMany(\App\Models\BabyHealthCheckup::class, 'baby_id', 'id');
    }
}
