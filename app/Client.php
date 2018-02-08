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
 * This is the client class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class Client extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name'  => 'string',
        'email'      => 'string',
        'phone'      => 'string',
        'address'    => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'email'      => 'nullable|string',
        'phone'      => 'nullable|string',
        'address'    => 'nullable|string',
    ];
}
