<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Gasto;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'mensagem' => 'Gasto adicionado com sucesso!',
        ]);
    }

    public function allGastos($idlogado)
    {

        // dd($idlogado);
        if ($idlogado == null) {
            return response()->json([
                'data' => null,
                'mensagem' => 'Informe o id user'
            ]);
        }

        $user = User::find($idlogado)->toArray();
        $gastos = User::find($idlogado)->gastos()->get()->toArray();
        // $gastos = User::with('gastos')->get();

        return response()->json([
            'data' => $gastos,
            'user' => $user,
            'mensagem' => 'gastos encontrado'
        ]);
    }

    public function addEntrada(Request $request)
    {
        if (
            $request->input('user_id') == null || $request->input('descricao') == null ||
            $request->input('valor') == null || $request->input('data_entrada') == null
        ) {
            return response()->json([
                'data' => null,
                'mensagem' => 'Preencha os dados corretamente',
            ]);
        }
        try {
            $inserted =
                DB::table('entradas')->insert([
                    'user_id' => $request->input('user_id'),
                    'descricao' => $request->input('descricao'),
                    'valor' => $request->input('valor'),
                    'data_entrada' => $request->input('data_entrada'),
                ]);
            if ($inserted) {
                return response()->json([
                    'success' => true,
                    'mensagem' => 'Entrada adicionado com sucesso!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'mensagem' => 'Erro ao adicionar gasto.',
                ], 500); // Código de erro do servidor
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'mensagem' => 'Erro: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteEntrada($identrada)
    {
        // $id = Operations::decrypt($identrada);
        if ($identrada != null) {
            $entrada = Entrada::find($identrada);

            if ($entrada != null) {
                $entrada->delete();

                return response()->json([
                    'data' => $entrada,
                    'mensagem' => 'Entrada deletada com sucesso!',
                ]);
            } else {
                return response()->json([
                    'data' => null,
                    'mensagem' => 'Entrada não deletada!',
                ]);
            }
        }
    }

    public function allEntradas($userid)
    {
        try {
            $entradas = User::find($userid)->entradas()->whereNull('deleted_at')->get()->toArray();

            if ($entradas) {

                $totalEntradas = 0;

                foreach ($entradas as $entrada) {
                    $totalEntradas += $entrada['valor'];
                }


                return response()->json([
                    'data' => $entradas,
                    'total' => $totalEntradas,
                    'mensagem' => "Entradas acessadas sucesso!",
                ]);
            } else {
                return response()->json([
                    'data' => null,
                    'mensagem' => "Entradas não encontradas!",
                ]);

            }

        } catch (\Exception $e) {
            return response()->json([
                'data' => null,
                'mensagem' => $e->getMessage(),
            ], 500);
        }
    }
}
