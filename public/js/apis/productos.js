
function init(){


var apiProductos='http://localhost/ttd4a21_MooLugo/public/apiProducto';

new Vue({
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
	el:'#apiVenta',


	data:{

		mensaje:'Este es el api Ventas',
		sku:'',
		ventas:[],

	},
	created:function(){

	    
	},
	methods:{

		buscarProducto:function(){
			//este if valida si la variable sku tiene un dato almacenado en el para no generar errores
			//al momento de ejecutar un metodo vacio
			if(this.sku){
				var producto = {}
			this.$http.get(apiProductos + '/' + this.sku).then(function(j){
				producto={
					sku:j.data.sku,
					nombre:j.data.nombre,
					precio:j.data.precio_venta,
					cantidad:1,
					total:j.data.precio_venta
				};

				
				this.ventas.push(producto);
				this.sku='';


			})
			}
		},

		


	},
})
} window.onload = init;