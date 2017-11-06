<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}
</style>


<div id="content-wrapper">
<div class="content-top">
	<h2>Detail category</h2>
	<h4>IDs : <?php echo $category['id_category'] ?></h4>
</div>
<div class="content-main">
	<div class="product-detail">
		<?php echo form_open('category/edit');?>
			<input type="hidden" name="category_id" value="<?php echo $category['id_category']?>" readonly>
			<div class="form-group">
				<label>category Name</label>	
				<input type="text" required class="form-control" name="category_name" value="<?php echo $category['category_name'] ?>" />
			</div>
			<div class="form-group">
				<label>Discryption</label>
				<textarea name="category_desc" class="form-control" id="summernote"><?php echo $category['category_desc'] ?></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Save"/>
				<a class="btn btn-danger" href="<?php echo base_url().'category/delete/'.$category['id_category'] ?>">Delete</a>
				<a class="btn btn-primary" href="<?php echo base_url().'category'?>">Cencel</a>

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