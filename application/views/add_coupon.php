
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Add Coupon</title>
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

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
<br/><br/><br/><br/>
        	<div class="row">
           
            <!-- end col -->

            <div class="col-xl-11" style="margin:auto;">
                <div class="card" style="margin-bottom:60px;" >
                    <div class="card-body">
                       	<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="font-size:20px;">
    
    <li class="breadcrumb-item active page-header-title text-capitalize" aria-current="page"><b>Add New Coupon</b></li>
  </ol>
</nav>

<form action="<?= base_url() ?>addCoup" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
							<div class="col-6">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-12">
                                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                                </div>
								</div>
							
							<div class="col-6">
                                <label for="coupon_code" class="col-sm-3 col-form-label">Coupon Code </label><span id="error" class="text-danger"></span>
                                <div class="col-sm-12">
                                  <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" onkeyup="check(this.value)" required>
                                </div>
								</div>
								
                            </div>


<div class="row mb-4">
							<div class="col-6">
                                <label for="first_name" class="col-sm-3 col-form-label">Coupon Type</label>
                                <div class="col-sm-12">
                                  <select name="coupon_type" id="coupon_type" class="form-control">
								  <option value="1">Default</option>
								  <option value="2">First Order</option>
								  </select>
                                </div>
								</div>
							
							<div class="col-6">
                                <label for="limit_coupon" class="col-sm-4 col-form-label">Limit For Same User</label>
                                <div class="col-sm-12">
                                  <input type="text" name="limit_coupon" class="form-control" id="limit_coupon" placeholder="EX:10" required>
                                </div>
								</div>
								
                            </div>

<div class="row mb-4">
							<div class="col-6">
                                <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                                <div class="col-sm-12">
                                  <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter First Name" required>
                                </div>
								</div>
							
							<div class="col-6">
                                <label for="expire_date" class="col-sm-3 col-form-label">Expire Date</label>
                                <div class="col-sm-12">
                                  <input type="date" name="expire_date" class="form-control" id="expire_date" placeholder="Enter First Name" required>
                                </div>
								</div>
								
                            </div>
 
 
 <div class="row mb-4">
							<div class="col-6">
                                <label for="min_purchase" class="col-sm-3 col-form-label">Min Purchase</label>
                                <div class="col-sm-12">
                                  <input type="text" name="min_purchase" class="form-control" id="min_purchase" placeholder="Enter Min Purchase" required>
                                </div>
								</div>
							
							<div class="col-6">
                                <label for="max_discount" class="col-sm-3 col-form-label">Max Discount</label>
                                <div class="col-sm-12">
                                  <input type="text" name="max_discount" class="form-control" id="max_discount" placeholder="Enter Max Discount" required>
                                </div>
								</div>
								
                            </div>
							
							 <div class="row mb-4">
							<div class="col-6">
                                <label for="discount" class="col-sm-3 col-form-label">Discount</label>
                                <div class="col-sm-12">
                                  <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter Discount" required>
                                </div>
								</div>
							
							<div class="col-6">
                                <label for="discount_type" class="col-sm-3 col-form-label">Discount Type</label>
                                <div class="col-sm-12">
                                  <select name="discount_type" id="discount_type" class="form-control">
								  <option value="1">Percent</option>
								  <option value="2">Amount</option>
								  </select>
                                </div>
								</div>
								
                            </div>
							
							
                            <div class="row justify-content-start">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md" id="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
			
            <!-- end col -->
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

function check(a){
	
	$.ajax({
  url: "<?php echo base_url().'checkCoupon'?>",
  data:{coupon_code:a},
  type:"post",
  cache: false,
  success: function(html){
 // alert(html);
  if(html=="exist"){
  //$("#submit").hide();
  $('#error').html('<span class="text-red">Coupon Is Already Exist</span>');
    $("#submit").prop('disabled', true);
  }else{
   $("#submit").prop('disabled', false);
  
  }
  
  }
});
	
}
	</script>