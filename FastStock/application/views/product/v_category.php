<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}

#data-table{
	background-color: white;
}


</style>


<div id="content-wrapper">
<div class="content-top">
	<h2>Category</h2>
	<a class="add-button" href="category/add">
		<button><i class="fa fa-pencil"></i>
		Add Category</button>
	</a>	
</div>
<div class="content-main">
	<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:white;">
		<thead>
			<tr>
				<th>Code</th>
				<th>Category Name</th>
				<th>Description</th>
			</tr>	
		</thead>
		<tbody>
			<?php 
				foreach($category->result() as $cat){?>
				<tr class="grid">
					<td><a href="category/edit/<?php echo $cat->id_category; ?>"><?php echo $cat->id_category; ?>
						</a>
					</td>
					<td><?php echo $cat->category_name; ?></td>
					<td><?php echo $cat->category_desc; ?></td>
				</tr>
			<?php	
				}
			?>
				

		</tbody>
	</table>

</div>
</div><!--div end content wrapper-->

<script>
	$(document).ready(function(){
		$('#data-table').dataTable();

		//$('table').fixedHeaderTable();
		//$('#data-table').freezeHeader();
		
		//$('table').freezeHeader({
		//	'offset' : '200px'
		//});

	});
</script>