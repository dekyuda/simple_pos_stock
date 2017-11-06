<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}


</style>
<?php
	$datacode = $product['id_product'];	

	if($datacode){
		$code_val = substr($datacode, 2);
		$code = (int)$code_val;
		$code = $code + 1;
		$auto_code = "P".str_pad($code, 4, "0", STR_PAD_LEFT);
	}
	else{
		$auto_code = "P0001";
	}
?>

<div id="content-wrapper">
<div class="content-top">
	<h2>Add New Product</h2>
	
</div>
<div class="content-main">
	<div class="product-image">
	</div>
	<div class="product-detail">
		<?php echo form_open('product/add');?>
			<div class="form-group">
				<label>Product Code</label>
				<input type="tex" class="form-control" name="product_id" value="<?php echo $auto_code; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Product Name</label>	
				<input type="text" required class="form-control" name="product_name" />
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="product_category" class="form-control">
				<?php foreach($category as $c){?>
					<option value="<?php echo $c->category_name; ?>"><?php echo $c->category_name; ?></option>
				<?php } ?>
				</select>
				
			</div>
			<div class="form-group">
				<label>Discryption</label>
				<textarea name="product_desc" class="form-control" id="summernote"></textarea>
			</div>
			<div class="form-group">
				<label>Cost</label>
				<input type="number" required class="form-control cost" name="product_cost" />
			</div>	
			<div class="form-group">
				<label>Price</label>
				<input type="number" required class="form-control price" name="product_price" />
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="file_image" class="file" />
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
		//$('table').fixedHeaderTable();

		$('#summernote').summernote();
	});
</script>