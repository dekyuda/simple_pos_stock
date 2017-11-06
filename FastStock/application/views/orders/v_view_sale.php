<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-purchase.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-purchview.css">
<link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url()?>asset/system/css/print-purchase.css"> 

<div id="content-wrapper">
	<div class="content-top">	
		<div class="top-title">
			<h2>Sale order</h2>
		</div>
		<div class="top-button">
			<button name="submit" class="print" align="right">
				<i class="fa fa-print"></i> Print
			</button>
			<button type="button" name="cancel" class="cancel"><a href="<?php echo base_url()?>purchase">Back</a></button>
		</div>
	</div>
	<div class="content-main">
		
			<div class="stock_in">
				<div class="stock-in-header">
					<div class="in-header">
						<div class="left">
							<b>SO Number</b>
						</div>
						<div class="right">
							<span><input type="text" readonly name="po_number" class="po_number" value="<?php echo $purchase['id_stock_out']; ?>"></span>
						</div>
					</div>
					<div class="in-header">
						<div class="left">
							<b>SO date</b>
						</div>
						<div class="right">
							<span>
								<div class="timepicker">	
								<input type="date" readonly name="po_date" class="po_date" value="<?php echo $purchase['trans_stock_out']?>">
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
							<span><input type="text" readonly name="po_supplier" class="po_supplier" value="<?php echo $purchase['custommer']?>"></span>
						</div>
					</div>
				</div><!--End stock_in_header-->

				<div class="stock-in-header2">	
					<div class="in-header2">
						<div class="left">
							<b>Delivery</b>
						</div>
						<div class="right">
							<span>
							<?php echo $purchase['delivery_status'] ?>
							</span>
						</div>
					</div>
					<div class="in-header2">
						<div class="left">
							<b>Payment</b>
						</div>
						<div class="right">
							<span>
								<?php echo $purchase['payment']?>
							</span>
						</div>
					</div>
					<div class="in-header2">
						<div class="left">
							<b>Remark</b>
						</div>
						<div class="right">
							<span><input type="text" readonly name="po_remark" class="po_remark" value="<?php echo $purchase['remark_stock_out']?>"></span>
						</div>
					</div>
				</div><!-- End stock_in_header2-->	
			</div> <!-- End Stock_in class-->

			<div class="stock-in-main">
				<div class="table">
					<div class="thead">
						<div class="cell cell10">No</div>
						<div class="cell cell1">Product Name</div>
						<div class="cell cell2">Category</div>
						<div class="cell cell3">Price</div>
						<div class="cell cell4">Qty</div>
						<div class="cell cell5">Unit</div>
						<div class="cell cell6">Sub Total</div>
						<div class="cell cell7">Disc(%)</div>
						<div class="cell cell8" align="center">Tax</div>
						<div class="cell cell9">Total</div>
					</div>
					
					<?php
						$no = 1;
						foreach($purchdetail->result() as $purch){

					?>
					<div class="tbody">	
						<div class="cell cell10">
							<?php echo $no; ?>
						</div>
						<div class="cell cell1">
							<?php echo $purch->product_name ?>
						</div>
						<div class="cell cell2">
						<input type="text" readonly counter="1" name="product_category[]" class="category counter1" value="<?php echo $purch->product_category?>">
						</div>
						<div class="cell cell3">
						<input type="text" readonly counter="1" name="product_cost[]" min="0" class="cost counter1" value="<?php echo number_format($purch->stock_price, 0, ",", ".")?>">
						</div>
						<div class="cell cell4">
							<input type="number" readonly counter="1" name="product_qty[]" min="0" class="qty counter1" value="<?php echo $purch->stock_out_qty ?>">
						</div>
						<div class="cell cell5">
							<input type="text" readonly counter="1" name="product_unit[]" class="unit counter1" value="Pcs">
						</div>
						<div class="cell cell6">
							<input type="text" readonly counter="1" name="sub_total[]" class="sub_total counter1" value="<?php echo number_format($purch->stock_out_subtotal, 0, ",", ".") ?>">
						</div>
						<div class="cell cell7">
							<input type="number" readonly counter="1" name="product_disc[]" class="disc counter1" min=0 max=100 value="<?php echo $purch->stock_out_disc ?>">
						</div>
						<div class="cell cell8" align="center">
							<?php
								if($purch->stock_out_tax > 0){
									?>
									<i class="fa fa-check"></i>
									<?php
								}
								else{
									?>
										<b>-</b>
									<?php
								}
							?>
						</div>
						<div class="cell cell9">
							<input type="text" readonly counter="1" name="total[]" class="total counter1" value="<?php echo number_format($purch->stock_out_total, 0, ",", ".") ?>">
						</div>
					</div> <!-- tbody -->
					<?php
						$no++;		
						}
					?>						
					
				</div> <!-- End table -->	
			</div> <!-- End Stock In Main -->	

			<div class="stock-in-footer">
				<div class="note">
					<label><b>Sale Note.</b></label>
					<textarea name="po_note" class="po_note" readonly><?php echo $purchase['stock_out_notes'] ?></textarea>
				</div>
				<div class="main-payment">
				<div class="pay">
					<div class="pay-title">
						<label>Sub Total</label>
					</div>
					<div class="pay-main">
						<b><input type="text" align="right" readonly name="po_sub_total" class="po_sub_total" align="right" value="<?php echo number_format($purchase['total_price'], 0, ",", ".")?>"></b>
					</div>
				</div>
				<div class="pay">
					<div class="pay-title">
						<label>Disc %</label>
					</div>
					<div class="pay-main">
						<b><input type="number" name="po_disc" readonly class="po_disc" value="<?php echo $purchase['disc']?>" min="0" max="100"></b>
					</div>	
				</div>	
				<div class="pay">
					<div class="pay-title">
						<label>Tax</label>
					</div>
					<div class="pay-main">
						<b><input type="text" readonly name="po_tax" class="po_tax_val" value="<?php echo number_format($purchase['tax'], 0, ",", ".")?>"></b>
					</div>	
				</div>
					
				<div class="pay">
					<div class="pay-title">
						<label>Delivery Cost</label>
					</div>	
					<div class="pay-main">
						<b><input type="text" name="po_delv" readonly class="po_delv" value="<?php echo number_format($purchase['delivery_cost'], 0, ",", ".")?>" min="0"></b>
					</div>
				</div>	
				<div class="pay grand">
					<div class="pay-title">
						<h3><label><b>Grand Total</b></label></h3>
					</div>
					<div class="pay-main">
						<h3><b><input type="text" name="po_grandtotal" readonly class="po_grandtotal" value="<?php
							$grand = $purchase['grand_total'];
						 	echo number_format($grand, 0, ",", ".")?>"></b></h3>
					</div>	
				</div>

				</div> <!-- Main Payment -->
			</div>
			<!-- Stock In Footer -->

		</div>
	</div>	
</div>

<!-- Print Paper -->
<div id="print">
	<div class="print-main">
		<div class="print-header">
			<div class="print-header-comp">
				<div class="comp-logo">
					<img class="comp-logo" src="<?php echo base_url()?>asset/images/profile/logos.png" />
				</div>
				<div class="comp-detail">
					<h3>Jln Tabanan</h3>
					<h3>098977</h3>
					<h3>email / phone</h3>
				</div>
			</div>
			<div class="print-header-purchase">
				<b>Purchase # <?php echo $purchase['id_stock_out']?></b><br>
				<b><?php echo $purchase['trans_stock_out']?></b><br>
				Custommer : <?php echo $purchase['custommer']." / ".$purchase['delivery_status'] ?><br>
				Payment By : <?php echo $purchase['payment']?><br>
				<b><h3>Rp. <?php echo number_format($purchase['grand_total'], 0, ",", ".") ?></h3></b>

			</div>
		</div>
		<div class="print-product">
			<div class="product-detail-print">
			<div class="print-product-header">
				<div class="tb1">Qty</div>
				<div class="tb2">Item</div>
				<div class="tb3">Unit Price (Rp.)</div>
				<div class="tb4">Discount</div>
				<div class="tb5">Tax</div>
				<div class="tb6">Amount (Rp.)</div>
			</div>
			<?php foreach($purchdetail->result() as $purchdet){
			?>
			<div class="print-product-detail">
				<div class="tb1 ppd" align="right"><?php echo $purchdet->stock_out_qty?> - Pcs</div>
				<div class="tb2 ppd"><?php echo $purchdet->product_name?></div>
				<div class="tb3 ppd"><?php echo number_format($purchdet->stock_price, 0, ",", ".") ?></div>
				<div class="tb4 ppd"><?php 
						echo $purchdet->stock_out_disc; 
					?> %</div>
				<div class="tb5 ppd"><?php 
					if($purchdet->stock_out_tax > 0){
						echo "<i class='fa fa-check'></i>";
					}
					else{
						echo "<b>-</b>";
					}
					?></div>
				<div class="tb6 ppd"><?php echo number_format($purchdet->stock_out_total, 0, ",", ".") ?></div>
			</div>
			<?php	
			}
			?>
			</div>
		</div>
		<div class="print-footer">
			<div class="footer-grandtotal">
				<div class="grand-title">
					<div class="gt1">SUBTOTAL</div>
					<div class="gt2">Discount</div>
					<div class="gt3">Tax</div>
					<div class="gt4">Delivery Cost</div>
					<div class="gt5">GRANDTOTAL</div>
				</div>
				<div class="grand-number">
					<div class="gt1"><?php echo number_format($purchase['total_price'], 0, ",", ".")?></div>
					<div class="gt2"><?php echo $purchase['disc']?> %</div>
					<div class="gt3"><?php echo number_format($purchase['tax'], 0, ",", ".") ?></div>
					<div class="gt4"><?php echo number_format($purchase['delivery_cost'], 0, ",", ".") ?></div>
					<div class="gt5"><?php echo number_format($purchase['grand_total'], 0, ",", ".") ?></div>
				</div>
			</div>
		</div>

		<div class="print-button">
			<button class="final-print">Print</button>
			<button class="cancel-print">Cancel</button>
		</div>
	</div>	
</div>

<script>
$(document).ready(function(){
	//$('*').add
	// For Discount
	$('.tb4.ppd').each(function(){
		var disc = $(this).parent().find('.tb4').val();
		//find class with same parent
		//alert(disc);
	});
	
	//For print
	$('#print').hide();

	$('.print').click(function(e){
		e.preventDefault();
		$('#print').show();
		$('body').css({
			'overflow' : 'hidden'
		});
		$('body, #print').animate({
			scrollTop : 0
		}, 200);
		return false;
	});

	$('button.cancel-print').click(function(e){
		e.preventDefault();

		$('#print').hide();
		$('body').css({
			'overflow' : 'auto'
		});
		return false;
	});

	$('button.final-print').click(function(e){
		e.preventDefault();

		/*$('#print').printArea({
			//mode : 'ifreame',
			extraCss : '<?php //echo base_url();?>asset/system/css/print-purchase.css',
			retainAttr : ['id', 'class', 'style']
		});*/

		//window.print();

		$('.print-main').printArea();

		return false;
	});
});
</script>