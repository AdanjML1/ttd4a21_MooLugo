@extends('layouts.master')
@section('titulo','Crud mascotas')
@section('contenido')
   

    <div id="apiPropietarios">
    	<h1>@{{mensaje}}</h1>

    	<!--<pre>
		   @{{propietarios}}
        </pre>-->
        <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Propietarios</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Celular</th>
                    <th>Calle</th>
                    <th>Colonia</th>
                    <th>Numero de departamento</th>
                    <th>Localidad</th>
                  </thead>
                  <tbody>
                    <tr v-for="pro in propietarios">
                      <td>@{{pro.id_propietario}}</td>
                      <td>@{{pro.nombre}}</td>
                      <td>@{{pro.primer_apellido}}</td>
                      <td>@{{pro.segundo_apellido}}</td>
                      <td>@{{pro.celular}}</td>
                      <td>@{{pro.calle}}</td>
                      <td>@{{pro.colonia}}</td>
                      <td>
                        <button class="btn btn-danger">
                          Eliminar
                        </button>
                        <button class="btn btn-warning">
                          Editar
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                
              </div>
            </div>
    </div>
    
    
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/propietarios.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
@endpush