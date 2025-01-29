<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return response()->json(['session' => session('user')]);
    }

    public function newGasto() {
        return response()->json(['session' => session('user')]);
    }
}
