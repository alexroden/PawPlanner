<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::truncate();

        $plans = [
            [
                'value'       => 0,
                'description' => 'Free plan',
            ],
            [
                'value'       => 4.5,
                'description' => 'Basic plan',
            ],
            [
                'value'       => 9.9,
                'description' => 'Premier plan',
            ],
            [
                'value'       => 12,
                'description' => 'Ultra plan',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
