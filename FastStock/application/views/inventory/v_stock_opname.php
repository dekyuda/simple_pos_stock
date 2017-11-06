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
	<h2>Stock Opname</h2>
	<a class="add-button" href="<?php echo base_url()?>inventory/add">
		<button><i class="fa fa-pencil"></i>
		Add New Opname</button>
	</a>	
</div>
<div class="content-main">
	<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:white;">
		<thead>
			<tr>
				<th>Code</th>
				<th>Trans Date</th>
				<th>Remark</th>
				<th>Type</th>
				<th>Status</th>
			</tr>	
		</thead>
		<tbody>
			<?php 
				foreach($opname->result() as $opn){?>
				<tr class="grid">
					<td><a href="<?php echo base_url()?>inventory/view/<?php echo $opn->id_stock_opname; ?>"><?php echo $opn->id_stock_opname; ?></td></a>
					<td><?php echo $opn->opname_date; ?></td>
					<td><?php echo $opn->remark; ?></td>
					<td><?php echo $opn->type_detail; ?></td>
					<td align="center"><?php echo "<button class='$opn->status'>".$opn->status."</button>"; ?></td>
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