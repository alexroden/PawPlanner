<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

use App\Bus\Commands\User\RegisterUserCommand;
use App\Offer;
use App\Services\User\User;
use Carbon\Carbon;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Support\Facades\View;

/**
 * This is the auth controller class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class ApiController extends AbstractApiController
{
    /**
     * This handles validating offers.
     *
     * @param \App\Offer $offer
     *
     * @return mixed
     */
    public function offerValidation(Offer $offer)
    {
        if ($offer->valid_from <= Carbon::now() && $offer->valid_to >= Carbon::now()) {
            return $this->item($offer);
        }

        return $this->noContent();
    }

    /**
     * This handles the user registration.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register()
    {
        $user = new User();

        $user->create(Binput::all());
    }
}
