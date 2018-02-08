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

use App\Offer;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

/**
 * This is the auth controller class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class ApiController extends AbstractApiController
{
    public function offerValidation(Offer $offer)
    {
        if ($offer->valid_from <= Carbon::now() && $offer->valid_to >= Carbon::now()) {
            return $this->item($offer);
        }
    }
}
