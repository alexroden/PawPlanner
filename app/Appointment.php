<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the appointment class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Appointment extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'user_id'           => 'int',
        'pet_id'            => 'string',
        'schedule_start_at' => 'int',
        'schedule_end_at'   => 'string',
        'actual_start_at'   => 'string',
        'actual_end_at'     => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pet_id',
        'schedule_start_at',
        'schedule_end_at',
        'actual_start_at',
        'actual_end_at',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'user_id'           => 'required|int',
        'pet_id'            => 'required|string',
        'schedule_start_at' => 'nullable|int',
        'schedule_end_at'   => 'nullable|string',
        'actual_start_at'   => 'nullable|string',
        'actual_end_at'     => 'nullable|string',
    ];

    /**
     * The user relation.
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The pet relation.
     *
     * @return \App\Pet
     */
    public function pet()
    {
        return $this->hasOne(Pet::class);
    }
}
