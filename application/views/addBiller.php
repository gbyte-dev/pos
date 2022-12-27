
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Add Biller</title>
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
    <li class="breadcrumb-item"><a href="<?= base_url() ?>biller">Biller</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Biller</li>
  </ol>
</nav>

<form action="<?= base_url() ?>addBill" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" required>
                                </div>
                            </div>

<div class="row mb-4">
                                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" required>
                                </div>
                            </div>
							
							
                             <div class="row mb-4">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" required onkeypress="return isNumber(event)" maxlength="12">
                                </div>
                            </div>
                           
                            <div class="row mb-4">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                </div>
                            </div>
							 
                             <div class="row mb-4">
                                <label for="image" class="col-sm-3 col-form-label">Profile Picture</label>
                                <div class="col-sm-9">
                                  <input type="file" name="image" class="form-control" id="image" >
                                </div>
                            </div>

                             <div class="row mb-4" >
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea name="address" class="form-control" id="address" placeholder="Enter Address" required style="resize:none;"></textarea>
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