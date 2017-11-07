<html>
<head>
	<title>SIMPLE POS</title>

	<!-- CSS Plugin -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/bootstrap.css">

	<!-- JS File -->
	<script src="<?php echo base_url();?>asset/system/js/jquery-3.2.1.js"></script>
	<script src="<?php echo base_url();?>asset/system/js/bootstap.min.js"></script>
	<script src="<?php echo base_url();?>asset/system/js/jquery.maskMoney.js"></script>
	<script src="<?php echo base_url();?>asset/system/js/jquery.priceformat.js"></script>

	<!-- Custome CSS and JS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-pos.css">
</head>
<?php
	$code = $id_order['id_order'];

	if($code){
		$code_val = substr($code, 4);
		$order = (int)$code_val;
		$order = $order + 1;
		$order_no = "ODR-".str_pad($order, 4, "0", STR_PAD_LEFT);
	}
	else{
		$order_no = "ODR-0001";
	}
?>
<body>
<div id="wrapper">
	<div id="header">
		<div class="nav"></div>
		<div class="title">
			<h2>Fast <sub>Point of Sales</sub></h2>
		</div>
	</div>
	<div id="main">
		<div class="product">
			<div class="category">
				<ul>
					<li type="" class="p-list"> All Product</li>
				<?php foreach($category->result() as $cat){
					echo "<li type='".$cat->category_name."' class='p-list'>$cat->category_name</li>";
				}
				?>
				</ul>
			</div>
			<div class="list">
				<div class="search-product">
					<input type="text" name="search" class="search" placeholder="search by product ID or Name">
				</div>
				<div class="list-product">
					<?php foreach($product->result() as $pro){
						$image = $pro->product_img;
						//$filename = echo base_url().'asset/images'
						if ($image == Null or !file_exists('asset/'.$image)){
							echo "
							<div class='grid-product' data-in='$pro->id_product'>
									<div class='pro-price'>
										<b>IDR ".number_format($pro->product_price, 0, ",", ".")."</b>
									</div>
									<div class='pro-img'>			
										<img src='asset/images/product/product.png'/>
									</div>
									<div class='pro-name'>
										<h4>$pro->product_name</h4>
									</div>
							</div>
							";	
						}
						else{
							echo "
							<div class='grid-product' data-in='$pro->id_product'>
									<div class='pro-price'>
										<b>IDR ". number_format($pro->product_price, 0, ",", ".")."</b>
									</div>
									<div class='pro-img'>			
										<img src='asset/$pro->product_img'/>
									</div>
									<div class='pro-name'>
										<h4>$pro->product_name</h4>
									</div>
							</div>
							";	
						}
						
					}
					?>
				</div>
			</div>
		</div>
		<!-- profuct end -->
		<div class="nota">
			<div class="nota-header">
				<div class="customer">Customer</div>
				<div class="order">Order No. <?php echo $order_no; ?></div>
			</div>	
			<div class="main-nota">
				<div class="main-nota-header">
					<div class="product_name_header">Item</div>
					<div class="product_price_header">Price</div>
					<div class="product_qty_header">Qty</div>
					<div class="nota-subtotal_header">Subtotal</div>
					<div class="product_del_header"></div>
				</div>
				<div class="main-nota-main"></div>
				<!--<div class="product_name"></div>
				<div class="product_price"></div>
				<div class="product_qty"></div>-->
			</div>
			<div class="pay-nota">
				<div class="total">
					<div class="total-title">
					<ul>
						<li><label>
							Sub Total
						</label></li>
						<li><label>
							Discount
						</label></li>
						<li><label>
							Tax
						</label></li>
						<li><label>
							Grand Total
						</label></li>
					</ul>			
					</div>
					<div class="total-price">
						<ul class="price-list">
							<li><lable class="subtotal">
							<input type="number" class="order-subtotal" name="sub-total" readonly value="0" min="0">
							</lable></li>
							<li><lable>
								<button>0%</button>
							</lable></li>
							<li><lable>
								<button>0%</button>
							</lable></li>
							<li><lable>
							<input type="number" readonly class="order-grandtotal" name="grand-total" value="0" min="0"></lable></li>
						</ul>	

					</div>
				</div>
				<div class="button">
					<button class="pay">PAY</button>
					<button class="cancel">X</button>
										
				</div>	
			</div>
		</div>
		<!-- end nota -->
	</div>

</div>

<script>
$(document).ready(function(){

	/* function */
	
	function subtotalodr(){
		var sub_total = 0;
		$('.nota-subtotal').each(function(){
			sub_total += Number($(this).text());

		});

		$('.order-subtotal').val(sub_total);
		//('.order-subtotal').val($('.order-subtotal').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

		//return false;
	}

	//curency function

	function toRupiah(val){
		var rev = parseInt(val, 10).toString().split('').reverse().join('');
		var rev2 = '';

		for(var i = 0; i < rev.length; i++){
			rev2 += rev[i];
			if((i + 1) % 3 == 0 && i != (rev.length - 1)){
				rev2 += '.';
			}
		}

		return 'RP. '+ rev2.split('').reverse().join('');
	}

	function grandtotalodr(){
		var grand_total = 0;
		var sub_total = $('.order-subtotal').val();
		var tax_total = $('.order-taxtotal').val();
		var disc_total = $('.order-discount').val();

		grand_total = parseFloat(sub_total) + parseFloat(tax_total) - parseFloat(disc_total);

		$('.order-grandtotal').val(grand_total);

		$('.order-grandtotal').val(grand_total); 
		

		var order_sub = $('.order-grandtotal').val();

		//order_sub.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

		toRupiah(order_sub);

	}

	$(document).on('click', '.product_del', function(){
		alert('bisa');
		$(this).parents('.main-product').remove();
	});

	/* Click on product name or qty or price show something */
	$(document).on('click', '.product_name', function(){

		$(this).each(function(){
			$('.product_qty').each(function(){
				var content = $(this).text();

			alert(content);
			});
			
		});
		

	});

	$('.grid-product').click(function(){
		var data = $(this).attr('data-in');

		var input = {id: data};

		//alert(data);
		var ulr = "<?php echo base_url().'pos/add' ?>"
		$.ajax({
			type: 'post',
			url: ulr,
			dataType: 'json',
			data: input,
			success: function(response){
				//response.data;
				//console.log(response.input);
				//alert(response.input);

				/*$('.product_name').append(response.product_name);
				$('.product_price').append(response.product_price);
				*/

				//make some new variable
				var content = response.product_name;
				var prdct_name;
				var pro_name;

				//alert(content);
				/*Check for each every product name on table nota is exists or not*/
				$('.product_name').each(function(){
					// if content is equal stop looping function
					if(content == $(this).text()){
						prdct_name = $(this).text();
						//alert(prdct_name);
						pro_name = $(this).closest('.main-product').find('.product_qty');
						pro_subtotal = $(this).closest('.main-product').find('.nota-subtotal');
					}
									
				});

				/*parse condition of product name exists or not into statement
				if exist update qty
					if not add new on table nota*/
				if(prdct_name == content){
					//alert(prdct_name);
					/*update quantity*/
					pro_name.html(parseInt(pro_name.text()) + parseInt(1));

					pro_subtotal.html(pro_subtotal.text() * pro_name.text());

				}
				else{
					//alert('data belum ada');
					$('.main-nota').append('<div class="main-product"><div class="product_name" name="product_name[]">'+response.product_name+'</div><div class="product_price" name="product_price[]">'+response.product_price+'</div><div class="product_qty" name="product_qty[]">'+1+'</div><div class="nota-subtotal">'+response.product_price * 1 +'</div><div class="product_del">X</div></div>');
				}
				
					//jalankan ajax appen function
					

				//subtotalodr();
				/* Running Grand Total Payment Function*/
				grandtotalodr();
				/*run dub_total function*/
				//sub_total();
				
			}
		});

		//return false;
	});


	/* Run all function */
	$('.main-nota').children().each(function(){
		$(this).on('change', function(){
			
			alert('ganti');

			//subtotalodr();
		});
	});

	$('body').on('DOMSubtreeModified', '.main-nota', function(){
		//alert('ada perubahan');
		
		//run sub total function
		subtotalodr();
	});

	$('.total-price').children().each(function(){
		$(this).on('change blur keyup keypress', function(){
			grandtotalodr();
		});
	});



	/* Run Pay Function*/
	$('.pay').click(function(){
		var data_name = [],
			data_qty = [],
			data_price = [],
			data_subtotal = [];
		$('.product_name').each(function(){
			var prod_name = $(this).text();

			data_name.push(prod_name);
		});

		alert(data_name.length);
	});

	/*---- end run all function */

	/* Third Party JS */
	// Mask Money Tempalate
	//$('.order-subtotal').maskMoney({thousands:'.', decimal:',', precision:0});

	/*function on select category*/
	$('li.p-list').on('click', function(){
		var data = $(this).attr('type');

		if(data == ""){
			$.ajax({
				type: 'post',
				url: 'pos/byAll',
				dataType: 'json',
				data: {'id':data},
				success: function(response){
					$('.grid-product').fadeOut('fast');
					$.each(response, function(key, val){
						if(Object.keys(val.id_product).length > 0){
							$('.list-product').append("<div class='grid-product'>"+val.product_name+"</div>");
						}
						else{
							$('.list-product').html("<h2>Not Found</h2>");
						}
					});
				}
			});
		}
		else{
			$.ajax({
			type: 'post',
			url: 'pos/byCategory',
			dataType: 'json',			
			data: {'id':data},
			success: function(response){
				$('.grid-product').fadeOut();
				$.each(response, function(key, val){
					//alert(val.id_product);
					//alert(key.length);
					if(Object.keys(val.id_product).length > 0){
						$('.list-product').append("<div class='grid-product'>"+val.product_name+"</div>");
					}
					else{
						$('.list-product').html("<h2>Product Not Found</h2>");
					}
					
					});
				}
			});
		}

		
	});

	
});
</script>
</body>
</html>
