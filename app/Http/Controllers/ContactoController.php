<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('welcome');
        $contactos = Contacto::select('id', 'nombre', 'telefono', 'email')->get();

        return response()->json(
            ['mensaje' => 'Listado de contactos',
                'data' => $contactos]
        );
        /**
        * return response()->json(
        *     ['mensaje' => 'Listado de contactos',
        *         'data' => $contactos]
        * );
        */
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
        $request->validate([
            'nombre' => ['required'],
            'email' => ['required'],
            'mensaje' => ['required'],
        ]);

        $contacto = Contacto::create([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'mensaje' => $request['mensaje'],
        ]);

        return response()->json(
            ['mensaje' => 'Datos del contacto',
                'data' => $contacto]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $contacto = Contacto::select('id', 'nombre', 'telefono', 'email')
                        ->where('id', $id)->get();

        return response()->json(
            ['mensaje' => 'Datos del contacto',
                'data' => $contacto]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nombre' => ['required'],
            'email' => ['required'],
        ]);

        $contacto = Contacto::findOrFail($id);
        $contacto->nombre = $request['nombre'];
        $contacto->email = $request['email'];
        $contacto->telefono = $request['telefono'];
        $contacto->mensaje = $request['mensaje'];
        $resp = $contacto->save();

        if ($resp > 0) {
            return response()->json(
                ['mensaje' => 'Datos del contacto actualizados',
                    'data' => $contacto]
            );
        } else {
            return response()->json(
                ['mensaje' => 'No se pudo actualizar los datos del contacto',
                    'data' => $contacto]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return response()->json(
            ['mensaje' => 'El contacto se elimino correctamente',
                'data' => $contacto]
        );
    }
}
