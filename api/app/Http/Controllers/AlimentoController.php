<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $alimento = DB::table('alimento')->get();
        return response()->json($alimento);
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
        $alimento = new Alimento([
            'nome'=>$request->nome,
            'proteinas'=>$request->proteinas,
            'carboidrato'=>$request->carboidrato,
            'gordura'=>$request->gordura,
            'calorias_totais'=>$request->calorias_totais,
            'gramas'=>$request->gramas,
        ]);

        $alimento->save();
        return response()->json([
            'statusText' => "Alimento inserido com sucesso"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function show(Alimento $alimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimento $alimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimento $alimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimento $alimento)
    {
        //
    }
}
