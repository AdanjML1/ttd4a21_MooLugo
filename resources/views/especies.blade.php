<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>crud especies</title>
	<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
</head>
<body>
	<div id="apiEspecies">
		<h1>
			@{{mensaje}}
		</h1>
		<pre>
			@{{especies}}
		</pre>
	</div>

</body>
<script type="text/javascript" src="{{asset('js/apis/especies.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
</html>