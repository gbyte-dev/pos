<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Stock Transfer</title>
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
	
<?php if(isset($_GET['msg']) && $_GET['msg']=='mon_add'){?>
	<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Money Transfer Added Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
	
<?php }if(isset($_GET['msg']) && $_GET['msg']=='mon_del'){?>
<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Money Transfer Deleted Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=='mon_edit'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Money Transfer Updated Succesfully',
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
                    <h4 class="mb-sm-0 font-size-18">Stock Transfer</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Product Transfer-->
 <a href="<?php echo base_url() ?>demo" class="btn btn-primary">Add Stock Transfer</a>
</button>
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0 mt-2" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">From WareHouse</th>
											<th class="text-center">To WareHouse</th>
											<th class="text-center">Transfer Date</th>
											<th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($getdata as $rrr){ 
										$this->db->select('*'); 
			                            $this->db->from('warehouse');     
			                            $this->db->where('id',$rrr['warehouse_from']);
		                                $aa=$this->db->get()->row_array();
										
										$this->db->select('*'); 
			                            $this->db->from('warehouse');      
			                            $this->db->where('id',$rrr['warehouse_to']);
		                                $bb=$this->db->get()->row_array();
										//print_r($aa);die('0000');
					   ?>
					 <tr>
					 <td class="text-center"><?php echo $rrr['id'];?></td>
                     <td class="text-center"><?php echo $aa['name'];?></td>
					 <td class="text-center"><?php echo $bb['name'];?></td>
					 <td class="text-center"><?php echo $rrr['date'];?></td>
					 
					  <td><a href="<?php echo base_url().'tranferProduct?id='.$rrr['id'];?>" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a></td>
                                 
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Money Transfer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>editMoneyTransfer" method="post" enctype='multipart/form-data'>
                                <div class="row mb-4">
                                <label for="from_account1" class="col-sm-3 col-form-label">From Ware House</label>
                                <div class="col-sm-9">
								<input type="hidden" name="id" id="id1">
                                  <select name="from_account1" id="from_account1" class="form-control">
								  <option value="0">Select Product</option>
								  <?php foreach($data1 as $res1){?>
								  <option value="<?php echo $res1['id'];?>"><?php echo $res1['name'];?></option>
								  <?php }?>
								  </select>
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="to_account1" class="col-sm-3 col-form-label">To Ware House</label>
                                <div class="col-sm-9">
                                 <select name="to_account1" id="to_account1" class="form-control">
								  <option value="0">Select Account</option>
								  <?php foreach($data1 as $res1){?>
								  <option value="<?php echo $res1['id'];?>"><?php echo $res1['name'];?></option>
								  <?php }?>
								  </select>
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
	  
	   
	   
       <h5 class="modal-title" id="exampleModalLabel">Add Money Transfer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>addMoneyTransfer" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="from_account" class="col-sm-3 col-form-label">From Ware House</label>
                               <div class="col-sm-9">
                                 <select name="warehouse" id="warehouse" class="form-control" >
                                    <option value="0">Select Warehouse</option>
									  <?php foreach($data5 as $res){
									
									  ?>
                                    <option value="<?php echo $res['id'];?>"><?php echo $res['name'];?></option>
                                     <?php }
									  
									  ?>
                                 </select> 
                                </div>
                            </div>
							
							
							 <div class="row mb-4">
                                <label for="to_account" class="col-sm-3 col-form-label">To Ware House</label>
                                <div class="col-sm-9">
                                  <select name="to_account" class="form-control">
								  <option value="0">Select Account</option>
								  <?php foreach($data1 as $res1){?>
								  <option value="<?php echo $res1['id'];?>"><?php echo $res1['name'];?></option>
								  <?php }?>
								  </select>
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
	   function edit(a,b,c,d){

	 $('#id1').val(a);
	 $('#from_account1').val(b);
	 $('#to_account1').val(c);
	 $('#amount1').val(d);
	
	    
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