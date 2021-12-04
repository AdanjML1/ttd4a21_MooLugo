
function init(){

var apiMascota='http://localhost/ttd4a21_MooLugo/public/apiMas';

var apiEspecie='http://localhost/ttd4a21_MooLugo/public/apiEs';

var apiPropietario='http://localhost/ttd4a21_MooLugo/public/apiPro';

var apiRaza='http://localhost/ttd4a21_MooLugo/public/apiRaza';

new Vue({
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
	el:'#apiMascota',

	data:{

		id_mascota:'',

		agregando:true,

		id_especieA:'',
		id_razaA:'',
		id_propietarioA:'',



		nombreA:'',
		edadA:'',
		pesoA:'',
		generoA:'',
		mensaje:'Este es el api Mascota',
		mascotas:[],
		especies:[],
		propietarios:[],
		razas:[],

	},
	//al crearse la pagina carga los metodos
	created:function(){
		this.getMascota();
		this.obtenerEspecies();
		this.obtenerPropietarios();
		this.obtenerRazas();


	},
	methods:{
		getMascota:function(){
			this.$http.get(apiMascota).then(function(j){
				this.mascotas=j.data;
			})

		},
		obtenerEspecies:function(){
			this.$http.get(apiEspecie).then(function(j){

				this.especies=j.data;
			
			})
	    },
	    obtenerPropietarios:function(){
			this.$http.get(apiPropietario).then(function(j){

				this.propietarios=j.data;
			
			})
	    },
	    obtenerRazas:function(){
			this.$http.get(apiRaza).then(function(j){

				this.razas=j.data;
			
			})
	    },
	    mostrarModal:function(){
	    	this.agregando=true;
	    	    this.id_especieA='';
	    		this.id_razaA='';
	    		this.id_propietarioA='';
	    		this.nombreA='';
	    		this.edadA='';
	    		this.pesoA='';
	    		this.generoA='';
	    	$('#modalMascota').modal('show');
	    },
	    guardarMascota:function(){
	    	var mascota={id_especie:this.id_especieA,
	    		id_raza:this.id_razaA,
	    		id_propietario:this.id_propietarioA,
	    		nombre:this.nombreA,
	    		edad:this.edadA,
	    		peso:this.pesoA,
	    		genero:this.generoA};

	    	//se envian los datos al controlador
	    	this.$http.post(apiMascota,mascota).then(function(j){
	    		this.getMascota();
	    		this.id_especieA='';
	    		this.id_razaA='';
	    		this.id_propietarioA='';
	    		this.nombreA='';
	    		this.edadA='';
	    		this.pesoA='';
	    		this.generoA='';

	    		console.log('exito');
	    	}).catch(function(j){
	    		console.log(j);

	    	});
	    	
	    	//oculta la ventana modal
	    	$('#modalMascota').modal('hide');
	    	

	    },
	    eliminarMascota:function(id){
			

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
           	this.$http.delete(apiMascota + '/' + id).then(function(j){
				//el get especies sirve para mostrar la tabla actualizada
				this.getMascota();
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
		editandoMascota:function(id){
			this.agregando=false;
			//almacenamos el id de la mascota para utilizarla en la actualizacion(muy importante)
			this.id_mascota=id;

			//en esta parte pedimos los datos de la mascota a la cual seleccionamos

			this.$http.get(apiMascota + '/' +id).then(function(j){
				//la parte de console.log sirve para mostrar los datos en la consola
				//console.log(j.data);
				this.id_especieA=j.data.id_especie;
				this.id_razaA=j.data.id_raza;
				this.id_propietarioA=j.data.id_propietario;
				this.nombreA=j.data.nombre;
				this.edadA=j.data.edad;
				this.pesoA=j.data.peso;
				this.generoA=j.data.genero;

			});
			$('#modalMascota').modal('show');


		},
		actualizarMascota:function(){

			var jsonMascota={id_especie:this.id_especieA,
				id_raza:this.id_razaA,
				id_propietario:this.id_propietarioA,
				nombre:this.nombreA,
				edad:this.edadA,
				peso:this.pesoA,
				genero:this.generoA
			};

			//console.log(jsonMascota); esta linea sirve para ver el json mascota construido en la consola
			this.$http.patch(apiMascota + '/' + this.id_mascota,jsonMascota).then(function(j){
				//esta parte carga nuevamente la vista
				this.getMascota();
			});
			//cierra la ventana modal
			$('#modalMascota').modal('hide');
			//alert('estoy modificando');
		},


	},

	computed:{

	},



})
} window.onload = init;
