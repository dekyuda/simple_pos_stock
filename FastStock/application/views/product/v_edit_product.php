<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}
</style>


<div id="content-wrapper">
<div class="content-top">
	<h2>Detail Product</h2>
	<h4>SKU : <?php echo $record['id_product'] ?></h4>
</div>
<div class="content-main">
	<div class="product-image">

	</div>
	<div class="product-detail">
		<?php echo form_open('product/edit');?>
			<input type="hidden" name="product_id" value="<?php echo $record['id_product']?>" readonly>
			<div class="form-group">
				<label>Product Name</label>	
				<input type="text" required class="form-control" name="product_name" value="<?php echo $record['product_name'] ?>" />
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="product_category" class="form-control">
				<?php foreach($category as $c){?>
					<option value="<?php echo $c->category_name; ?>" <?php echo $record['product_category'] == $c->category_name?'selected':'' ?>><?php echo $c->category_name; ?></option>
				<?php } ?>
				</select>
				
			</div>
			<div class="form-group">
				<label>Discryption</label>
				<textarea name="product_desc" class="form-control" id="summernote"><?php echo $record['product_desc'] ?></textarea>
			</div>
			<div class="form-group">
				<label>Cost</label>
				<input type="number" required class="form-control" name="product_cost" value="<?php echo $record['product_cost'] ?>" />
			</div>	
			<div class="form-group">
				<label>Price</label>
				<input type="number" required class="form-control" name="product_price" value="<?php echo $record['product_price'] ?>" />
			</div>
			<div class="form-group">
				<label>Stock</label>
				<input class="form-control" type="text" required readonly value='<?php
					if($stockin['stock_in_qty'] == Null){
						$stockin['stock_in_qty'] = 0;
					}
					if($stockout['stock_out_qty'] == Null){
						$stockout['stock_out_qty'] = 0;
					}
					if($stockopname['opname_qty'] == Null){
						$stockopname['opname_qty'] = 0;
					}

					$stocktotal = $stockin['stock_in_qty'] - $stockout['stock_out_qty'] + $stockopname['opname_qty'];					
					
					echo $stocktotal

				?>'>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Save"/>
				<a class="btn btn-danger" href="<?php echo base_url().'product'?>">Cencel</a>
			</div>			
		<?php echo form_close();?>
	</div>

</div>
</div><!--div end content wrapper-->

<script>
	$(document).ready(function(){
		$('#data-table').dataTable();

		//$('table').fixedHeaderTable();

		$('#summernote').summernote();
	});
</script>