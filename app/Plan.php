<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'value'       => 'float',
        'description' => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'description',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'value'       => 'required|float',
        'description' => 'required|string',
    ];
}
