<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

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
       $method='post';


       return view('usuario.create',compact('method'));
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
        $method='post';

        //agregamos el id del usuario que creo el registro
        $usuario['user_id']=\Auth::user()->id;
        //creamos el usuario con exito
        if(Usuario::create($usuario)){
            Cache::put('success', 'Usuario creado con exito', Carbon::now()->addSeconds(5));
            return view('usuario.create',compact('method'));
        }else{
            Cache::put('danger', 'Error al crear el usuario', Carbon::now()->addSeconds(5));
            return view('usuario.create',compact('method'));
        }
      

    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $usuario=Usuario::whereraw('id = ?',$id)->first();
        if(!empty($usuario->id)){
            $method='PUT';
          
            return view('usuario.create', compact('usuario','method'));
        }

        return redirect('/home');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        
        //valida los campos
        $this->validate($request, [      
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
         unset($usuario['tipo_documento']);
         unset($usuario['documento']);

         
         //guardamos el usuario con exito
         $exist=Usuario::whereraw('id = ?',$id)->first();
       
         if(!empty($exist->id)){
             $exist->update($usuario);
             
             Cache::put('success', 'Usuario creado con exito', Carbon::now()->addSeconds(5));
             return redirect('usuario/'.$id);
           
         }else{
             Cache::put('danger', 'Error al crear el usuario', Carbon::now()->addSeconds(5));
             return redirect('usuario/'.$id);
             
         }
     
       
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
