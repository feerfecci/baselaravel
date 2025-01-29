<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        // $request->validate([
        //     'text_username' => 'required',
        //     'text_password' => 'required',
        // ], );

        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', $username)->where('deleted_at', NULL)->first();


        if (!$user) {
            return response()->json([
                'data' => null,
                'mensagem' => 'Usuario não encontrado',
            ]);
        }
        if (!password_verify($password, $user->password)) {
            return response()->json([
                'data' => null,
                'mensagem' => 'Senha incorreta',
            ]);
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ]
        ]);
        return response()->json(['data' => $user, 'mensagem' => 'Usuario encontrado', 'session' => session('user')]);
        // $user = User::all()->toArray();

        // return response()->json($user);
    }

    public function logout()
    {
        session()->forget('user');
        return response()->json(['data' => null, 'mensagem' => 'Usuario desconectado', 'session' => session('user')]);
    }
}
