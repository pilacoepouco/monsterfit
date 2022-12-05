<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios);
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $parametros = ['login' => $request->username, 'senha' => $request->senha];

        if (!Auth::attempt($parametros)) {
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Usuario([
            'nome' => $request->name,
            'data_registro' => $request->dt_registro,
            'status' => 1,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'senha' => Hash::make($request->senha),
            'tipo_usuario_idtipo_usuario' => $request->id_tipo_usuario
        ]);
        $user->save();
        return response()->json([
            'message' => 'Usuario criado com sucesso',
            'user' => $user->id
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario = new Usuario([
            'nome' => $request->name,
            // 'data_registro' => $request->dt_registro,
            'status' => 1,
            'telefone' => $request->telefone,
            // 'endereco' => $request->endereco,
            // 'senha' => Hash::make($request->senha),
            'tipo_usuario_idtipo_usuario' => $request->id_tipo_usuario
        ]);
        $usuario->save();
        return response()->json([
            'message' => 'Usuario alterado com sucesso',
            'user' => $usuario->id
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json([
            'message' => 'Usuario excluido com sucesso',
        ], 201);
    }
}
