@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Vehiculo') }}</div>
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

                     
        
                <form  method="{{$method}}" action="@if(empty($vehiculo)) {{url('vehiculo')}} @else {{url('vehiculo',$vehiculo->id.'/edit')}} @endif " novalidate>
        
                    @csrf
                    
                    
        
                    <div class="form-group mb-2">
                        <label>Placa</label>
                        <input type="text" @if(!empty($vehiculo)) value="{{$vehiculo->placa}}" disabled @endif  class="form-control @error('placa') is-invalid @enderror" name="placa" id="placa">
        
                        @error('placa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Color</label>
                        <select  class="form-control @error('color_id') is-invalid @enderror" name="color_id" id="color_id">
                        <option   value="" readonly> Seleccione</option>
                        @foreach (getColor() as $value )
                            @if(!empty($vehiculo) && $vehiculo->color_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->nombre}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @endif
                    
                        @endforeach
                        </select>
        
                        @error('color_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Marca</label>
                        <input type="text" @if(!empty($vehiculo)) value="{{$vehiculo->marca}}" disabled @endif  class="form-control @error('marca') is-invalid @enderror" name="marca" id="marca">
        
                        @error('marca')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                   
                    <div class="form-group mb-2">
                        <label>Tipo vehiculo</label>
                        <select @if(!empty($vehiculo)) disabled @endif  class="form-control @error('tipo_vehiculo_id') is-invalid @enderror" name="tipo_vehiculo_id" id="tipo_vehiculo_id">
                        <option   value="" readonly> Seleccione</option>
                        @foreach (getTipoVehiculo() as $value )
                            @if(!empty($vehiculo) && $vehiculo->tipo_vehiculo_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->nombre}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @endif
                    
                        @endforeach
                        </select>
        
                        @error('tipo_vehiculo_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group mb-2">
                        <label>Conductor</label>
                        <select data-live-search="true" class="form-control @error('conductor_id') is-invalid @enderror" name="conductor_id" id="conductor_id">
                        <option   value="" readonly> Seleccione</option>
                        @foreach (getUsuario() as $value )
                            @if(!empty($vehiculo) && $vehiculo->conductor_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->primer_nombre}} {{$value->segundo_nombre}} {{$value->apellidos}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->primer_nombre}} {{$value->segundo_nombre}} {{$value->apellidos}}</option>
                            @endif
                    
                        @endforeach
                        </select>
        
                        @error('conductor_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Propietario</label>
                        <select data-live-search="true" class="form-control @error('propietario_id') is-invalid @enderror" name="propietario_id" id="propietario_id">
                        <option   value="" readonly> Seleccione</option>
                        @foreach (getUsuario() as $value )
                            @if(!empty($vehiculo) && $vehiculo->propietario_id==$value->id) 
                                <option selected value="{{$value->id}}">{{$value->primer_nombre}} {{$value->segundo_nombre}} {{$value->apellidos}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->primer_nombre}} {{$value->segundo_nombre}} {{$value->apellidos}}</option>
                            @endif
                    
                        @endforeach
                        </select>
        
                        @error('propietario_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                   
                    
                   
        
                    <div class="d-grid mt-3">
                      <input type="submit" name="send" value="Guardar" class="btn btn-dark btn-block">
                    </div>
                    <div class="d-grid mt-3">
                        <a href="{{url('home')}}" class="btn btn-light btn-block">Home</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });

</script>
@endsection
