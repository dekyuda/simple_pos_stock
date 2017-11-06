<html>
<head>
	<title>muffinhooks</title>
		<meta name="Description" content="MuffinHooks Bali" />
		<meta name="Description" content="MuffinHooks" />
		<meta name="Description" content="Muffin Hooks" />
		<meta http-equiv="content-type" content="text/html;charset=UTF-8">


<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<style type="text/css">
@media only screen and (max-width: 1100px)  {
 body{
   padding: 0px;
   margin: 0px;
 }

 #header{
  position: fixed;
  width: 100%;
  height: 100%;

 }

.logo{
 display: none;
 float: left;
 margin-top: 2px;
 margin-left: 2px;
 width: 30px;
 height: 50px;

 }

.menu-nav {
	opacity: 1;
	float: left;

}

.menu-nav a{
  color: white;
  text-decoration: none;
  padding: 3px;
}

.sosial{
position: fixed;
display: block;
float: right;
margin-bottom: 0px;
margin-right: 0px;
margin-left: 70%;

}

.menu-m i{
  margin-top: 10px;
  margin-left: 20px;
}

.menu-m h1{
  color: white;


}

#main{
width: 100%;
height: 100%;

}


}
@media only screen and (min-width: 1100px){
body {
	padding: 0px;
	margin: 0px;
}


#header {
	position: fixed;
	width: 100%;
}

.logo{
	float: left;
	margin-top: 10px;
	margin-left: 10px;

}
#header .menu-nav ul li {
	width: 100%;

}

.menu-nav {
	width: 100%;
	float: left;
	margin-left: 50%;
	margin-top: -110px;

}

.sosial {

	margin-left: 67%;
	margin-top: 3px;

}

.sosial a{
	margin: 5px;
}

.menu-nav a {
	text-decoration: none;
	margin: 10px;
	color: #ffffff;

}

.menu-nav h3{
	font-family: "Arial";
	font-size: 18px;
}

.menu-m{
display: none;
}



}

iframe{
	max-width: 100%;
	max-height: 100%;

}

</style>

<script type="text/javascript">
  function fungsiMuncul(){
    document.getElementsByClassName('menu-nav').style.opacity = "1";
 }

 function fungsiHide(){
    document.getElemetByClassName('menu-nav').style.display = "none";
 }
</script>

</head>
<body>
<div id="header">
	<div class="logo">
		<img src="img/logo.png"></img>
	</div>

	<div class="menu-nav">
		<ul>
			<h3>

			<a href="index.html">Home</a>
			<a href="shop.php">Shop</a>
			<a href="about.php">About</a>
			</h3>
		</ul>
	</div>

	<div class="sosial">
		<ul>
			<a href="https://www.facebook.com/muffinhooks.bali" target="_blank"><img src="img/fb.png" style="width:18px;height:18px;"></img></a>
			<a href="https://twitter.com/muffinhooksbali" target="_blank"><img src="img/twitter.png " style="width:18px;height:18px;"></img></a>
			<a href="https://instagram.com/muffinhooks/" target="_blank"><img src="img/insta.png" style="width:18px;height:18px;"></img></a>
			<a href="http://muffinhooks.tumblr.com/" target="_blank"><img src="img/tumblr.png" style="width:18px;height:18px;"></img></a>
			<a href="#" target="_blank"><img src="img/search.png" style="width:18px;height:18px;"></img></a>
		</ul>
	</div>


</div>
<div id="main">
	<div id="frame">
		<iframe src="slide2.html" width="100%" height="100%" scrolling="no" frameborder="0"></iframe>
	</div>

</div>
</body>
</html>
