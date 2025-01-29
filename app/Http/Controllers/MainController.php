<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
    public function testeApi() {
        $var = Note::all();
        return response()->json(["teste" => $var]);
    }
}
