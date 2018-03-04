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

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * This is the user class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'username'   => 'string',
        'first_name' => 'string',
        'last_name'  => 'string',
        'email'      => 'string',
        'password'   => 'string',
        'company_id' => 'int',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'company_id',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'username'   => 'required|string',
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'email'      => 'required|string',
        'password'   => 'required|string',
        'company_id' => 'nullable|int',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The company relation.
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function findByUsername($username, array $columns = ['*'])
    {
        return static::where('username', '=', $username)->get();
    }
}
