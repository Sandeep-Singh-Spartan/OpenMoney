<?php

namespace App\Interface;

interface UserInterface{

    public function login($login);
    public function registration($user);
    public function logout();

}
