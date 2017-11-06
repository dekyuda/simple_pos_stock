<?php
	if($stock->row_array() < 1){
		echo "<h2 class='no-found'><b>Data Not Found</b></h2>";
	}
	else{
		foreach($stock->result() as $stock){
		?>
		<div class="main-main">
			<div class="cell1 main"><?php echo $stock->id_product ?></div>
			<div class="cell2 main"><?php echo $stock->product_name ?></div>
			<div class="cell3 main">
				<?php
					$in = $stock->in_qty;
					$out = $stock->out_qty; 
					$op = $stock->op_qty;
					
					if($in == Null){
						$in = 0;
					}
					if($out == Null){
						$out = 0;
					}
					if($op == Null){
						$op = 0;
					}
					
					$systotal = $in - $out + $op;
					
					echo "<div class='sysqty'>".$systotal."</div>";
				?>
			</div>
			<div class="cell4 main">
				<input type="number" class="realqty" value="0">
			</div>
			<div class="cell5 main">
				<input type="number" readonly="true" class="difqty" value="0">
			</div>
			<div class="cell6 main">
				<textarea class="textval" placeholder="text"></textarea>
			</div>
		</div>	
		<?php	
		}
	}
?>

<script>
$('.realqty').on('change', function(){
	var realQty = $(this).val(),
		sysQty = $(this).closest('.main-main').find('.sysqty').text(),
		diffQty = $(this).closest('.main-main').find('.difqty');
	
	var diffVal;
	diffVal = parseInt(realQty) - parseInt(sysQty);
	diffQty.val(diffVal);

});
</script>	