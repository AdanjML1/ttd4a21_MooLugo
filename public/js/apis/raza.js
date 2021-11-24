function init(){

var apiRaza = 'http://localhost/ttd4a21_MooLugo/public/apiRaza';

new Vue({
	el:'#apiRaza',
	data:{
		mensaje:'Este es el api Raza',
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

	},
	computed:{

	},
})
} window.onload = init;