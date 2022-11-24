@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Usuario') }}</div>
                <br>
                
               

                <div class="card-body">
                    @if(Cache::has('success'))
                    <div class="alert alert-success text-center">
                        {{Cache::get('success')}}
                    </div>
                     @endif
                     
                     @if(Cache::has('danger'))
                    <div class="alert alert-danger text-center">
                        {{Cache::get('danger')}}
                    </div>
                     @endif

                     
        
                <form  method="{{$method}}" action="@if(empty($usuario)) {{url('usuario')}} @else {{url('usuario',$usuario->id.'/edit')}} @endif " novalidate>
        
                    @csrf
        
                    <div class="form-group mb-2">
                        <label>Tipo Documento</label>
                        <select @if(!empty($usuario)) disabled @endif  class="form-control @error('tipo_documento_id') is-invalid @enderror" name="tipo_documento_id" id="tipo_documento_id">
                        <option   value="" > Seleccione</option>
                        @foreach (getTipoDocumento() as $value )
                            @if(!empty($usuario) && $usuario->tipo_documento_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->nombre}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @endif
                            
                        @endforeach
                        </select>
        
                        @error('tipo_documento_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Documento</label>
                        <input type="text" @if(!empty($usuario)) value="{{$usuario->documento}}" disabled @endif  class="form-control @error('documento') is-invalid @enderror" name="documento" id="documento">
        
                        @error('documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Primer nombre </label>
                        <input type="text" class="form-control  @error('primer_nombre') is-invalid @enderror" @if(!empty($usuario)) value="{{$usuario->primer_nombre}}" @endif name="primer_nombre" id="primer_nombre">
        
                        @error('primer_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Segundo nombre </label>
                        <input type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" @if(!empty($usuario)) value="{{$usuario->segundo_nombre}}" @endif name="segundo_nombre" id="segundo_nombre">
        
                        @error('segundo_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Apellidos </label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" @if(!empty($usuario)) value="{{$usuario->apellidos}}" @endif name="apellidos" id="apellidos">
        
                        @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" @if(!empty($usuario)) value="{{$usuario->direccion}}" @endif name="direccion" id="direccion">
        
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                
                    </div>
                    <div class="form-group mb-2">
                        <label>Telefono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" @if(!empty($usuario)) value="{{$usuario->telefono}}" @endif name="telefono" id="telefono">
        
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                
                    </div>
                    <div class="form-group mb-2">
                        <label>Ciudad</label>
                        <select  class="form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" id="ciudad_id">
                        <option   value="" readonly> Seleccione</option>
                        @foreach (getCiudad() as $value )
                            @if(!empty($usuario) && $usuario->ciudad_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->nombre}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @endif
                    
                        @endforeach
                        </select>
        
                        @error('ciudad_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
        
                    <div class="d-grid mt-3">
                      <input type="submit" name="send" value="Guardar" class="btn btn-dark btn-block">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
