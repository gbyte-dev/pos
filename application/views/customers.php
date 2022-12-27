<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Customers</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
	<link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
</style>
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
	
	
<?php if(isset($_GET['msg']) && $_GET['msg']=='cust_add'){?>
	<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Customer Added Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
	
	<?php }if(isset($_GET['msg']) && $_GET['msg']=='cust_del'){?>
<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Customer Deleted Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=='cust_edit'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Customer Updated Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php } if(isset($_GET['msg']) && $_GET['msg']=='bulk_add'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Bulk Imported Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php  } ?>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Customers</h4>
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
Bulk Import
</button>


<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Import</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>addBulkCustomer" method="post" enctype='multipart/form-data'>
                            
							
							
							 <div class="row mb-4">
                                <label for="bulk" class="col-sm-3 col-form-label">Bulk</label>
                                <div class="col-sm-9">
                                  <input type="file" name="bulk" class="form-control" id="bulk"  required>
                                </div>
                            </div>
							
				<a href="<?php echo base_url()."assets/bulk_files/sample_customer.csv"?>" download="sample_customer.csv">Download Sample CSV</a>			

 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
                            
                        </form>
      </div>
     
    </div>
  </div>
</div>
                    <!--div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Responsive Tables</li>
                        </ol>
                    </div-->

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Customer
</button>
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0 mt-2" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">First Name</th>
											<th class="text-center">Last Name</th>
											<th class="text-center">Email</th>
											<th class="text-center">Phone</th>
											<th class="text-center">Address</th>
                                            <th class="text-center">Status</th>
											<th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $res){?>
                                        <tr>
<td class="text-center"><?php echo $res['id'];?></td>
<td class="text-center"><?php echo $res['first_name'];?></td>
<td class="text-center"><?php echo $res['last_name'];?></td>
<td class="text-center"><?php echo $res['email'];?></td>
<td class="text-center"><?php echo $res['phone'];?></td>
<td class="text-center"><?php echo $res['address'];?></td>
<td class="text-center"><?php if($res['status']==1){echo "Active";}else{echo "Inactive";}?></td>

<td class="text-center">
	<a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="edit('<?php echo $res['id'];?>',
	'<?php echo $res['first_name'];?>','<?php echo $res['last_name'];?>',
'<?php echo $res['email'];?>',	'<?php echo $res['phone'];?>',
'<?php echo $res['address'];?>','<?php echo $res['status'];?>'	
	)">
 <i class="fa fa-edit"></i>
</a>

<a onclick="remove('<?php echo base_url().'deleteCustomer?id='.$res['id'];?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
	
	</td>
                                        </tr>
									<?php } ?>
                                    
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<!-- Responsive Table js -->


        </div>
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>editCustomer" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
								<input type="hidden" name="id" id="id1">
                                  <input type="text" name="first_name1" class="form-control" id="first_name1" placeholder="Enter First Name" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="last_name1" class="form-control" id="last_name1" placeholder="Enter Last Name" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email1" class="form-control" id="email1" placeholder="Enter Email" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <input type="text" name="address1" class="form-control" id="address1" placeholder="Enter Address" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                  <label class="switch" >
<input type="checkbox" name="status1" id="status1" value="0" <?php if($res['status']==1){echo "Checked";} ?>  />
<span class="slider round"></span>
</label>
                                </div>
                            </div>

 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
                            
                        </form>
      </div>
     
    </div>
  </div>
</div>	
		


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>addCustomer" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="first_name" class="form-control" id="horizontal-firstname-input" placeholder="Enter First Name" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="last_name" class="form-control" id="horizontal-firstname-input" placeholder="Enter Last Name" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" id="horizontal-firstname-input" placeholder="Enter Email" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone" class="form-control" id="horizontal-firstname-input" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <input type="text" name="address" class="form-control" id="horizontal-firstname-input" placeholder="Enter Address" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                  <label class="switch" >
<input type="checkbox" name="status" id="status" value="0"  />
<span class="slider round"></span>
</label>
                                </div>
                            </div>

 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
                            
                        </form>
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

<!-- App js -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>
<script>
	   function edit(a,b,c,d,e,f,g){
	 //alert(g);
	 $('#id1').val(a);
	 $('#first_name1').val(b);
	   $('#last_name1').val(c);
	    $('#email1').val(d);
		 $('#phone1').val(e);
		  $('#address1').val(f);
		  if(g!=""){
		  $('#status1').prop('checked', true);
	   }
	   }
	   function remove(url){
	   
	   
	   Swal.fire({
  title: 'Are you sure?',
  text: "It Will Delete the Row!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location = url;
  }
})
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


 	$('#status1').click(function(){
var stat=$('#status1').prop('checked');
//alert(stat);
if(stat==true){
$('#status1').val(1);
}
if(stat==false){
$('#status1').val(0);
}

});
	   </script> 