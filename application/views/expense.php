<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Expense</title>
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
	
<?php if(isset($_GET['msg']) && $_GET['msg']=='exp_add'){?>
	<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Expense Added Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
	
<?php }if(isset($_GET['msg']) && $_GET['msg']=='exp_del'){?>
<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Expense Deleted Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=='exp_edit'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Expense Updated Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php } ?>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Expense</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Expense
</button>
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0 mt-2" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Date</th>
											<th class="text-center">Expense Category</th>
											<th class="text-center">Warehouse</th>
											<th class="text-center">Amount</th>
											<th class="text-center">Note</th>
											<th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $res){
										$expense_category=exp_category($res['expense_category']);
										$warehouse=warehouse($res['warehouse']);
										?>
                                        <tr>
<td class="text-center"><?php echo $res['id'];?></td>
<td class="text-center"><?php echo $res['created_date'];?></td>
<td class="text-center"><?php echo $expense_category;?></td>
<td class="text-center"><?php echo $warehouse;?></td>
<td class="text-center"><?php echo $res['amount'];?></td>
<td class="text-center"><?php echo $res['note'];?></td>

<td class="text-center">
	<a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="edit('<?php echo $res['id'];?>',
	'<?php echo $res['created_date'];?>','<?php echo $res['expense_category'];?>','<?php echo $res['warehouse'];?>','<?php echo $res['amount'];?>','<?php echo $res['note'];?>'
	
	)">
 <i class="fa fa-edit"></i>
</a>

<a onclick="remove('<?php echo base_url().'deleteExpense?id='.$res['id'];?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
	
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>editExpense" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="date1" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
								<input type="hidden" name="id" id="id1">
                                  <input type="date" name="date1" class="form-control" id="date1"  required>
                                </div>
                            </div>
						 <div class="row mb-4">
                                <label for="expense_category1" class="col-sm-3 col-form-label">Expense Category</label>
                                <div class="col-sm-9">
                                  <select name="expense_category1" id="expense_category1" class="form-control">
								  <option value="0">Select Category</option>
								  <?php foreach($data1 as $res1){?>
								  <option value="<?php echo $res1['id'];?>"><?php echo $res1['expense_category'];?></option>
								  <?php } ?>
								  </select>
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="warehouse1" class="col-sm-3 col-form-label">Warehouse</label>
                                <div class="col-sm-9">
                                  <select name="warehouse1" id="warehouse1" class="form-control">
								  <option value="0">Select Warehouse</option>
								  <?php foreach($data2 as $res2){?>
								  <option value="<?php echo $res2['id'];?>"><?php echo $res2['name'];?></option>
								  <?php } ?>
								  </select>
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="amount1" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                  <input type="text" name="amount1" class="form-control" id="amount1" placeholder="Enter Amount" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="note1" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                  <input type="text" name="note1" class="form-control" id="note1" placeholder="Enter Note" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>addExpense" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="date" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                  <input type="date" name="date" class="form-control" id="date" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Expense Category</label>
                                <div class="col-sm-9">
                                  <select name="expense_category" class="form-control">
								  <option value="0">Select Category</option>
								  <?php foreach($data1 as $res1){?>
								  <option value="<?php echo $res1['id'];?>"><?php echo $res1['expense_category'];?></option>
								  <?php } ?>
								  </select>
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="warehouse" class="col-sm-3 col-form-label">Warehouse</label>
                                <div class="col-sm-9">
                                  <select name="warehouse" class="form-control">
								  <option value="0">Select Warehouse</option>
								  <?php foreach($data2 as $res2){?>
								  <option value="<?php echo $res2['id'];?>"><?php echo $res2['name'];?></option>
								  <?php } ?>
								  </select>
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                  <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="note" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                  <input type="text" name="note" class="form-control" id="note" placeholder="Enter Note" required>
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
	   function edit(a,b,c,d,e,f){

	 $('#id1').val(a);
	 $('#date1').val(b);
	 $('#expense_category1').val(c);
	 $('#warehouse1').val(d);
	 $('#amount1').val(e);
	 $('#note1').val(f);
	    
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
	   
	 
	   </script> 