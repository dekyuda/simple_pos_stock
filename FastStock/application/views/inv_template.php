<html>
<head>
    <title>Fast Stock</title>

    <!-- icon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>asset/system/image/fastStock.ico" type="image/x-icon" />

    <!--font awesome and bootsrap standard css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/bootstrap.css">
    

    <!-- Bootrap and jquery CSS for dataTable -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/js/dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/js/dataTables/dataTables.bootstrap4.min.css">
     
     
     <!-- summernote plugin-->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/summernote.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/datepicker.css">

     <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/system/css/custom-style.css">
     <link rel="stylesheet type="text/css" href="<?php echo base_url();?>asset/system/css/custom-contents.css">

     <script src="<?php echo base_url();?>asset/system/js/jquery-3.2.1.js"></script>
     <script src="<?php echo base_url();?>asset/system/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url();?>asset/system/js/dataTables/dataTables.bootstrap.js"></script>
     <script src="<?php echo base_url();?>asset/system/js/dataTables/jquery.dataTables.min.js"></script>

     <!--js for fixed header on table-->
     <!-- please change and download a freeze header jquery-->
     <script src="<?php echo base_url();?>asset/system/js/jquery.fixedheadertable.min.js"></script>
     <script src="<?php echo base_url();?>asset/system/js/jquery.freezeheader.js"></script>

     <!--summernote js-->
     <script src="<?php echo base_url();?>asset/system/js/summernote.min.js"></script>

     <!-- datepicker js-->
     <script src="<?php echo base_url();?>asset/system/js/bootstrap-datepicker.js"></script>

     <!-- Price Format -->
    <script src="<?php echo base_url();?>asset/system/js/jquery.priceformat.min.js"></script>

    <!-- Print Area-->
    <script src="<?php echo base_url();?>asset/system/js/jquery.printarea.js"></script>

    <style>
        #maincontainer{
          float: left;
          display: block;          
          min-height: 100%;
          width: 100%;
          
          
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="top">
        <div class="nav-hide">
            <h2 class="hide-side"><i class="fa fa-align-justify"></i></h2>
        </div>
        <div class="logos">
            <h2>Fast Stock</h2> 
        </div>
        <div class="logout">
            <h2><a href="<?php echo base_url()?>login/logout" class="logout-butt"><i class="fa fa-power-off" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div id="main">
      <div class="side-menu">
        <div class="company-logos">

        </div>
        <ul class="navigasi">
            <li>
              <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"> </i>  Dashboard</a>
            </li>
            <li class="parent">Inventory</li>
                <li>
                  <a href="<?php echo base_url().'product'?>"><i class="fa fa-barcode"> </i>  Product</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'category'?>"><i class="fa fa-tags"> </i>  Category</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'inventory'?>"><i class="fa fa-clone"> </i>  Stock Opname</a>
                </li>
            <li class="parent">Orders</li>
              <li>
                <a href="<?php echo base_url().'purchase'?>"><i class="fa fa-shopping-cart"> </i>  Purchase</a>
              </li>
              <li>
                <a href="<?php echo base_url().'sale'?>"><i class="fa fa-shopping-bag"> </i>  Sales</a>
              </li>
            <li class="parent"><a href="<?php echo base_url().'reports'?>"><i class="fa fa-bar-chart"></i>  Reports</a></li>
            <li class="parent"><a href="<?php echo base_url().'setting'?>"><i class="fa fa-gear"></i>  Setting</a></li>

        </ul>
      </div>
      <!--end side-menu-->
     
   
    </div><!--end id main-->
     <div id="maincontainer">

          <?php
              echo $contents;
           ?>
      </div><!--end class main-container-->
      
</div>
<!--End Div Wrapper-->
</body>
</html>
