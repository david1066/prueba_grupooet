<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
class VehiculoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    

       return view('vehiculo.create',compact('method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'placa' => 'required|string|max:6|unique:vehiculos,placa',
            'color_id' => 'required|integer',
            'marca' => 'required|string|max:200',
            'tipo_vehiculo_id' => 'required|integer',
            'conductor_id' => 'required|integer',
            'propietario_id' => 'required|integer',
            ]);

        //comvierte en un array
        $vehiculo=$request->all();
        //sacamos del array los parametros que no entran 
        unset($vehiculo['_token']);
        unset($vehiculo['send']);
        //agregamos el id del vehiculo que creo el registro
        $vehiculo['user_id']=\Auth::user()->id;
        //creamos el vehiculo con exito
        $method='post';

        if(Vehiculo::create($vehiculo)){
            Cache::put('success', 'Vehiculo creado con exito', Carbon::now()->addSeconds(5));
            return view('vehiculo.create',compact('method'));
        }else{
            Cache::put('danger', 'Error al crear el vehiculo', Carbon::now()->addSeconds(5));
            return view('vehiculo.create',compact('method'));
        }
      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $vehiculo=Vehiculo::whereraw('id = ?',$id)->first();
        if(!empty($vehiculo->id)){
            $method='PUT';
          
            return view('vehiculo.create', compact('vehiculo','method'));
        }

        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //

        $this->validate($request, [
      
            'color_id' => 'required|integer',
            'conductor_id' => 'required|integer',
            'propietario_id' => 'required|integer',
            ]);

        //comvierte en un array
        $vehiculo=$request->all();
        //sacamos del array los parametros que no entran 
        unset($vehiculo['_token']);
        unset($vehiculo['send']);
        unset($vehiculo['placa']);
        unset($vehiculo['marca']);
        unset($vehiculo['tipo_vehiculo_id']);
        //agregamos el id del vehiculo que creo el registro
        //guardamos el usuario con exito
        $exist=Vehiculo::whereraw('id = ?',$id)->first();
            
        if(!empty($exist->id)){
            $exist->update($vehiculo);
            
            Cache::put('success', 'Usuario creado con exito', Carbon::now()->addSeconds(5));
            return redirect('vehiculo/'.$id);
        
        }else{
            Cache::put('danger', 'Error al crear el vehiculo', Carbon::now()->addSeconds(5));
            return redirect('usuario/'.$id);
            
        }

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $exist=Vehiculo::whereraw('id = ?',$id)->first();
            
        if(!empty($exist->id)){
            $exist->delete();
          
            return 'OK';
        
        }else{
         
           return 'ERR';
            
        }
    }
}
