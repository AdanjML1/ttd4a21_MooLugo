
function init(){

var apiMascota='http://localhost/ttd4a21_MooLugo/public/apiMas';

var apiEspecie='http://localhost/ttd4a21_MooLugo/public/apiEs';

new Vue({
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
	el:'#apiMascota',

	data:{

		nombreA:'',
		edadA:'',
		pesoA:'',
		generoA:'',
		mensaje:'Este es el api Mascota',
		mascotas:[],
		especies:[],

	},
	created:function(){
		this.getMascota();
		this.obtenerEspecies();

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
	    mostrarModal:function(){
	    	$('#modalMascota').modal('show');
	    },
	    guardarMascota:function(){
	    	var mascota={nombre:this.nombreA,edad:this.edadA,peso:this.pesoA,genero:this.generoA};

	    	//se envian los datos al controlador
	    	this.$http.post(apiMascota,mascota).then(function(j){
	    		console.log('exito');
	    	}).catch(function(j){
	    		console.log(j);

	    	});
	    	//	console.log('exito');
	    	//}).catch(function(j){
	    	//	console.log(j);
	    	//});
	    	//oculta la ventana modal
	    	$('#modalMascota').modal('hide');
	    	console.log(mascota);

	    },

	},

	computed:{

	},



})
} window.onload = init;
