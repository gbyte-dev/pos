<?php //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Sales</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
	
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="page-content">
	
            <div class="container-fluid">
<?php //print_r($_SESSION);?>
                <!-- start page title -->
                <div class="row">
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                
				<h4 class="mb-sm-0 font-size-18">Sales</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <form action="<?= base_url() ?>sales" method="post">
<div class="row">

                       <div class="col-sm-3 ">
					   <label for="customer" class="col-sm-12 col-form-label">Customer</label>
					  
                                    <select name="customer" id="customer1" class="form-control" >
                                       <option value="0">Select Customer</option>
                                       <?php foreach($data1 as $res1){
                                          ?>
<option value="<?php echo $res1['id'];?>" <?php if(isset($_SESSION['filter']) &&$_SESSION['filter']['customer']==$res1['id']){echo "Selected";}?>><?php echo $res1['first_name'].' '.$res1['last_name'];?></option>
                                       <?php }
                                          ?>
                                    </select>
									
                                 </div> 
								 
								 <div class="col-sm-3 "><label for="biller" class="col-sm-12 col-form-label">Biller</label>
					  
                                    <select name="biller" id="biller" class="form-control" >
                                       <option value="0">Select Biller</option>
                                       <?php foreach($data2 as $res2){
                                          ?>
<option value="<?php echo $res2['id'];?>" <?php if(isset($_SESSION['filter']) &&$_SESSION['filter']['biller']==$res2['id']){echo "Selected";}?>><?php echo $res2['first_name'].' '.$res2['last_name'];?></option>
                                       <?php }
                                          ?>
                                    </select>
									
                                 </div> 
								 
								 <div class="col-sm-3 "><label for="start_date" class="col-sm-12 col-form-label">Start Date</label>
<input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter First Name" value="<?php echo @$_SESSION['filter']['start_date'];?>">
                                 </div> 
								 
								 <div class="col-sm-3 "><label for="expire_date" class="col-sm-12 col-form-label">Expire Date</label>
                                    <input type="date" name="expire_date" class="form-control" id="expire_date"  value="<?php echo @$_SESSION['filter']['expire_date']; ?>">
                                 </div> 
								
								
								 
</div>

                        </div>
                    </div>
					<div class="col-3 p-4 mt-2">
					<div class="row justify-content-end">
                                <div class="col-sm-12">
                                 
								 <div>
                                        <button type="submit" class="btn btn-primary ">Submit</button>
										<a href="<?php echo base_url().'sales';?>"  class="btn btn-primary ">Reset</a>
                                    </div>
									</div>
                            </div>
							</div>
 </form>
                </div>
                <!-- end page title -->

               <!-- end row -->
 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


	<table id="datatable-buttons" class="table table-bordered dt-responsive">
                                     <thead>
                                        <tr>
		<th class="text-center">#</th>
		<th class="text-center">Order</th>
		<th class="text-center">Customer Name</th>
		<th class="text-center">Biller Name</th>
		<th class="text-center">Date</th>
		<th class="text-center">Payment Method</th>
		<th class="text-center">Order Amount</th>
		<!--th class="text-center">Total Tax</th>
		<th class="text-center">Extra Discount</th>
		<th class="text-center">Coupon Discount</th-->
		<th class="text-center">Coupon Code</th>
		<th class="text-center">Paid Amount</th>
		<th class="text-center">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                         <?php foreach($data as $res){
										 $currency =	currency(1);
										 $customer_name= customer_name($res['customer_id']);
										 $biller_name= biller_name($res['biller_id']);
											 $sale_id=$res['id'];
											 ?>
                                       <tr>
<td class="text-center"><?php echo $res['id'];?></td>
<td class="text-center"><a href="<?php echo base_url().'orderSummary?id='.$sale_id.'&reference='.$res['random_num'].'&pay='.$res['payment_method']?>"><?php echo $res['random_num'];?></a></td>
<td class="text-center"><?php echo $customer_name;?></td>
<td class="text-center"><?php echo $biller_name;?></td>
<td class="text-center"><?php echo $res['sale_date'];?></td>
<td class="text-center"><?php if($res['payment_method']==1){echo "Paypal";}else{echo "UPI";}?></td>
<td class="text-center"><?php echo $currency.' '.$res['sub_total'];?></td>
<!--td class="text-center"><?php echo $currency.' '.$res['tax'];?></td>
<td class="text-center"><?php echo $currency.' '.$res['extra_discount'];?></td>
<td class="text-center"><?php echo $currency.' '.$res['coupon_discount'];?></td-->
<td class="text-center"><?php echo $res['coupon_code'];?></td>
<td class="text-center"><?php echo $currency.' '.(($res['sub_total']+$res['tax'])-$res['extra_discount']);?></td>
<td class="text-center">Invoice</td>      
                                    </tr>
										 <?php } ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>

<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Required datatable js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>

<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>

<script>
	$("#customer1").select2({
    selectOnClose: true

});

$("#biller").select2({
    selectOnClose: true

});

</script>
 