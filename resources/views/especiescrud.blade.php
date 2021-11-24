@extends('layouts.master')
@section('titulo','Crud mascotas')
@section('contenido')
   

    <div id="apiEspecies">
    	<h1>@{{mensaje}}</h1>

    	<!--<pre>
		   @{{especies}}
        </pre>-->
        <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Especies 

                  <button class="btn btn-primary" @click="mostrarModal()">  
                    <i class="fas fa-plus">
                      
                    </i>
                  </button></h5>

              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <th>ID</th>
                    <th>Raza</th>
                    <th>Opciones</th>
                  </thead>
                  <tbody>
                    <tr v-for="especie in especies">
                      <td>@{{especie.id_especie}}</td>
                      <td>@{{especie.especie}}</td>
                      <td>
                        <!--loa iconos estan en font awesome.com-->
                        <button class="btn btn-sm" @click="editandoEspecie(especie.id_especie)">
                          <i class="fas fa-pen">
                            
                          </i>
                        </button>
                        <button class="btn btn-sm" @click="eliminarEspecie(especie.id_especie)" >
                          <i class="fas fa-trash">
                            
                          </i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                
              </div>
            </div>
            <!-- Modal para el formulario del registro de los moovimientos -->
<div class="modal fade" id="modalEspecies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="text" class="form-control" placeholder="nombre de la especie" v-model="especieAgregar">
              
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarEspecie" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-warning" @click="actualizarEspecie()" v-if="agregando==false">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->
    </div>
    
    
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/especies.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
@endpush