<?php //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Warehouse Products</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
		<?php if(isset($_GET['msg']) && $_GET['msg']=='pro_add'){?>
	<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Product Added Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
	
<?php }if(isset($_GET['msg']) && $_GET['msg']=='pro_del'){?>
<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Product Deleted Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=='pro_edit'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Product Updated Succesfully',
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
                            <h4 class="mb-sm-0 font-size-18">Warehouse Products</h4>

                            

                        </div>
                    </div>
                </div>
                <!-- end page title -->

               <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card"> 
                            <div class="card-body">
<!--a href="<?php echo base_url().'ProductController/form'?>" class="btn btn-primary m-auto">Add Product</a-->

                                <table id="datatable-buttons" class="table table-bordered dt-responsive  w-100">
                                     <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Currenct Qty</th>
                                            <th class="text-center">Transfer Qty</th>
                                           
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                         
                                       <?php 
					   $aa=1;
					  // print_r($getdata);die('===');
					   foreach($getdata as $rrr){ 
					   ?>
					 <tr>
					 <td class="text-center"><?php echo $rrr['id'];?></td>
                     <td class="text-center"><?php echo $rrr['warehouse_from'];?></td>
					 <td class="text-center"><?php echo $rrr['warehouse_to'];?></td>
					  <td class="text-center"><?php echo $rrr['warehouse_to'];?></td>
					  <td><a href="<?php echo base_url().'tranferProduct?id='.$rrr['id'];?>" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a></td>
                     
					
                                       
					 </tr>
					
						<?php 
						
						} ?>
                                    
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
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Required datatable js -->


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