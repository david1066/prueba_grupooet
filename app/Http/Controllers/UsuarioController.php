<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

       return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //valida los campos
        $this->validate($request, [
            'tipo_documento_id' => 'required|integer',
            'documento' => 'required|integer|digits_between:4,11|unique:usuarios,documento',
            'primer_nombre' => 'required|string|max:100',
            'segundo_nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:150',
            'direccion' => 'required|string|max:400',
            'telefono' => 'required|string|min:5|max:10',
            'ciudad_id' => 'required|integer',
         ]);

        //comvierte en un array
        $usuario=$request->all();
        //sacamos del array los parametros que no entran 
        unset($usuario['_token']);
        unset($usuario['send']);
        //agregamos el id del usuario que creo el registro
        $usuario['user_id']=\Auth::user()->id;
        //creamos el usuario con exito
        if(Usuario::create($usuario)){
            \Session::put('success','Usuario creado con exito');
            return view('usuario.create');
        }else{
            \Session::put('danger','Error al crear el usuario');
            return view('usuario.create');
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
