@extends('layouts.master')
@section('contenido')
<div id="apiRaza"><!--inicio de vue-->
	<h1>@{{mensaje}}</h1>
	<!--<pre>
		@{{razas}}
	</pre>-->
	<div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Razas</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <th>ID</th>
                    <th>Raza</th>
                  </thead>
                  <tbody>
                    <tr v-for="raza in razas">
                      <td>@{{raza.id_raza}}</td>
                      <td>@{{raza.raza}}</td>
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
</div><!--fin de vue-->
	

@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/raza.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>

@endpush