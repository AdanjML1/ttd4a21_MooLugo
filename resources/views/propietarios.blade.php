<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>crud propietarios</title>
	<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
</head>
<body>
	<div id="apiPropietarios">
		<h1>@{{mensaje}}</h1>
		<pre>
			@{{propietarios}}
		</pre>
		
	</div>

</body>
<script type="text/javascript" src="{{asset('js/apis/propietarios.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
</html>