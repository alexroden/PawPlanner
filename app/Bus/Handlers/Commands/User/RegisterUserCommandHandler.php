<?php

namespace App\Bus\Handlers\Commands\User;

use App\Bus\Commands\User\RegisterUserCommand;
use Illuminate\Support\Facades\Validator;

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
     * @param  \App\Bus\Commands\User\RegisterUserCommand $command
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
     * @param  \App\Bus\Commands\User\RegisterUserCommand $command
     * 
     * @return void
     *
     * @throws ValidationException
     */
    protected function validate(RegisterUserCommand $command)
    {
        

        dd('here');
    }
}