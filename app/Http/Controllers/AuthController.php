<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $logado = $request->logado;

        $user = User::where('username', $username)->where('deleted_at', NULL)->first();

        // return response()->json([
        //     'data' => $request->username,
        //     'mensagem' => 'Usuario encontrado', 
        // ]);
        if (!$user) {
            return response()->json([
                'data' => null,
                'user' => $request->username,
                'mensagem' => 'Usuario não encontrado',
            ]);
        }
        if ($logado) {
            //se estiver logado preciso comparar a senha criptografada que foi salva
            if ($password != $user->password) {
                return response()->json([
                    'data' => null,
                    'mensagem' => 'Senha incorreta',
                ]);
            }
        } else {

            if (!password_verify($password, $user->password)) {
                return response()->json([
                    'data' => null,
                    'mensagem' => 'Senha incorreta',
                ]);
            }
        }
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        $this->userId = $user->id;
        // dd(session('user'));
        return response()->json([
            'data' => $user,
            'mensagem' => 'Usuario encontrado',
        ]);
        // $user = User::all()->toArray();

        // return response()->json($user);
    }

    public function logout()
    {
        session()->forget('user');
        return response()->json(['data' => null, 'mensagem' => 'Usuario desconectado', 'idlogado' => $this->userId]);
    }
}
