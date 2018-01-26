<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
