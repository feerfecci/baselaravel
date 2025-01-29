<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo "estou dentro";
    }

    public function newGasto() {
        echo 'adicionando gasto';
    }
}
