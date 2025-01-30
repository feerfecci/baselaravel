<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function newGasto(Request $request)
    {
        DB::table('gastos')->insert([
            'descricao' => $request->input('descricao'),
            'data' => $request->input('data'),
            'tipo' => $request->input('tipo'),
            'categoria' => $request->input('categoria'),
            'valor' => $request->input('valor'),
            'created_at' => now(),

        ]);
        return response()->json([
            'success' => true,
            'message' => 'Gasto adicionado com sucesso!',
        ]);
    }

    public function allGastos($idlogado)
    {

        // dd($idlogado);
        $user = User::find($idlogado)->toArray();
        $gastos = User::find($idlogado)->gastos()->get()->toArray();
        // $gastos = User::with('gastos')->get();

        return response()->json([
            'data' => $gastos,
            'user' => $user,
            'mensagem' => 'gastos encontrado'
        ]);

    }
}
