<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property $id
 * @property $midwife_id
 * @property $mother_id
 * @property $schedule_date
 * @property $start_time
 * @property $end_time
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Mothersdata $mothersdata
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['midwife_id', 'mother_id', 'schedule_date', 'start_time', 'end_time', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mothersdata()
    {
        return $this->belongsTo(\App\Models\Mothersdata::class, 'mother_id', 'id');
    }
    
}
