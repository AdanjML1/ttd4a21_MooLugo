@extends('layouts.master')
@section('titulo','Crud mascotas')
@section('contenido')
    <h1></h1>

    <div id="apiMascota">
    	<h1>@{{mensaje}}</h1>

         <div class="card card-danger">
              <div class="card-header">
                <h5 class="m-0">Mascotas 

                  <button class="btn btn-primary" @click="mostrarModal()">  
                    <i class="fas fa-plus">
                      
                    </i>
                  </button>
                </h5><br>
                 <div class="col-md-6">
                    <input type="text" placeholder="Escriba el nombre de la mascota" class="form-control" v-model="buscar">                   
                  </div>


              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <th>ID</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Propietario</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>peso</th>
                    <th>Genero</th>
                    <th>Opciones</th>
                  </thead>
                  <tbody>
                    <tr v-for="mas in filtroMascotas">
                      <td>@{{mas.id_mascota}}</td>
                      <td>@{{mas.especie.especie}}</td>
                      <td>@{{mas.raza.raza}}</td>
                      <td>@{{mas.propietario.nombre}}</td>
                      <td>@{{mas.nombre}}</td>
                      <td>@{{mas.edad}}</td>
                      <td>@{{mas.peso}}</td>
                      <td>@{{mas.genero}}</td>
                      <td>
                        <!--loa iconos estan en font awesome.com-->
                        <button class="btn btn-sm" @click="editandoMascota(mas.id_mascota)">
                          <i class="fas fa-pen">
                            
                          </i>
                        </button>
                        <button class="btn btn-sm" @click="eliminarMascota(mas.id_mascota)">
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
<div class="modal fade" id="modalMascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregando Mascota</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editando Mascota</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="col col-md-6">
              <input type="text" class="form-control" placeholder="nombre de la mascota" v-model="nombreA">
              <br>
              <input type="text" class="form-control" placeholder="Escriba la edad" v-model="edadA">
              <br>
              <input type="text" class="form-control" placeholder="Escriba el peso" v-model="pesoA"><br>

              <select class="form-control" v-model="generoA"> 
                <option disabled="">Elige un genero</option>
                <option value="M">M</option>
                <option value="H">H</option>
              </select>
              <br>
              <select class="form-control" v-model="id_propietarioA"> 
                <!--es muy importante recordar que elselect dinamico hace referencia 
                  a especies= al array en el archivo js , y especie= al dato que trae el json-->
                <option v-for="propietario in propietarios" v-bind:value="propietario.id_propietario">@{{propietario.nombre}}</option>
              </select>
              <br>
              <select class="form-control" v-model="id_especieA"> 
                <option v-for="especie in especies" v-bind:value="especie.id_especie">@{{especie.especie}}</option>
              
              </select>
              <br>
              <select class="form-control" v-model="id_razaA"> 
                <option v-for="raza in razas" v-bind:value="raza.id_raza">@{{raza.raza}}</option>
              </select>
              <br>



              
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarMascota" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-warning" @click="actualizarMascota" v-if="agregando==false">Guardar cambios</button>
        
      </div>
    </div>
  </div>
</div>
    </div>
    
    
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/mascotas.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
@endpush


