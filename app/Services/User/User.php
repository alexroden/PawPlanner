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
        if (!empty($data)) {
            $validator = Validator::make([
                'username'              => array_get($data, 'username'),
                'email'                 => array_get($data, 'email'),
                'password'              => array_get($data, 'password'),
                'password_confirmation' => array_get($data, 'confirmPassword'),
                'plan'                  => array_get($data, 'plan'),
            ], [
                'username'              => 'required|unique:users',
                'email'                 => 'required|unique:users',
                'password'              => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5',
                'plan'                  => 'required|integer',
            ]);

            if ($validator->fails()) {
                throw new ValidationFailureException($validator->getMessageBag()->all());
            }

            return true;
        }

        throw new MissingDataException();
    }
}