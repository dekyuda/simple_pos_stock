<html>
<head>
	<title>Fast Stock</title>
	<!-- icon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>asset/system/image/fastStock.ico" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-login.css">
	<link rel="stylesheet" tyoe="text/css" href="<?php echo base_url();?>asset/system/css/font-awesome.css">


	<script src="<?php echo base_url();?>asset/system/js/jquery-3.1.1.min.js"></script>
	<!--script js-->
	<script>

	$(document).ready(function(){

		$('#logForm').submit(function(e){
			e.preventDefault();
			var url = "<?php echo base_url().'login/login'?>";

			//alert('test');

			$.ajax({
				type: 'POST',
				url: url,				
				data: $(this).serialize(),
				dataType: 'json',
				success: function(data){
					if(data.success == true){
						//alert(data.success);
						//alert('Login Success');
						//document.location.href = data.redirect;
						//$('.form-status').addClass('form-success-msg');
						$('.form-status').append('<div class="form-success-msg"></div>');
						$('.form-success-msg').fadeIn();
						$('.form-success-msg').html(data.message);
						setTimeout(function(){
							window.location.href = "main";
						}, 1000);
						
						
					}
					else{
						//$('.form-status').addClass('form-error-msg');
						$('.form-status').append('<div class="form-error-msg"></div>')
						$('.form-error-msg').fadeIn();
						$('.form-error-msg').html(data.message);
						setTimeout(function(){
							$('.form-error-msg').fadeOut();
							$('.form-error-msg').remove();
						}, 1500);
						
						
					}				
				}

			});

			e.preventDefault();
			return false;

		}); //end submit function */

	});	

	</script>
	<!---->
</head>
<body>
<div id="wrapper">
	<div class="title-header">
		<h1>Fast Stock</h1>
	</div>
	<div class="login-container">
		<div class="form-status">
		</div>
		<div class="form-header">
			<h2>Login</h2>
			
		</div>
		<div class="form-main">
		<?php echo form_open('login/login', array('id'=>'logForm'));?>
			<div class="form-group">				
				<p>
				<label for="username" class="userlabel"></label>
				<input type="text" placeholder="Username" name="username" class="username" autocomplete="off">
				
				<p>
				
			</div>
			<div class="form-group">
				<label for="password" class="passlabel">
				<input type="password" placeholder="Password" name="password" class="password">	
				</label>
			</div>
			<div class="form-group">
				<input type="submit" class="submit" onclick="checkFunction()" name="submit" value="login"/>
			</div>	
		<?php echo form_close();?>
		</div>
	</div>
</div>
<!--end div wrapper-->	

</body>	
</html>