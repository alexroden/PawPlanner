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
 * This is the company class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Company extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'name'    => 'string',
        'plan_id' => 'int',
        'rate'    => 'float',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'plan_id',
        'rate',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'    => 'required|name',
        'plan_id' => 'required|int',
        'rate'    => 'required|float',
    ];

    /**
     * The plan relation.
     *
     * @return \App\Plan
     */
    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    /**
     * The user relation.
     *
     * @return \App\User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
