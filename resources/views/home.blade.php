@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Informe de vehiculos') }}</div>
                <br>
              
               

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Color</th>
                            <th scope="col">Conductor</th>
                            <th scope="col">Propietario</th>
                            <th scope="col">Fecha creación</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (getVehiculo() as $value )
                              <tr>
                                <th >{{$value->placa}}</th>
                                <th >{{$value->marca}}</th>
                                <th >{{$value->color->nombre}}</th>
                                <th >
                                    <a href="{{url('usuario', base64_encode($value->conductor->id))}}">
                                    {{$value->conductor->primer_nombre}} {{$value->conductor->segundo_nombre}} {{$value->conductor->apellidos}}</a></th>
                                <th >
                                    <a href="{{url('usuario',base64_encode($value->propietario->id))}}">
                                    {{$value->propietario->primer_nombre}} {{$value->propietario->segundo_nombre}} {{$value->propietario->apellidos}}</a></th>
                                <th>{{date('Y-m-d',strtotime($value->created_at))}}</th>
                                <th><a  class="btn btn-info text-white" href="{{url('vehiculo',base64_encode($value->id))}}">Editar</a>
                                  
                                    <!-- Button trigger odal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">
                                    Eliminar
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminación de vehiculo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            ¿Seguro que desea eliminar el vehiculo con placa {{$value->placa}}?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <a onclick="deletes('{{url('vehiculo',base64_encode($value->id))}}')" class="btn btn-danger" >Sí</a>
                                           
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </tr>
                            
                            @endforeach
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
   
</div>


@endsection
<script>
    

function deletes(url) {
    console.log();
    const data = { _token :document.getElementsByName("_token")[0].value };
    fetch(url,{
    method: "DELETE",
    body:JSON.stringify(data) ,
    headers: {"Content-type": "application/json;charset=UTF-8"}
    })
    .then(response => location.reload()
    )  // convertir a json
    .catch(err => alert('Error al eliminar el vehiculo'));
}

    
</script>