<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Bus\Handlers\Commands\User;

use App\Bus\Commands\User\RegisterUserCommand;

/**
 * This is the register user command class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class RegisterUserCommandHandler
{
    /**
     * Handle the register user command.
     *
     * @param \App\Bus\Commands\User\RegisterUserCommand $command
     *
     * @return void
     */
    public function handle(RegisterUserCommand $command)
    {
        $this->validate($command);
    }

    /**
     * Validate the user data.
     *
     * @param \App\Bus\Commands\User\RegisterUserCommand $command
     *
     * @throws ValidationException
     *
     * @return void
     */
    protected function validate(RegisterUserCommand $command)
    {
        dd('here');
    }
}
