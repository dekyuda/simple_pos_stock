<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>asset/system/css/custom-opname.css">

<?php
	$code = $opname['id_stock_opname'];

	if($code){
		$datacode = substr($code, 4);
		$newcode = (int)$datacode;
		$newcode = $newcode + 1;
		$auto_code = "OPN-".STR_PAD($newcode, 4, "0", STR_PAD_LEFT);
	}
	else{
		$auto_code = "OPN-0001";
	}
?>

<div id="content-wrapper">
	<div class="message">
		<!-- Place a Message -->
	</div>
	<div class="content-top">
		<div class="top-title">
			<h2>Stock Opname</h2>
		</div>
		<div class="top-button">
			<button name="submit" class="submit"><i class="fa fa-check"></i> Submit</button>
			<!--input type="button" name="draft" class="save" value="Save as Draft"-->
			<button type="button" name="cancel" class="cancel"><a href="<?php echo base_url()?>inventory"><i class="fa fa-close"></i> Cancel</a></button>
		</div>
	</div>

	<div class="content-main">
		<div class="content-message">
			<!-- Place Message Success or Error Here -->
		</div>

		<div class="opaname">
			<div class="opname-header">
				<div class="header-title">
					<b><h3>Stock Opname #<?php echo "<div class='op-id'>".$auto_code."</div>" ?></h3></b> 
				</div>
				<div class="form-group">
					<div class="title">	
						Opname Date
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">					 
						<input type="date" class="opn-date">
					</div>	
				</div>
				<div class="form-group">
					<div class="title">
						Remark
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">
						<input type="text" class="opn-remark">
					</div>	
				</div>
				<div class="form-group">
					<div class="title">
						Type By
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">		 
						<select name="opn-type" class="opn-type">
							<option value="Product">All Product</option>
							<option value="Category">Category</option>
						</select>
						<select name="type-detail" class="type-detail">
							<?php 
								foreach($category->result() as $cat){
									echo "<option value='".$cat->category_name."'>$cat->category_name</option>";
								}
							?>
						</select>
					</div>	
				</div>
				<div class="form-group button">	
					<button class="generate">Process</button>	
				</div>			
			</div>
			<div class="opname-main">
				<div class="tb-opname">
					<div class="tb-head">
						<div class="cell1">Product Code</div>
						<div class="cell2">Product Name</div>
						<div class="cell3" align="center">Qty<br>(System)</div>
						<div class="cell4" align="center">Qty<br>(Real)</div>
						<div class="cell5">Difference</div><!-- selisih-->
						<div class="cell6">Text</div><!-- Keterang -->

					</div>
					<div class="tb-body">
					</div>
				</div>
			</div>
		</div>


	</div>
	<!-- End Content Main -->
</div>

<script>
$(document).ready(function(){
	$('.opn-type').on('change', function(e){
		e.preventDefault()

		//alert('bisa di click');
	});

	$('.generate').click(function(e){
		e.preventDefault();
		var date = $('.opn-date').val();
		var type = $('.opn-type').val();
		var typeDetail = $('.type-detail').val();

		var data;

		if(type == 'by_category'){
			data = {'date':date, 'type':typeDetail};
			$.ajax({
				type: "post",
				data: data,
				dataType: 'html',
				url: '<?php echo base_url()?>inventory/addNewCat',
				success: function(data){
					$('.tb-body').html(data);
				}
			});	
		}
		else{
			data = 'date='+date;
			$.ajax({
				type: "post",
				data: data,
				dataType: 'html',
				url: '<?php echo base_url()?>inventory/addNew',
				success: function(data){
					$('.tb-body').html(data);
					
				}
			});	
		}

		
		
		return false;
	});

	$('select.opn-type').click(function(){
		var select = $(this).val();

		if(select == 'Category'){
			$('select.type-detail').css({
				'display' : 'inline-block'
			});
		}
		else{
			$('select.type-detail').css({
				'display' : 'none'
			});
		}
	});

	/* Change real qty to get difference*/
	$('.realqty').on('change keyup', function(){
		
		//alert('bisa di clik');
	});


	/* SUBMIT BUTTON */
	$('.submit').click(function(e){
		e.preventDefault();

		/*Variable for Opname*/
		var id = $('.op-id').text(),
			date = $('.opn-date').val(),
			remark = $('.opn-remark').val(),
			type = $('.opn-type').val(),
			typeDetail;

		/* Variable for Detail Opname*/
		var id_product = [],
			sys_qty = [],
			real_qty = [],
			desc = [];

		if(type == 'Product'){
			typeDetail = 'All';
		}
		else{
			typeDetail = $('.type-detail').val();
		}	

		//alert(id+' '+date+' '+remark+' '+type+' '+typeDetail);
		//alert(typeDetail);

		$('.cell1.main').each(function(){
			var id_product_as = $(this).text();

			id_product.push(id_product_as);
		});

		// Cell two dont call

		$('.sysqty').each(function(){
			var sys_qty_as = $(this).text();

			sys_qty.push(sys_qty_as);
		});


		$('.realqty').each(function(){
			var real_qty_as = $(this).val();

			real_qty.push(real_qty_as);
		});

		$('.textval').each(function(){
			var desc_as = $(this).val();

			desc.push(desc_as);
		});


		//alert(id_product+' '+sys_qty+' '+real_qty+' '+desc);

		var data = {'id':id, 'date':date, 'remark':remark, 'type':type, 'typeDetail':typeDetail, 'id_product':id_product, 'sys_qty':sys_qty, 'real_qty':real_qty, 'desc':desc};


		/* Run Ajax*/
		$.ajax({
			type: 'post',
			url: 'insertopname',
			dataType: 'json',
			data: data,
			success: function(response){
				if(response.status == false){
					//alert(response.message);
					$('.message').html("<div class='message-error'>"+response.message+"</div>");
					$('body').animate({
						scrollTop: 0
						
					});
					setTimeout(function(){
						$('.message-error').fadeOut('slow');
						$('.message-error').remove();
					}, 1100);
					
				}else{
					//alert(response.message);
					$('.message').html("<div class='message-success'>"+response.message+"</div>");
					$('body').animate({
						scrollTop: 0
						
					});
					setTimeout(function(){
						window.location.href = "<?php echo base_url()?>inventory/";
					}, 900);
					
				}
			},
			error: function(jqXHR, textStatus, errorThrown){

			}
		});

		return false;
	})

});
</script>