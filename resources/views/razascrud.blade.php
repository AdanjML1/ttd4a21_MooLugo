@extends('layouts.master')
@section('contenido')
<div id="apiRaza"><!--inicio de vue-->
	<h1>@{{mensaje}}</h1>
	<!--<pre>
		@{{razas}}
	</pre>-->
	<div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Razas
                  <button class="btn btn-primary" @click="mostrarModal()">  
                    <i class="fas fa-plus">
                      
                    </i>
                </h5>
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
            </div>  <!-- Modal para el formulario del registro de los moovimientos -->
<div class="modal fade" id="modalRaza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregando Especie</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editando Especie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="col col-md-6">
              <input type="text" class="form-control" placeholder="nombre de la raza" v-model="razaAgregar">
              
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarRaza">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div><!--fin de vue-->

	

@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/raza.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>

@endpush