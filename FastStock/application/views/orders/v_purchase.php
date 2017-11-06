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
	<a class="add-button" href="<?php echo base_url()?>purchase/add">
		<button><i class="fa fa-pencil"></i>
		Add New Purchase</button>
	</a>	
</div>
<div class="content-main">
	<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:white;">
		<thead>
			<tr>
				<th>Code</th>
				<th>Trans Date</th>
				<th>Remark</th>
				<th>Total</th>
				<th>Status</th>
			</tr>	
		</thead>
		<tbody>
			<?php 
				foreach($purchase->result() as $purch){?>
				<tr class="grid">
					<td><a href="<?php echo base_url()?>purchase/view/<?php echo $purch->id_stock_in; ?>"><?php echo $purch->id_stock_in; ?></td></a>
					<td><?php echo $purch->trans_stock_in; ?></td>
					<td><?php echo $purch->remark_stock_in; ?></td><td><?php echo $purch->grand_total; ?></td>
					<td align="center"><?php echo "<button class='$purch->stock_in_status'>".$purch->stock_in_status."</buttom>"; ?></td>
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
		$('a.paginate_button').on('click', function(e){
			e.preventDefault();
			$('body').animate({
				scrollTop: 0
			});

			return false;
		});

	});
</script>