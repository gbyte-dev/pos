<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
	<style>
	
	.mb-4 {
    margin-bottom: 1rem!important;
}

</style>
    <title>Edit Supplier</title>
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

            <br/>   <br/>   <br/>   <br/>   <br/>
			<div class="row">
           <?php //foreach($data as $res){?>
            <!-- end col -->

            <div class="col-xl-6" style="margin:auto;">
                <div class="card" style="margin-bottom:60px;">
                    <div class="card-body">
						<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="font-size:20px;">
    <li class="breadcrumb-item"><a href="<?= base_url() ?>supplier">Supplier</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
  </ol>
</nav>
                      
                        <form action="<?= base_url() ?>editSupp" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
							<input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Supplier name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="supplier_name" class="form-control" id="horizontal-firstname-input" placeholder="Enter Product Name" value="<?php echo $data['supplier_name'];?>" required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone" class="form-control" id="horizontal-firstname-input"  value="<?php echo $data['phone'];?>" required onkeypress="return isNumber(event)">
                                </div>
                            </div>
                           
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="text" name="email" class="form-control" id="horizontal-firstname-input" placeholder="Enter Selling Price" value="<?php echo $data['email'];?>" required>
                                </div>
                            </div>

                           
<br/>
                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                  <input type="file" name="image" class="form-control" id="horizontal-firstname-input" placeholder="Enter Your ">
								  <input type="hidden" name="display_image" value="<?php echo $data['image'];?>">
                                </div>
								
								<?php if($data['image']){?>
							
							 <div class="col-md-4 m-auto mt-2" id="disp_image"><img src="<?php echo base_url()?>/assets/supplier_images/<?php echo $data['image'];?>" height="100%" width="100%" /><span style="font-size:13px;cursor:pointer;" id="d_image">&#x2715;</span></div>
								<?php } ?>
                            </div>
<br/>
                            


                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                  <input type="text" name="city" class="form-control" id="horizontal-firstname-input" placeholder="Enter City " value="<?php echo $data['city'];?>" required>
                                </div>
                            </div>

                           
 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                  <input type="text" name="state" class="form-control" id="horizontal-firstname-input" placeholder="Enter State " value="<?php echo $data['state'];?>" required>
                                </div>
                            </div>
                            
							 <div class="row mb-4" >
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea name="address" class="form-control" id="horizontal-firstname-input" placeholder="Enter Address" required style="resize:none;"><?php echo $data['address'];?></textarea>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Zipcode</label>
                                <div class="col-sm-9">
                                  <input type="text" name="zipcode" class="form-control" id="horizontal-firstname-input" placeholder="Enter Zipcode" onkeypress="return isNumber(event)" value="<?php echo $data['zipcode'];?>"  maxlength="6" required>
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
				<br/>
                <!-- end card -->
            </div>
            <!-- end col -->
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
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>

 <script>
		$('#d_image').click(function(){
		
		var id=<?php echo $_GET['id'];?>;
		
		$.ajax({
  url: "<?php echo base_url()?>ProductController/delete_image_1",
   data: {id : id},
   type:"POST",
  cache: false,
  success: function(html){
    $("#disp_image").html('');
  }
});
		});
		
		
		
		
		</script>

<script>
	function sub(a){
	//alert(a);
	
	$.ajax({
  url: "<?php echo base_url().'ProductController/ajax_subcategory'?>",
  type: "POST",
  data: {id : a},
  cache: false,
  success: function(html){
  
    $("#subcategory").html(html);
  }
});
	
	
	
	}
	
	
		$('#status').click(function(){
var stat=$('#status').prop('checked');
//alert(stat);
if(stat==true){
$('#status').val(1);
}
if(stat==false){
$('#status').val(0);
}

});


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
	</script>