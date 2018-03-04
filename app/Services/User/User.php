<?php

namespace App\Services\User;

use App\Bus\Commands\User\RegisterUserCommand;
use App\Exceptions\Http\MissingDataException;
use App\Exceptions\Http\ValidationFailureException;
use App\Services\Entity;

class User implements Entity
{
    /**
     * Handles creating a user.
     * 
     * @param array $data
     * 
     * @return $this
     *
     * @throws \App\Exceptions\Http\MissingDataException
     */
    public function create(array $data = [])
    {
        if (!empty($data)) {
            if ($this->validate($data)) {
                $username = array_get($data, 'username');
                try {
                    dispatch(new RegisterUserCommand(
                        $username,
                        array_get($data, 'email'),
                        array_get($data, 'password'),
                        array_get($data, 'confirm_password'),
                        array_get($data, 'plan'),
                        json_decode(array_get($data, 'promo', ''))
                    ));
                } catch (QueryException $e) {
                    // Implement bugsnag here.
                }

                $user = User::findByUsername($username)->first();

                return new static($user);
            }
        }

        throw new MissingDataException();
    }

    /**
     * Validate the user.
     *
     * @param array $data
     * 
     * @return bool
     *
     * @throws \App\Exceptions\Http\ValidationFailureException
     * @throws \App\Exceptions\Http\MissingDataException
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