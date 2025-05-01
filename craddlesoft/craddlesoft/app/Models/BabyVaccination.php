<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BabyVaccination
 *
 * @property $id
 * @property $baby_id
 * @property $vaccine_name
 * @property $vaccination_date
 * @property $dose
 * @property $milestone
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property BabyDetail $babyDetail
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BabyVaccination extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['baby_id', 'vaccine_name', 'vaccination_date', 'dose', 'milestone', 'notes'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function babyDetail()
    {
        return $this->belongsTo(\App\Models\BabyDetail::class, 'baby_id', 'id');
    }

    public function baby()
    {
        return $this->belongsTo(BabyDetail::class, 'baby_id');
    }
}
