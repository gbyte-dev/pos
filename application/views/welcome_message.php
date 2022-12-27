<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title><?php echo $language["Dashboard"]; ?> </title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>
<style>
	@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
</style>
<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
<?php $total_sale=0;
	$expense=0;
	foreach($data6 as $res6){
	
	$total_sale=$total_sale+$res6['sub_total'];
	$expense=$expense+$res6['cost_price'];
	$profit=$total_sale-$expense;
}?>
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
				 <div class="col-xl-3">
                    <div class="card">
                            <div class="card-body p-1">
                                <h4 class="card-title">Monthly Earning</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-muted">This month</p>
                                        <h5><?php 
										$total=0;
										$currency=currency(1);
										foreach($data5 as $res5){
											
										$total=$total+$res5['sub_total'];	
											
										}
										echo $currency.' '.$total;
										?></h5>
                                        
                                    </div>
                                    
                                </div>
                             
                            </div>
                        </div></div>
						
						   <div class="col-xl-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body"><a href="<?php echo base_url().'sales';?>">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                 <p class="text-muted fw-medium">Total Sale</p>
                                                <h4 class="mb-0"><?php echo $data1;?></h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="fa fa-shopping-cart font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
										</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body"><a href="<?php echo base_url().'products';?>">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Products</p>
                                                <h4 class="mb-0"><?php echo $data2;?></h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
										</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body"><a href="<?php echo base_url().'customers';?>">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Customers</p>
                                                <h4 class="mb-0"><?php echo $data3;?></h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fa fa-user font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
										</a>
                                    </div>
                                </div>
                            </div>
                        <!-- end row -->

                        
                    </div>
                </div>
						
						</div>
                       
                   
                 
                <!-- end row -->

                <div class="row">
                   <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title mb-4">My Sales</h4>
									<div class="row">
									<div class="col-md-4">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
								</div>
								
								<div class="col-md-4">
                                <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
								</div>
								
								<div class="col-md-4">
                                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
								</div>
								</div>
                            </div>
                        </div>
                </div>
				

	
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Latest Transaction</h4>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check font-size-16 align-middle">
                                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                                        <label class="form-check-label" for="transactionCheck01"></label>
                                                    </div>
                                                </th>
					<th class="align-middle">Order ID</th>
					<th class="align-middle">Billing Name</th>
					<th class="align-middle">Date</th>
					<th class="align-middle">Total</th>
					<th class="align-middle">Payment Status</th>
					<th class="align-middle">Payment Method</th>
					<th class="align-middle">View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($data4 as $res){
											$biller_name=biller_name($res['biller_id']);
											?>
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                        <label class="form-check-label" for="transactionCheck02"></label>
                                                    </div>
                                                </td>
                                                <td><a href="javascript: void(0);" class="text-body fw-bold"><?php echo $res['random_num'];?></a> </td>
                                                <td><?php echo $biller_name;?></td>
                                                <td>
                                                    <?php echo $res['sale_date'];?>
                                                </td>
                                                <td>
	   <?php echo $currency.' '.(($res['sub_total']+$res['tax'])-$res['extra_discount']);?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                </td>
                                                <td>
        <?php if($res['payment_method']==1){echo "Paypal";}else{echo "UPI";}?> 
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                        View Details
                                                    </button>
                                                </td>
                                            </tr>
										<?php } ?>
                                           
                                           
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Transaction Modal -->
        <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                        <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                <p class="text-muted mb-0">$ 225 x 1</p>
                                            </div>
                                        </td>
                                        <td>$ 255</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                <p class="text-muted mb-0">$ 145 x 1</p>
                                            </div>
                                        </td>
                                        <td>$ 145</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Sub Total:</h6>
                                        </td>
                                        <td>
                                            $ 400
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Shipping:</h6>
                                        </td>
                                        <td>
                                            Free
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Total:</h6>
                                        </td>
                                        <td>
                                            $ 400
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
       
     

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php //include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>
<script>
var xValues = ["<?php echo date("M");?>", "<?php echo date("M", strtotime("-1 months"));?>", "<?php echo date("M", strtotime("-2 months"));?>", "<?php echo date("M", strtotime("-3 months"));?>", "<?php echo date("M", strtotime("-4 months"));?>","<?php echo date("M", strtotime("-5 months"));?>"];

var yValues = ["<?php echo $currency.' '.$total;?>", "<?php echo $currency.' '.$total;?>", "<?php echo $currency.' '.$total;?>", "<?php echo $currency.' '.$total;?>", "<?php echo $currency.' '.$total;?>", "<?php echo $currency.' '.$total;?>"];
var barColors = ["red", "green","blue","orange","brown","black"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Sale In 6 Months"
    }
  }
});




var xValues = ["<?php echo date("M");?>", "<?php echo date("M", strtotime("-1 months"));?>", "<?php echo date("M", strtotime("-2 months"));?>", "<?php echo date("M", strtotime("-3 months"));?>", "<?php echo date("M", strtotime("-4 months"));?>","<?php echo date("M", strtotime("-5 months"));?>"];
var yValues = ["<?php echo $currency.' '.$expense;?>", "<?php echo $currency.' '.$expense;?>", "<?php echo $currency.' '.$expense;?>", "<?php echo $currency.' '.$expense;?>", "<?php echo $currency.' '.$expense;?>", "<?php echo $currency.' '.$expense;?>"];
var barColors = ["red", "green","blue","orange","brown","black"];

new Chart("myChart1", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Expenses In 6 Months"
    }
  }
});



var xValues = ["<?php echo date("M");?>", "<?php echo date("M", strtotime("-1 months"));?>", "<?php echo date("M", strtotime("-2 months"));?>", "<?php echo date("M", strtotime("-3 months"));?>", "<?php echo date("M", strtotime("-4 months"));?>","<?php echo date("M", strtotime("-5 months"));?>"];
var yValues = ["<?php echo $currency.' '.$profit;?>", "<?php echo $currency.' '.$profit;?>", "<?php echo $currency.' '.$profit;?>", "<?php echo $currency.' '.$profit;?>", "<?php echo $currency.' '.$profit;?>", "<?php echo $currency.' '.$profit;?>"];
var barColors = ["red", "green","blue","orange","brown","black"];

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Profit In 6 Months"
    }
  }
});
</script>