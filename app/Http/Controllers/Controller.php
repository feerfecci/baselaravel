<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $userId;

    public function __construct()
    {
        $this->userId;
    }
}
