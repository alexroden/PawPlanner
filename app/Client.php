<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
