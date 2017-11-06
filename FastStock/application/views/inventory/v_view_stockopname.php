<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>asset/system/css/custom-opname.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-opnameview.css">
<link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url()?>asset/system/css/print-opname.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-opname.css">
<style>
#print{
	display: block;
	position: fixed;
	width: 100%;
	height: auto;
	top: 0%;
	bottom: 0;
	margin: auto;
	background-color: rgba(0, 0, 0, 0.7);
	z-index: 10010;
	overflow: auto;
	opacity: 1;
}
</style>

<div id="content-wrapper">
	<div class="message">
		<!-- Place a Message -->
	</div>
	<div class="content-top">
		<div class="top-title">
			<h2>Stock Opname</h2>
		</div>
		<div class="top-button">
			<button name="submit" class="submit"><i class="fa fa-print"></i> Print</button>
			<!--input type="button" name="draft" class="save" value="Save as Draft"-->
			<button type="button" name="cancel" class="cancel"><a href="<?php echo base_url()?>inventory"><i class="fa fa-back"></i> Back</a></button>
		</div>
	</div>

	<div class="content-main">
		<div class="content-message">
			<!-- Place Message Success or Error Here -->
		</div>

		<div class="opaname">
			<div class="opname-header">
				<div class="header-title">
					<b><h3>Stock Opname #<?php echo "<div class='op-id'>".$opname['id_stock_opname']."</div>" ?></h3></b> 
				</div>
				<div class="form-group">
					<div class="title">	
						Opname Date
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">					 
						<input type="date" readonly class="opn-date" value="<?php echo $opname['opname_date']?>">
					</div>	
				</div>
				<div class="form-group">
					<div class="title">
						Remark
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">
						<input type="text" readonly class="opn-remark" value="<?php echo $opname['remark']?>">
					</div>	
				</div>
				<div class="form-group">
					<div class="title">
						Type By
					</div>
					<div class="title2">
						:
					</div>
					<div class="input">		 
							<?php
								if($opname['type'] == 'by_all'){
									echo "ALL Product";
								}
								else{
									echo "Category || ".$opname['type_detail'];
								}
							?> 
					</div>	
				</div>							
			</div>
			<div class="opname-main">
				<div class="tb-opname">
					<div class="tb-head">
						<div class="cell1">Product Code</div>
						<div class="cell2">Product Name</div>
						<div class="cell3" align="center">Qty<br>(System)</div>
						<div class="cell4" align="center">Qty<br>(Real)</div>
						<div class="cell5">Difference</div><!-- selisih-->
						<div class="cell6">Text</div><!-- Keterang -->

					</div>
					<div class="tb-body">
					<?php foreach($opnameDetail->result() as $detail){
						?>
						<div class="main-main">
							<div class="cell1 main"><?php echo $detail->id_product?></div>
							<div class="cell2 main"><?php echo $detail->product_name?></div>
							<div class="cell3 main"><?php echo $detail->stock_system?></div>
							<div class="cell4 main"><?php echo $detail->stock_real?></div>
							<div class="cell5 main"><?php echo $detail->opname*$detail->counter?></div>
							<div class="cell6 main"><?php echo $detail->description?></div>
						</div>
					<?php	
					}?>						
					</div>
				</div>
			</div>
		</div>


	</div>
	<!-- End Content Main -->
</div>

<!-- Print -->
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
				<b>Opname # <?php echo $opname['id_stock_opname']?></b><br>
				<b><?php echo $opname['opname_date']?></b><br>
				<b>Remark : <?php echo $opname['remark']?></b><br>
				<b>Type By : <?php echo $opname['type']?> | <?php echo $opname['type_detail']?></b>

			</div>
		</div>
		<div class="print-product">
			<div class="product-detail-print">
			<div class="print-product-header">
				<div class="tb1">Id Product</div>
				<div class="tb2">Product Name</div>
				<div class="tb3">System</div>
				<div class="tb4">Real</div>
				<div class="tb5">Diff</div>
				<div class="tb6">Desc</div>
			</div>
			<?php foreach($opnameDetail->result() as $opdet){
			?>
			<div class="print-product-detail">
				<div class="tb1 ppd" align="right"><?php echo $opdet->id_product?></div>
				<div class="tb2 ppd"><?php echo $opdet->product_name?></div>
				<div class="tb3 ppd"><?php echo $opdet->stock_system?></div>
				<div class="tb4 ppd"><?php echo $opdet->stock_real?></div>
				<div class="tb5 ppd">
				<?php
					$diff = $opdet->opname*$opdet->counter;
					echo $diff; 
				?>
				</div>
				<div class="tb6 ppd"><?php echo $opdet->description ?></div>
			</div>
			<?php	
			}
			?>
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
	$('#print').css({'display' : 'none'});

	$('.submit').click(function(){
		$('#print').css({'display' : 'block'});
	});

	$('.cancel-print').click(function(){
		$('#print').css({'display' : 'none'});
	});

});
</script>