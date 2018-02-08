<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
