<?php

namespace App\Services\User;

use App\Services\Entity;

class User implements Entity
{
    /**
     * Validate the user.
     *
     * @param array $data
     * 
     * @return [type] [description]
     */
    public function validate(array $data = [])
    {
        $validator = Validator::make([
            'username'              => $command->username,
            'email'                 => $command->email,
            'password'              => $command->password,
            'password_confirmation' => $command->confirmPassword,
            'plan'                  => (int) $command->plan,
        ], [
            'username'              => 'required|unique:users',
            'email'                 => 'required|unique:users',
            'password'              => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'plan'                  => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new $validator->getMessageBag()->all();
        }

        return true;
    }
}