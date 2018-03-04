<?php

namespace App\Bus\Commands\User;

/**
 * This is the register user command.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
final class RegisterUserCommand
{
    /**
     * This is the user's username.
     * 
     * @var string
     */
    public $username;

    /**
     * This is the user's email.
     * 
     * @var string
     */
    public $email;

    /**
     * This is the user's password.
     * 
     * @var string
     */
    public $password;

    /**
     * This is the user's password confirmation.
     * 
     * @var string
     */
    public $confirmPassword;

    /**
     * This is the user's chosen plan.
     * 
     * @var string
     */
    public $plan;

    /**
     * This is the user's promo.
     * 
     * @var string
     */
    public $promo;

    /**
     * The validation rule.
     * 
     * @var string[]
     */
    public $rule = [
        'username'        => 'required|string',
        'email'           => 'required|string',
        'password'        => 'required|string',
        'confirmPassword' => 'required|string',
        'plan'            => 'required|int',
        'promo'           => 'required|json',
    ];

    /**
     * Create a new register user command.
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @param int    $plan
     * @param json   $promo
     *
     * @return void
     */
    public function __construct($username, $email, $password, $confirmPassword, $plan, $promo)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->plan = $plan;
        $this->promo = $promo;
    }

}