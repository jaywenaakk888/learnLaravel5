<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	</head>
	<body>
	<div class="container">
		<div class="content">
			<div class="title">
				<ul>
					<li v-for="message in messages">@{{message}}</li>
				</ul>

			</div>
		</div>
	</div>
	</body>
</html>
<script type="text/javascript" src="{{asset('js/vue.min.js')}}"></script>
		
<script type="text/javascript">
	new Vue({
		el: '.title',
		data: {
			messages: [
				{text:'Hello Laravel1!'},
				{text:'Hello Laravel2!'},
				{text:'Hello Laravel3!'},
				{text:'Hello Laravel4!'},
				{text:'Hello Laravel5!'},
			]
		}
	})
</script>