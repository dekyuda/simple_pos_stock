<html>
<head>
</head>
<style>
body{
	padding: 0px;
	margin: 0px;

}

#wrapper{
	width: 100%;
	height: 100%;
	text-align: center;
}

.text h1{
	font-weight: bold;
	font-style: italic;
}

button.back{
	border: none;
	border-radius: 50px;
	background-color: #663399;
	padding: 10px;
	color: white;
	font-size: 1em;
	font-weight: bold;
}

a{
	text-decoration: none;
	color: white;
}
</style>
<body>
<div id="wrapper">
	<div class="image"></div>
	<div class="text">
		<h1>Sorry Service Not Found...</h1>
		<button type="button" class="back" name="back"><a href="<?php echo base_url()?>login">Go Back</a></button>
	</div>
</div>	
</body>
</html>
