<?php include 'layouts/head-main.php';
   include 'assets/lang/en.php'; 
   ?>
<head>
   <title>Order Summary</title>
   <?php include 'layouts/head.php'; ?>
   <?php include 'layouts/head-style.php'; ?>
</head>
<style>
   .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
   }
   .switch input { 
   opacity: 0;
   width: 0;
   height: 0;
   }
   .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
   }
   .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
   }
   input:checked + .slider {
   background-color: #2196F3;
   }
   input:focus + .slider {
   box-shadow: 0 0 1px #2196F3;
   }
   input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
   }
   /* Rounded sliders */
   .slider.round {
   border-radius: 34px;
   }
   .slider.round:before {
   border-radius: 50%;
   }
   .card-body {
   -webkit-box-flex: 1;
   -ms-flex: 1 1 auto;
   flex: 1 1 auto;
   padding: 0.25rem 1.25rem;
   }
</style>
<?php include 'layouts/body.php'; ?>
<!-- Begin page -->
<div id="layout-wrapper">
   <?php include 'layouts/menu.php'; ?>
   <div class="main-content">
      <br/><br/><br/><br/>
      <div class="row">
	
         <div class="col-xl-12" style="margin:auto;">
		   <?php print_r($_SESSION);?>
            <div class="card" style="margin-bottom:60px;" >
               <div class="card-body">
                  <b style="font-size:18px;">Sale Details</b>
                  <hr/>
                  <div class="row">
                     <div class="col-xl-6" style="margin:auto;">
                        <b style="font-size:18px;">Customer Info</b><br/>
                        <b><?php echo $data2['first_name'].' '.$data2['last_name'];?></b><br/>
                        <b><?php echo $data2['phone'];?></b><br/>
                        <b><?php echo $data2['email'];?></b><br/>
                        <b><?php echo $data2['address'];?></b>
                     </div>
                     <div class="col-xl-6">
                        <b style="font-size:18px;">Sale Info</b>
                        <br/>
                        <b>Reference: <?php echo $_GET['reference'];?></b><br/>
                        <b>Status : Paid</b><br/>
                        <b>Payment Method: <?php if($_GET['pay']==1){echo "Paypal";}else{echo "UPI";}?></b><br/>
                     </div>
                  </div>
                  <br/>	<br/>
                  <p style="font-size:18px;"><b>Order Summary</b></p>
                  <table style='width:100%;border-style:solid;'>
                     <thead>
                        <tr style='background-color:#989ca1;'>
                           <th style='color:white;width:50%'>Product</th>
                           <th style='color:white;text-align:center'>Quantity</th>
                           <th style='color:white;text-align:center'>MRP</th>
                           <th style='color:white;text-align:center'>Discount</th>
                           <th style='color:white;text-align:center'>Subtotal</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $subtotal=0;
                           $currency =	currency(1);
                           foreach($data1 as $res){ 
                           
                            $product_name =	product_name($res['product_id']);
                           ?>
                        <tr>
<td style='text-align:left;'><?php echo $product_name;?></td>
<td style='text-align:center;'><?php echo $res['product_qty'];?></td>
<td style='text-align:center;'><?php echo $currency.' '.($res['product_unitprice']+$res['product_discount']);?></td>
<td style='text-align:center;'><?php echo $currency.' '.((($res['product_unitprice']+$res['product_discount'])-$res['product_unitprice']));?></td>
<td style='text-align:center;'>
<?php echo $currency.' '.$res['product_unitprice']*$res['product_qty'];?>
</td>
                        </tr>
                        <?php
                           $subtotal=$subtotal+$res['product_unitprice']*$res['product_qty'];
                           
                           } //echo $subtotal;?>
                     </tbody>
                     <br/>
                  </table>
                  <br/>
                  <div class="row  w-50 float-end">
                     <div class="col-6 w-100 float-end">
                        <hr/>
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Sub Total:</b></div>
                           <div class="col-6"><?php echo $currency.' '.$subtotal;?></div>
                        </div>
                        </p>
                        <hr/>
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Order Tax:</b></div>
                           <div class="col-6"><?php echo $currency.' '.$data['tax'];?></div>
                        </div>
                        </p>
                        <hr/>
                        <!--p><div class="row"><div class="col-6"><b>Product Discount:</b></div><div class="col-6"><?php echo $currency.' '.$data['product_discount'];?></div></div></p-->
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Extra Discount:</b></div>
                           <div class="col-6"><?php echo $currency.' '.$data['extra_discount'];?></div>
                        </div>
                        </p>
                        <hr/>
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Coupon Code:</b></div>
                           <div class="col-6"><?php echo $data['coupon_code'];?></div>
                        </div>
                        </p>
                        <hr/>
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Coupon Discount:</b></div>
                           <div class="col-6"><?php echo $currency.' '.$data['coupon_discount'];?></div>
                        </div>
                        </p>
                        <hr/>
                        <p>
                        <div class="row">
                           <div class="col-6"><b>Grand Total:</b></div>
                           <div class="col-6"><?php echo $currency.' '.(($subtotal+$data['tax'])-($data['extra_discount']+$data['coupon_discount']));?></div>
                        </div>
                        </p>
                        <hr/>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br/>
      <?php include 'layouts/footer.php'; ?>
   </div>
</div>
<?php include 'layouts/vendor-scripts.php'; ?>
<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/dashboard.init.js"></script>
<!-- App js -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>
</html>
<script>
   function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
      }
      return true;
   }
</script>