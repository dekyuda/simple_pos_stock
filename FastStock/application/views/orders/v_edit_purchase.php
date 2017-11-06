<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>asset/system/css/custom-purchase.css">

<div id="content-wrapper">
<?php echo form_open('purchase/add', array('id'=>'purchaseForm', 'class'=>'purchaseForm'));?>
<div class="content-top">	
	<div class="top-title">
		<h2>Purchase order</h2>
	</div>
	<div class="top-button">
		<input type="button" name="submit" class="submit" value="Posted"/>
		<!--input type="button" name="draft" class="save" value="Save as Draft"-->
		<button type="button" name="cancel" class="cancel"><a href="<?php echo base_url()?>purchase">Cancel</a></button>
	</div>
</div>

<div class="content-main">
	<div class="content-message">
		<!-- Place Message Success or Error Here -->
	</div>
	<div class="product-detail">
		
		<div class="stock-in">
			<div class="stock-in-header">
				<div class="in-header">
					<div class="left">
						<b>PO Number</b>
					</div>
					<div class="right">
						<span><input type="text" readonly name="po_number" class="po_number" value="<?php echo $purchase['id_stock_in'] ?>"></span>
					</div>
				</div>
				<div class="in-header">
					<div class="left">
						<b>PO date</b>
					</div>
					<div class="right">
						<span>
							<div class="timepicker">	
							<input type="date" name="po_date" class="po_date" value="<?php echo $purchase['trans_stock_in']?>">
								<!--<span class="input-group-addon">
									<span class="glyphicon-calendar glyphicon"></span>
								</span>	-->
							</div>
						</span>
					</div>
				</div>
				<div class="in-header">
					<div class="left">
						<b>Supplier</b>
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
						<div class="cell cell3">Cost</div>
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
					<label><b>PO Note.</b></label>
					<textarea id="summernote" name="po_note" class="po_note"></textarea>
				</div>
				<div class="pay">
					<div class="pay-title">
						<ul>
							<li><label>Sub Total</label></li>
							<li><label><input type="checkbox" name="po_tax_check" class="po_tax"> Tax</label></li>
							<li><label>Disc %</label></li>
							<li><label>Delivery Cost</label></li>
							<li><h3><label><b>Grand Total</b></label></h3></li>
						</ul>
					</div>
					<div class="pay-main">
						<ul>
							<li><input type="number" readonly name="po_sub_total" class="po_sub_total" align="right" value="0"></li>
							<li><input type="number" readonly name="po_tax" class="po_tax_val" value="0"></li>
							<li><input type="number" name="po_disc" class="po_disc" value="0" min="0" max="100"></li>
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
