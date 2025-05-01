<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BabyHealthCheckup
 *
 * @property $id
 * @property $baby_id
 * @property $checkup_date
 * @property $weight
 * @property $height
 * @property $head_circumference
 * @property $feeding_status
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property BabyDetail $baby
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BabyHealthCheckup extends Model
{
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'baby_id',
        'checkup_date',
        'weight',
        'height',
        'head_circumference',
        'feeding_status',
        'notes',
    ];

    /**
     * Define the relationship with the BabyDetail model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baby()
    {
        return $this->belongsTo(\App\Models\BabyDetail::class, 'baby_id', 'id');
    }
}
