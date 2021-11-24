
function init(){

var apiEspecies = 'http://localhost/ttd4a21_MooLugo/public/apiEs';

new Vue({
	//el http debe de siempre para poder modificar la base de datos
	//de igual manera no debe faltar el token en la plantilla maestra
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
	el:'#apiEspecies',
	data:{

		mensaje:'Este es el api Especies',
		especies:[],
		especieAgregar:'',
		agregando:true,

	},
	created:function(){

		this.getEspecies();
	},
	methods:{
		//obtiene el listado de todas las especies
		getEspecies:function(){
			this.$http.get(apiEspecies).then(function(j){
				this.especies=j.data;
			})

		},

		eliminarEspecie:function(id){
			

		Swal.fire({
         title: 'Esta seguro de eliminar?',
         text: "No podras revertir el cambio luego de confirmar!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Sí, eliminar!'
         }).then((result) => {
           if (result.isConfirmed) {
           	this.$http.delete(apiEspecies + '/' + id).then(function(j){
				//el get especies sirve para mostrar la tabla actualizada
				this.getEspecies();
			}).catch(function(j){
				console.log(j);
			})
            Swal.fire(
           'Eliminado!',
           'La mascota se eliminó :(',
           'Listo'
          )
          }
         })

		},
		mostrarModal(){
			this.agregando=true;
			this.especieAgregar='';
			$('#modalEspecies').modal('show');


		},

		guardarEspecie:function(){
			//se construye el json para enviar al controlador
			//es muy importante recordar que el nombre dentro del onjeto json debe de ser igual al
			//nombre del dato que sera enviado ya que las etiquetas se envian y luego se llen y si son iguales 
			//entonces los datos son llenados
			var especie={especie:this.especieAgregar};
			//se envian los dadtos en json al controlador
			this.$http.post(apiEspecies,especie).then(function(j){
				//este metodo mustra la version actualizada de los datos
				this.getEspecies();
				this.especieAgregar='';
				console.log('insercion exitosa');
			}).catch(function(j){
				console.log(j);

			});

			//guardar la ventana modal luego de acer clic al boton guardar

			$('#modalEspecies').modal('hide');
			console.log(especie);

		},

		//editando especie y actualizar especie funcionan en conjunto

		editandoEspecie:function(id){
			//esta parte sirve para cambiar el estado de agregando
			this.agregando=false;
			//este sirve para enviar al api el valor del id
			this.id_especie=id;

			//el then tambien significa promesa y sirve para devolver una accion luego de recibir un status de la 
			//peticion

			this.$http.get(apiEspecies + '/' + id).then(function(j){
				//console sirve para ver en la consola los datos que se estan cargando al consumir
				//el metodo
				//console.log(j.data);
				this.especieAgregar=j.data.especie;
			})
			$('#modalEspecies').modal('show');

		},
		actualizarEspecie:function(){
			var jEspe = {especie:this.especieAgregar}
			//console.log(jEspe);

			this.$http.patch(apiEspecies + '/' + this.id_especie,jEspe).then(function(j){
				this.getEspecies();

			});
			$('#modalEspecies').modal('hide');

			//alert('modificando');

		},
		
		

	},
	computed:{

	},
})
} window.onload = init;