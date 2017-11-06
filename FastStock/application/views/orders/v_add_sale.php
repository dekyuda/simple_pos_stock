<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>asset/system/css/custom-purchase.css">


<?php
	$datacode = $purchase['id_stock_out'];	

	if($datacode){
		$code_val = substr($datacode, 4);
		$code = (int)$code_val;
		$code = $code + 1;
		$auto_code = "SO-".str_pad($code, 4, "0", STR_PAD_LEFT);
	}
	else{
		$auto_code = "SO-0001";
	}
?>

<div id="content-wrapper">
<?php echo form_open('sale/add', array('id'=>'saleForm', 'class'=>'saleForm'));?>
<div class="content-top">	
	<div class="top-title">
		<h2>Sale order</h2>
	</div>
	<div class="top-button">
		<input type="button" name="submit" class="submit" value="Posted"/>
		<!--input type="button" name="draft" class="save" value="Save as Draft"-->
		<button type="button" name="cancel" class="cancel"><a href="<?php echo base_url()?>sale">Cancel</a></button>
	</div>
</div>

<div class="content-main">
	<div class="content-message">
		<!-- Place Message Success or Error Here -->
	</div>
			
		<div class="stock-in">
			<div class="stock-in-header">
				<div class="in-header">
					<div class="left">
						<b>SO Number</b>
					</div>
					<div class="right">
						<span><input type="text" readonly name="po_number" class="po_number" value="<?php echo $auto_code; ?>"></span>
					</div>
				</div>
				<div class="in-header">
					<div class="left">
						<b>SO date</b>
					</div>
					<div class="right">
						<span>
							<div class="timepicker">	
							<input type="date" name="po_date" class="po_date">
								<!--<span class="input-group-addon">
									<span class="glyphicon-calendar glyphicon"></span>
								</span>	-->
							</div>
						</span>
					</div>
				</div>
				<div class="in-header">
					<div class="left">
						<b>Custommer</b>
					</div>
					<div class="right">
						<span><input type="text" name="po_supplier" class="po_supplier"></span>
					</div>
				</div>
			</div>
			<div class="stock-in-header2">	
				<div class="in-header2">
					<div class="left">
						<b>Delivery</b>
					</div>
					<div class="right">
						<span>
						<select name="po_delivery" class="po_delivery">
							<option value="">  </option>				
							<option value="delivery">Delivery</option>
							<option value="non">Non Delivery</option>
						</select>
						</span>
					</div>
				</div>
				<div class="in-header2">
					<div class="left">
						<b>Payment</b>
					</div>
					<div class="right">
						<span>
							<select name="po_payment" class="po_payment">
								<option value="">None</option>
								<?php
									foreach($payment->result() as $pay){
										echo "
											<option value='$pay->pay_name'>$pay->pay_name</option>
										";
									}
								?>
							</select>
						</span>
					</div>
				</div>
				<div class="in-header2">
					<div class="left">
						<b>Remark</b>
					</div>
					<div class="right">
						<span><input type="text" name="po_remark" class="po_remark"></span>
					</div>
				</div>
			</div>


			<div class="stock-in-main">
				<div class="table">
					<div class="thead">
						<div class="cell cell1">Product Name</div>
						<div class="cell cell2">Category</div>
						<div class="cell cell3">Price</div>
						<div class="cell cell4">Qty</div>
						<div class="cell cell5">Unit</div>
						<div class="cell cell6">Sub Total</div>
						<div class="cell cell7">Disc(%)</div>
						<div class="cell cell8" align="center">Tax</div>
						<div class="cell cell9">Total</div>
						<div class="cell cell10"> </div>
					</div>
					<div class="tbody" counter="1">
						<div class="cell cell1">
							<select name="product_name[]" counter="1" class="product_name counter1">
								<option value=""></option>
								<?php foreach($product->result() as $p){
									echo "
										<option value='$p->id_product'>
											$p->product_name
										</option>
									";
								}?>
							</select>
						</div>
						<div class="cell cell2">
						<input type="text" readonly counter="1" name="product_category[]" class="category counter1">
						</div>
						<div class="cell cell3">
						<input type="number" counter="1" name="product_cost[]" min="0" class="cost counter1">
						</div>
						<div class="cell cell4">
							<input type="number" counter="1" name="product_qty[]" min="0" class="qty counter1">
						</div>
						<div class="cell cell5">
							<input type="text" readonly counter="1" name="product_unit[]" class="unit counter1">
						</div>
						<div class="cell cell6">
							<input type="text" readonly counter="1" name="sub_total[]" class="sub_total counter1">
						</div>
						<div class="cell cell7">
							<input type="number" counter="1" name="product_disc[]" class="disc counter1" min=0 max=100>
						</div>
						<div class="cell cell8" align="center">
							<input type="checkbox" counter="1" name="tax[]" class="tax counter1">
						</div>
						<div class="cell cell9">
							<input type="text" readonly counter="1" name="total[]" class="total counter1">
						</div>
						<div class="cell cell10  counter1" counter="1" align="center"><b class="counter1">x</b></div>
					</div>

					<div class="tbody" counter="2">
						<div class="cell cell1">
							<select name="product_name[]" counter="2" class="product_name counter2">
								<option value=""></option>
								<?php foreach($product->result() as $p){
									echo "
										<option value='$p->id_product'>
											$p->product_name
										</option>
									";
								}?>
							</select>
						</div>
						<div class="cell cell2">
						<input type="text" readonly counter="2" name="product_category[]" class="category counter2">
						</div>
						<div class="cell cell3">
						<input type="number" counter="2" name="product_cost[]" min="0" class="cost counter2">
						</div>
						<div class="cell cell4">
							<input type="number" counter="2" name="product_qty[]" min="0" class="qty counter2">
						</div>
						<div class="cell cell5">
							<input type="text" readonly counter="2" name="product_unit[]" class="unit counter2">
						</div>
						<div class="cell cell6">
							<input type="text" readonly counter="2" name="sub_total[]" class="sub_total counter2">
						</div>
						<div class="cell cell7">
							<input type="number" counter="2" name="product_disc[]" class="disc counter2" min=0 max=100>
						</div>
						<div class="cell cell8" align="center">
							<input type="checkbox" counter="2" name="tax[]" class="tax counter2">
						</div>
						<div class="cell cell9">
							<input type="text" readonly counter="2" name="total[]" class="total counter2">
						</div>
						<div class="cell cell10  counter2" counter="2" align="center"><b class="counter2">x</b></div>
					</div>

				</div><!-- end div class table-->

				<div class="table-add">
					<button type="button" class="add-table">+ | Add</button>
				</div>

			</div>
			<!--end div stock in main-->

			<div class="stock-in-footer">
				<div class="note">
					<label><b>SO Note.</b></label>
					<textarea id="summernote" name="po_note" class="po_note"></textarea>
				</div>
				<div class="pay">
					<div class="pay-title">
						<ul>
							<li><label>Sub Total</label></li>
							<li><label>Disc %</label></li>
							<li><label><input type="checkbox" name="po_tax_check" class="po_tax"> Tax</label></li>
							<li><label>Delivery Cost</label></li>
							<li><h3><label><b>Grand Total</b></label></h3></li>
						</ul>
					</div>
					<div class="pay-main">
						<ul>
							<li><input type="number" readonly name="po_sub_total" class="po_sub_total" align="right" value="0"></li>
							<li><input type="number" name="po_disc" class="po_disc" value="0" min="0" max="100"></li>
							<li><input type="number" readonly name="po_tax" class="po_tax_val" value="0"></li>
							<li><input type="number" name="po_delv" class="po_delv" value="0" min="0"></li>
							<li><h3><b><input type="number" name="po_grandtotal" readonly class="po_grandtotal" value="0"></b></h3></li>
						</ul>
					</div>	
				</div>
			</div>
	
		</div>
		<!--end div stock-in-->				
		
	</div>

</div>
<?php echo form_close();?>
</div><!--div end content wrapper-->

<script>
	$(document).ready(function(){

		/* Format Price */
		/*$('.cost').priceFormat({
			prefix: '',
			thousandsSeparator:'.',
			centsLimit: 0
		});*/

		/* Declare a Function */

		// On Product
		function purchase_amount(){
			var sum = 0;
			$('.total').each(function(){
				var cont = $(this).attr('counter');
				var sub_total = $('.sub_total.counter'+cont).val();
				var disc = $('.disc.counter'+cont).val();
				var total = parseInt(sub_total) - parseInt(disc);
				$(this).val(total);
			});
		};

		// On Nota
		function purchase_subtotal(){
			var sum = 0;

			$('.total').each(function(){
				var total = $(this).val();
				sum += Number(total);
				
			});
			//alert(sum);
			$('.po_sub_total').val(sum);

			return false;
			
		};

		function purchase_grandtotal(){
			var grand = 0,
				sub = $('.po_sub_total').val(),
				delv = $('.po_delv').val(),
				tax = 0,
				disc_val = $('.po_disc').val(),
				disc = (disc_val/100)*sub;

			if($('.po_tax').prop('checked') == true){
				tax = 10/100 * (parseInt(sub) - parseInt(disc));
				$('.po_tax_val').val(tax);
			}
			else{
				$('.po_tax_val').val(tax);
			}
			grand = parseInt(sub)+parseInt(delv)+parseFloat(tax)-parseInt(disc);

			$('.po_disc').val(disc_val);

			$('.po_grandtotal').val(grand);

			return false;	

		};

		// Change on PO tax || Convert from checkbox into value
		$('.po_tax').change(function(){
			var po_grand;
			if($('.po_tax').prop('checked') == true){
				var po_sub = $('.po_sub_total').val(),
					po_dis = $('.po_disc').val(),
					dis_val = (po_dis/100)*po_sub;

					po_sub = parseInt(po_sub) - parseInt(dis_val);

				po_grand = 10/100*po_sub;
				$('.po_tax_val').val(po_grand);
			}
			else{
				$('.po_tax_val').val(0);
			}

			purchase_grandtotal();

		});

				
		/* This for JS function for transaction*/
		//$('table').fixedHeaderTable();
		//var grandtotal = 10000;
		//$('.total').val(grandtotal);

		// temp i variable to set countinues counter on Input Field
		//var i = $('.tbody').size();


		//for tax checked 
		$('.tbody').delegate('.cell', 'change keyup keypress', function(){
			var click = $(this).find('.tax'),
				counter = $(this).find('.tax').attr('counter');

					
			if(click.prop('checked') == true){
				
				//$('.total').val('10');
				//var total = $('.total').val()
				var total = $('.sub_total.counter'+counter).val();
				var discontax = $('.disc.counter'+counter).val();
				var disconval = total - parseInt((discontax/100)*total);		
				var taxtotal = 10/100*disconval;
				subtotal = parseInt(taxtotal)+parseInt(disconval);
				$('.total.counter'+counter).val(subtotal);

				//alert(disconval+" "+taxtotal);
				purchase_subtotal();
				purchase_grandtotal();			
			}
			else{
				var total = $('.sub_total.counter'+counter).val();
				var discontax = $('.disc.counter'+counter).val();
				total = total - ((discontax/100)*total);		
				$('.total.counter'+counter).val(total);	

				purchase_subtotal();
				purchase_grandtotal();
			}
			
		});

		
		//for select product name
		$(document).on('change keyup keypress', '.product_name', function(){
			//e.prevenDefault();
			var val = $(this).val();
			var counter = $(this).attr('counter');
			
			//alert(myData);

			//untuk code ajax ketika berhasil select data
			//from database ?

			//$('.cost.counter'+counter).val(50000);
			//$('.qty.counter'+counter).val(1);			

			//ajax function for get data from database product
			$.ajax({
				dataType: 'json',
				url: '<?php echo base_url()?>sale/product',
				type: 'post',
				data: {id_product: val},
				success: function(response){
					$('.cost.counter'+counter).val(response.price);
					$('.category.counter'+counter).val(response.category);
					$('.qty.counter'+counter).val(1);
					$('.unit.counter'+counter).val('pcs');
					$('.disc.counter'+counter).val(0);

					/*var parsed = JSON.parse(response);
					console.log(parsed);
               		console.log(parsed.status);
                	console.log(parsed.json());
                	console.log(parsed.text());*/

                	//parse value from cost and qty
					var cost = $('.cost.counter'+counter).val(),
						qty = $('.qty.counter'+counter).val();

						
					//calculate a subtotal	
					var subTot = cost * qty;	
					$('.sub_total.counter'+counter).val(subTot);
					$('.total.counter'+counter).val(subTot);
					purchase_subtotal();
					purchase_grandtotal();

				},
				error: function(xhr, textStatus, error){
      				console.log(xhr.statusText);
      				console.log(textStatus);
      				console.log(error)
      			}	
			});

			

		});

		//for change product cost
		$('.cost').on('change keyup', function(){
			var counter = $(this).attr('counter'),
				qty = $('.qty.counter'+counter).val(),
				cost = $(this).val();
				
			//generate value to default
			$('.disc.counter'+counter).val(0);
			$('.tax.counter'+counter).prop('checked', false);
				
			var new_total = parseInt(cost)*parseInt(qty);
			$('.sub_total.counter'+counter).val(new_total);	
			$('.total.counter'+counter).val(new_total);
			//purchase_amount();
			purchase_subtotal();
			purchase_grandtotal();
		});


		//for change quantity
		$('.qty').on('change keyup', function(){
			var counter = $(this).attr('counter'),
				cost = $('.cost.counter'+counter).val(),
				qty = $(this).val();

			//generate value to default
			$('.disc.counter'+counter).val(0);
			$('.tax.counter'+counter).prop('checked', false);

			//generate new total value
			var new_total = parseFloat(cost)*parseFloat(qty);
			$('.sub_total.counter'+counter).val(new_total);
			$('.total.counter'+counter).val(new_total);	
			purchase_subtotal();
			purchase_grandtotal();
		});

		//for discount
		$('.disc').on('change keyup', function(){
			var counter = $(this).attr('counter'),
				sub_total = $('.sub_total.counter'+counter).val(),
				disc = $(this).val(),
				taxondisc = $('.tax.counter'+counter).prop('checked'),
				taxvalue = 0;

				if(taxondisc == true){
					taxvalue = 10/100;
				}

			var new_disc = disc/100*sub_total;	
			var new_total = parseFloat(sub_total)-parseFloat(new_disc);
			var new_tax = taxvalue*new_total;

			new_total = parseInt(new_total) + parseInt(new_tax);

			$('.total.counter'+counter).val(new_total);	
			purchase_subtotal();
			purchase_grandtotal();
		});

		
		//sum grand total
				
		//fungsi menambah input field
		var i = 3;
		var j = 2;
		$('.add-table').click(function(){
			//var i = $('.table .tbody').size();
			
			$.ajax({
				type: 'post',
				data: {is: i},
				dataType: 'html',
				url: '<?php echo base_url()?>purchase/option',
				success: function(data){
					$('.table').append(data);
					i++;
					j++;
				}
			});
											
			return false;
		});


		
		//remove new div field input
		$(document).on('click', '.cell.cell10', function(){
			
			var counter = $(this).attr('counter');
			if(j >= 3){
				$(this).parents('.tbody').remove();
				j--;
				purchase_subtotal();
				purchase_grandtotal();
			}
			else{
				$('.product_name.counter'+counter).val('');
				$('.category.counter'+counter).val('');
				$('.cost.counter'+counter).val('');
				$('.unit.counter'+counter).val('');
				$('.qty.counter'+counter).val('');
				$('.sub_total.counter'+counter).val('');
				$('.disc.counter'+counter).val('');
				$('.tax.counter'+counter).val('');
				$('.total.counter'+counter).val('');
				purchase_subtotal();
				purchase_grandtotal();
			}

			//return false();
		});

		//cheked for po_tax

		//Run all function when div parent child is changed
		$('.tbody').children().each(function(){
			$(this).on('keyup keypress change blur', function(){
				//alert('value changed');

				/*please run all function here*/
				/* function like purchase sub total, grand total etc* */
			});
		});

		//run all function on pay class
		$('.pay').children().each(function(){
			$(this).on('keyup change blur', function(){
				purchase_grandtotal();	
			});
		});

		//function for enter on input field
		$('input').keydown(function(){
			$(this).find().next('input').focus();
		});
		
		
		/* This JS function for style and design*/
		$('#summernote').summernote({
			minHeight: 100,
			maxHeight: 100
		});

		/* Call function automatic */
		//purchase_subtotal();

		/*function click for redirect*/
		

		//submited from form
		$('.submit').click(function(e){
			e.preventDefault();
			//alert($(this).attr('name'));

			var clickName = $(this).attr('name');

			if(clickName == 'submit'){
				//var myDataForm = $('#purchaseForm').serialize();
				var po_number = $('.po_number').val(),
					iset = clickName,
					po_date = $('.po_date').val(),
					po_remark = $('.po_remark').val(),
					po_supplier = $('.po_supplier').val(),
					po_delv = $('.po_delivery').val(),
					po_pay = $('.po_payment').val(),
					po_total = $('.po_sub_total').val(),
					po_tax = $('.po_tax_val').val(),
					po_disc = $('.po_disc').val(),
					po_delv_cost = $('.po_delv').val(),
					po_notes = $('.po_note').val();

					

				//check tax value	
				// variable for array	
				var id_product = [],
					stock_cost = [],
					stock_in_qty = [],
					stock_in_tax = [],
					stock_in_disc = [];

				var product_count = 0;	

					$('.product_name').each(function(){
						var id_product_as = $(this).val();			
							
						if(id_product_as == '' || id_product_as == null){
							//alert('ada kosong');
						}
						else{
							id_product.push(id_product_as);
							product_count += 1;
							
						}
					});

					$('.cost').each(function(){
						var stock_cost_as;

						if($(this).val() == 0){
							stock_cost_as = '';
							stock_cost.push(stock_cost_as);
						}
						else if($(this).val() == ''){
							//stock_cost_as = 0;
							// DOn't Do Enything
						}
						else{
							stock_cost_as = $(this).val();
							stock_cost.push(stock_cost_as);
						}

						
					});

					$('.qty').each(function(){
						var stock_qty_as = $('.qty').val();

						stock_in_qty.push(stock_qty_as);
							
					});

					$('.tax').each(function(){
						var stock_tax_as = $(this).prop('checked');

						if(stock_tax_as == true){
							stock_tax_as = 1;
						}
						else{
							stock_tax_as = 0;
						}

						stock_in_tax.push(stock_tax_as);
																		
					});

					
					$('.disc').each(function(){
						var stock_disc_as = $('.disc').val();
						stock_in_disc.push(stock_disc_as);
					});

					//alert(stock_cost);
					//alert(po_notes);
					//alert(po_number);
					//alert(stock_in_tax[0]);
					

				var myDataForm = {'id_purchase':po_number,'po_date':po_date,'po_remark':po_remark,'po_supplier':po_supplier,'po_delivery':po_delv,'po_payment':po_pay,'po_total':po_total,'po_tax':po_tax,'po_disc':po_disc,'po_notes':po_notes,
					'po_delv_cost':po_delv_cost,'issetType':iset,'id_product':id_product,'product_cost':stock_cost,'product_qty':stock_in_qty,'product_tax':stock_in_tax,'product_disc':stock_in_disc};

				//alert(myDataForm);

				// can i parse form srialize with button click function js
				$.ajax({
					type: 'POST',
					data: myDataForm,
					dataType: 'json',
					url: 'addInsert',
					success: function(response){
						if(response.status == false){
							//$.each(response.message, function(i, value)){
							$('body').animate({
								scrollTop: 0
							});	
							$('.content-message').append('<div class="error-message"><h2>'+response.message+'</h2></div>');

								setTimeout(function(){
									$('.error-message').fadeOut();
									$('.error-message').remove();
								}, 1500);
							//}							
						}
						else{
							$('body').animate({
								scrollTop: 0
							});
							$('.content-message').append('<div class="success-message"><h2>'+response.message+'</h2></div>');

							setTimeout(function(){
								$('.success-message').fadeOut(500);
								window.location.href = "<?php echo base_url()?>sale/";
							}, 700);

							
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						console.log(textStatus);
					}
				});
			}

			return false;
		})
		

	});


</script>

<script>
	$(document).ready(function(){
		$('#purchaseForm').submit(function(event){
			event.prevenDefault();

			$.ajax({
				type: 'post',
				url: 'purchase/add',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(response){
					if(response.status == false){
						console.log(response.message);
					}
				}
			});

			return false;
		});
	});
</script>