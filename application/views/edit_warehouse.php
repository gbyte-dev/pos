<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Add Warehouse</title>
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

            <div class="col-xl-6" style="margin:auto;">
                <div class="card" style="margin-bottom:60px;" >
                    <div class="card-body">
                       <nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="font-size:20px;">
    <li class="breadcrumb-item"><a href="<?= base_url() ?>warehouse">Warehouse</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Warehouse</li>
  </ol>
</nav>

<form action="<?= base_url() ?>editWare" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Warehouse Name</label>
                                <div class="col-sm-9">
								<input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                  <input type="text" name="name" class="form-control" id="horizontal-firstname-input" placeholder="Enter Warehouse Name" value="<?php echo $data['name'];?>" required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone" class="form-control" id="horizontal-firstname-input" placeholder="Enter Phone" onkeypress="return isNumber(event)" value="<?php echo $data['phone'];?>" required>
                                </div>
                            </div>
                           
						   <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" id="horizontal-firstname-input" placeholder="Enter Email" value="<?php echo $data['email'];?>" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                  <input type="text" name="country" class="form-control" id="horizontal-firstname-input" placeholder="Enter Country" value="<?php echo $data['country'];?>" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                  <input type="text" name="city" class="form-control" id="horizontal-firstname-input" placeholder="Enter City" value="<?php echo $data['city'];?>" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Zipcode</label>
                                <div class="col-sm-9">
                                  <input type="text" name="zipcode" class="form-control" id="horizontal-firstname-input" placeholder="Enter Zipcode" onkeypress="return isNumber(event)" value="<?php echo $data['zipcode'];?>" maxlength="6" required>
                                </div>
                            </div>
                           

                            

                            

                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
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
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php //include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
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