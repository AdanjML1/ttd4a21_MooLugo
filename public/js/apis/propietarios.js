function init(){

var apiPropietarios='http://localhost/ttd4a21_MooLugo/public/apiPro';

new Vue({
	el:'#apiPropietarios',
	data:{
		mensaje:'Este es el api propietarios',
		propietarios:[],

	},
	created:function(){
		this.getPropietarios();
	},
	methods:{
		getPropietarios:function(){
			this.$http.get(apiPropietarios).then(function(j){
				this.propietarios=j.data;
			})

		},

	},
	computed:{

	},
})
} window.onload = init;