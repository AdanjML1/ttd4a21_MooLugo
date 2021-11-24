<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>crud razas</title>
	<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
</head>
<body>
	<div id="apiRaza">
		<h1>
			@{{mensaje}}
		</h1>
		<pre>
			@{{razas}}
		</pre>
	</div>

</body>
<script type="text/javascript" src="{{asset('js/apis/raza.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
</html>