<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}
</style>
<?php
	$datacode = $cat['id_category'];	

	if($datacode){
		$code_val = substr($datacode, 4);
		$code = (int)$code_val;
		$code = $code + 1;
		$auto_code = "CAT".str_pad($code, 4, "0", STR_PAD_LEFT);
	}
	else{
		$auto_code = "CAT0001";
	}
?>

<div id="content-wrapper">
<div class="content-top">
	<h2>Add New category</h2>
	
</div>
<div class="content-main">
	<div class="product-image">

	</div>
	<div class="product-detail">
		<?php echo form_open('category/add');?>
			<div class="form-group">
				<input type="tex" class="form-control" name="category_id" value="<?php echo $auto_code; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Category Name</label>	
				<input type="text" required class="form-control" name="category_name" />
			</div>
			
			<div class="form-group">
				<label>Discryption</label>
				<textarea name="category_desc" class="form-control" id="summernote"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Save"/>
				<a class="btn btn-danger" href="<?php echo base_url().'category'?>">Cencel</a>
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