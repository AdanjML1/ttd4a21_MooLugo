@extends('layouts.master')
@section('titulo','PRODUCTOS')
@section('contenido')



<div id="apiVenta">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="escriba el codigo del producto"
          aria-describedby="basic-addon2" v-model="sku">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" @click="buscarProducto()">boton
              
            </button>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    <div class="col-lg-12">

            <div class="card card-danger">
              <div class="card-header">
                <h5 class="m-0">Carrito</h5>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                      <th>Sku</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </thead>

                    <tbody>
                      <tr v-for="venta in ventas">
                        <td>@{{venta.sku}}</td>
                        <td>@{{venta.nombre}}</td>
                        <td>@{{venta.precio}}</td>
                        <td>@{{venta.cantidad}}</td>
                        <td>@{{venta.total}}</td>

                        
                      </tr>
                    </tbody>
                    
                  </table>

                  
                </div>
                
              </div>
              
            </div>
    <!--<h1>@{{mensaje}}</h1>-->
  </div>
  
</div>
   

   
    
    
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/productos.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
@endpush