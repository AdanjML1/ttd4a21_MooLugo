function init(){

var apiRaza = 'http://localhost/ttd4a21_MooLugo/public/apiRaza';

new Vue({
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
	el:'#apiRaza',
	data:{
		mensaje:'Este es el api Raza',
		razaAgregar:'',
		razas:[],

	},
	created:function(){

	    this.getRaza();
	},
	methods:{
		getRaza:function(){
			this.$http.get(apiRaza).then(function(j){
				this.razas=j.data;
			})

		},
		mostrarModal:function(){
			$('#modalRaza').modal('show');
		},
		guardarRaza:function(){
			var raza={raza:this.razaAgregar};
			//se envian los dadtos en json al controlador
			this.$http.post(apiRaza,raza).then(function(j){

				this.getRaza();
				$('#modalRaza').modal('hide');
				//este metodo mustra la version actualizada de los datos
				console.log('insercion exitosa');
			}).catch(function(j){
				console.log(j);

			});
		}

	},
	computed:{

	},
})
} window.onload = init;