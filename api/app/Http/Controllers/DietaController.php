<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use Illuminate\Http\Request;

class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dietas = Dieta::join('usuario', 'usuario.idusuario', '=', 'dieta.cliente_idcliente')->get();
        // $dietas = Dieta::all();
        return response()->json($dietas);
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
        $dieta = new Dieta([
            "proteina" => $request->proteina,
            "carboidrato" => $request->carboidrato,
            "gordura" => $request->gordura,
            "calorias_totais" => $request->calorias_totais,
            "cliente_idcliente" => $request->paciente,
            "nutricionista_idNutricionista" => 5,
            "data_inicio" => date('Y-m-d'),
            "data_fim" => date('Y-m-d', strtotime('+2 months')),
        ]);
        $dieta->save();
        return response()->json([
            'message' => 'Dieta criada com sucesso',
            'user' => $dieta->id
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function show(Dieta $dieta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function edit(Dieta $dieta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dieta $dieta)
    {
        $dieta->proteina = $request->proteina;
        $dieta->carboidrato = $request->carboidrato;
        $dieta->gordura = $request->gordura;
        $dieta->calorias_totais = $request->calorias_totais;
        $dieta->data_fim = date('Y-m-d', strtotime('+2 months'));
        $dieta->save();
        return response()->json([
            'message' => 'Dieta alterada com sucesso',
            'user' => $dieta->id
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dieta $dieta)
    {
        $dieta->delete();
        return response()->json([
            'message' => 'Dieta excluida com sucesso',
        ], 201);
    }
}
