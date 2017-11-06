<style>
body{
	width: 100%;
	height: 100%;
	background-color: #55729c;
}

.content-top.dashboard{
	border-bottom: 2px solid grey;
}

.content-dashboard{
	width: 100%;
	min-height: 1000px;
	padding: 15px;
	margin-top: 100px;
	background: white;
	position: relative;
	display: inline-block;
	//margin-top: 0px;
}


</style>

<div id="content-wrapper">
<div class="content-top Dashboard">
	<h2>Dashboard</h2>
</div>
<div class="content-dashboard">
	 <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green">
	                <div class="panel-body">
		                <i class="fa fa-bar-chart-o fa-5x"></i>
		                <h3><?php 
		                       	echo $product;
		                    ?>
		                </h3>
	                </div>
	                <div class="panel-footer back-footer-green">
	                     Product Registered
	                </div>
                 </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                     <div class="panel-body">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <h3><?php
                           	foreach($sales->result() as $sale){
                           		echo $sale->sale;
                           	}
                           	?></h3>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        Items Sales
                    </div>
                </div>
            </div>
         	<div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-red">
                    <div class="panel-body">
                        <i class="fa fa fa-comments fa-5x"></i>
                        <h3>0 </h3>
                    </div>
                    <div class="panel-footer back-footer-red">
                        Order From Customer

                    </div>
                 </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                 <div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-body">
                        <i class="fa fa-users fa-5x"></i>
                        <h3>
                         	<?php echo $customer; ?>
                                </h3>
                    </div>
                    <div class="panel-footer back-footer-brown">
                                Registered customers

                    </div>
                 </div>
            </div>
        </div><!-- end row -->	

        <div class="row">
        	<div class="col-md-9 col-sm-12 col-xs-12">
        		<div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-body">
                    <?php
                        foreach($top_product->result() as $top_sale){
                    ?> 
                       <!--product image foreach -->  
                       <div class="col-md-3 col-sm-12 col-xs-12">
			                 <div class="panel panel-primary text-center no-boder bg-color-brown">
                                
			                    <div class="panel-body">
			                        <img src="">
			                    </div>
			                    <div class="panel-footer back-footer-brown">
			                               <?php echo $top_sale->product_name; ?>

			                    </div>
                            
			                 </div>
			            </div>
			            <!--product image foreach --> 
                    <?php    
                        }
                    ?>     
                    </div>
                    
                    <div class="panel-footer back-footer-brown">
                        Top Selling Product
                    </div>
                </div>
        	</div>
        </div><!-- end class row-->

</div> <!-- content dashboard -->       
</div><!-- content wrapper -->
