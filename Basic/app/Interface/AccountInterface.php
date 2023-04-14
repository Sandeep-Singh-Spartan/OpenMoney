<?php

namespace App\Interface;

interface AccountInterface{
    public function createVirtualAccount($account);
    public function getAccountBalance($email);

}
