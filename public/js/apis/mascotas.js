
function init(){

var apiMascota='http://localhost/ttd4a21_MooLugo/public/apiMas';

new Vue({

	el:'#apiMascota',

	data:{

		mensaje:'Este es el api Mascota',
		mascotas:[],

	},
	created:function(){
		this.getMascota();

	},
	methods:{
		getMascota:function(){
			this.$http.get(apiMascota).then(function(j){
				this.mascotas=j.data;
			})

		},

	},
	computed:{

	},



})
} window.onload = init;
