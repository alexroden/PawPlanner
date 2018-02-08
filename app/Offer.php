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
 * This is the offer class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Offer extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'name'        => 'string',
        'promocode'   => 'string',
        'value'       => 'float',
        'description' => 'string',
        'valid_from'  => 'date',
        'valid_to'    => 'date',
        'plan_id'     => 'int',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'promocode',
        'value',
        'description',
        'valid_from',
        'valid_to',
        'plan_id',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'        => 'required|string',
        'promocode'   => 'required|string',
        'value'       => 'required|float',
        'description' => 'required|string',
        'valid_from'  => 'nullable|date',
        'valid_to'    => 'nullable|date',
        'plan_id'     => 'nullable|int',
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
}
