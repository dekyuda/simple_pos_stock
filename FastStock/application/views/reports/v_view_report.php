<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/system/css/custom-report.css">
<div id="content-wrapper">
	<div class="content-top">
		<div class="top-title">
			<h2>Report</h2>
		</div>
	</div>
	<div class="content-main">
		<div class="content-report">
			
				<div class="report-main" data-report="stock card">
					<!--<svg src="<?php //echo base_url()?>asset/system/image/stockCard.svg" />-->
					<h3>Stock Card</h3>
				</div>
			
			
				<div class="report-main" data-report="stock Recapitulation">
					<h3>STOCK RECAPITULATION</h3>
				</div>
			
				<div class="report-main" data-report="Purchase">
					<h3>PURCHASE</h3>
				</div>
			
				<div class="report-main" data-report="Sale">
					<h3>SALE</h3>
				</div>
			
				<div class="report-main" data-report="Opname">
					<h3>OPNAME</h3>
				</div>
			
				<div class="report-main" data-report="Cash / Bank">
					<h3>CASH / BANK</h3>
				</div>
			
				<div class="report-main" data-report="Profit and Loss">
					<h3>PROFIT AND LOSS</h3>
				</div>
			
				<div class="report-main" data-report="Balance Sheet">
					<h3>BALANCE SHEET</h3>
				</div>
			
		</div>		
	</div>

	<!-- Div for Report -->
	<div class="report-print">
		<h2>This Content</h2>
	</div>
</div>
<!-- End Content Wrapper -->

<script>
$(document).ready(function(){
	$('.report-main').on('click', function(e){
		var i = $(this).attr('data-report');
		//var a = $(this).prop('data-report');
		//alert(e.target.attr('data-report');
		//alert(i);
		//alert(a);
		$('.report-print').css({
			'display' : 'block'
		});

		$('.report-print').html(
			"<div class='print-header'>"+i+"</div>"
			);
		$('.report-print').append("<div class='print-close'><b>X</b></div>");
		$('body').css({'overflow' : 'hidden'});

	});

	$(document).on('click', '.print-close', function(){
		//alert('bisa di click');
		$('.report-print').css({'display' : 'none'});
		$('.print-header').remove();
		$('.print-close').remove();
	});
});
</script>