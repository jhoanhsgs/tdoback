<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$notas = Nota::with('categorias')->get();
        $notas = Nota::all();
        return response()->json($notas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        return response()->json($data);
        $fields = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'usuario_id ' => 'required'
        ]);

        $nota = $request->user()->posts()->create($fields);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        return response()->json($nota);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::find($id);
        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        return response()->json($nota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);

        $nota->titulo = $request->titulo;
        $nota->descripcion = "jasdjasjdasjdasjdjasdjasdjjasdjasjdasjdasjdjasdjasdj";
        $nota->estado = $request->estado;
        $nota->fecha_creacion = "2024-09-30";
        $nota->usuario_id = "1";
        $nota->categoria_id = "1";
        $nota->fecha_vencimiento = "2024-10-02";
        $nota->imagen = "imagen.png";


        $nota->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);
        nota::destroy($id);
    }
}
