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

class Pet extends Model
{
    /**
     * The type, defining a dog.
     *
     * @var int
     */
    const TYPE_DOG = 0;

    /**
     * The type, defining a cat.
     *
     * @var int
     */
    const TYPE_CAT = 1;

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'client_id' => 'int',
        'name'      => 'string',
        'type'      => 'int',
        'breed'     => 'string',
        'medical'   => 'string',
        'info'      => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'name',
        'type',
        'breed',
        'medical',
        'info',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'client_id' => 'required|int',
        'name'      => 'required|string',
        'type'      => 'required|int',
        'breed'     => 'nullable|string',
        'medical'   => 'nullable|string',
        'info'      => 'nullable|string',
    ];

    /**
     * The client relation.
     *
     * @return \App\Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Scope dogs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDogs(Builder $query)
    {
        return $query->where('type', '=', self::TYPE_DOG);
    }

    /**
     * Scope cats.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCats(Builder $query)
    {
        return $query->where('type', '=', self::TYPE_CAT);
    }
}
