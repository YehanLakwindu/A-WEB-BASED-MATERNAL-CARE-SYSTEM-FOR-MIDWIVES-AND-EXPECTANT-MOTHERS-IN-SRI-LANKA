<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HealthChecksAfter3Month
 *
 * @property int $id
 * @property string $mother_id
 * @property \Illuminate\Support\Carbon $checkup_date
 * @property string $weight
 * @property string $blood_pressure
 * @property string $glucose_level
 * @property string $hemoglobin_level
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property Mothersdata $mother
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HealthChecksAfter3Month extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'health_checks_after_3_months';

    /**
     * Number of records per page for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mother_id',
        'checkup_date',
        'weight',
        'blood_pressure',
        'glucose_level',
        'hemoglobin_level',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'checkup_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the mother associated with this health check.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mother()
    {
        return $this->belongsTo(\App\Models\Mothersdata::class, 'mother_id', 'id');
    }
}
