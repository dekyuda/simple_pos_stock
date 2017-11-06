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
	<h2>Product</h2>
	<a class="add-button" href="product/add">
		<button><i class="fa fa-pencil"></i>
		Add Product</button>
	</a>	
</div>
<div class="content-main">
	<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:white;">
		<thead>
			<tr>
				<th>Code</th>
				<th>Product Name</th>
				<th>category</th>
				<th>Order Price</th>
				<th>Sale price</th>
				<th>Stock</th>
				<th>Status</th>
			</tr>	
		</thead>
		<tbody>
			<?php 
				foreach($stock->result() as $stck){?>
				<tr class="grid">
					<td><a href="product/edit/<?php echo $stck->id_product; ?>"><?php echo $stck->id_product; ?></td></a>
					<td><?php echo $stck->product_name; ?></td>
					<td><?php echo $stck->product_category; ?></td><td><?php echo $stck->product_cost; ?></td>
					<td><?php echo $stck->product_price; ?></td>
					<td>
						<?php 
							if($stck->in_qty == Null) {
								$stck->in_qty = 0;
							}
							if($stck->out_qty == Null){
								$stck->out_qty = 0;
							}
							if($stck->opname_qty == Null){
								$stck->opname_qty = 0;
							}
							
							$stock_total = $stck->in_qty - $stck->out_qty + $stck->opname_qty;	

							echo $stock_total; 
						?>						
					</td>
					<td align="center"><?php echo "<button class='$stck->product_status'>".$stck->product_status."</buttom>"; ?></td>
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