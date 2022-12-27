<?php //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Coupons</title>
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
		
		<?php if(isset($_GET['msg']) && $_GET['msg']=='coup_add'){?>
	<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Coupon Added Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
	
<?php }if(isset($_GET['msg']) && $_GET['msg']=='coup_del'){?>
<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Coupon Deleted Succesfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=='coup_edit'){ ?>

<script>
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Coupon Updated Succesfully',
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

<?php } ?>
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Coupons</h4>

                      
	
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Bulk Import
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Import</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>addBulkCoupon" method="post" enctype='multipart/form-data'>
                            
							
							
							 <div class="row mb-4">
                                <label for="bulk" class="col-sm-3 col-form-label">Bulk</label>
                                <div class="col-sm-9">
                                  <input type="file" name="bulk" class="form-control" id="bulk"  required>
                                </div>
                            </div>
							
<a href="<?php echo base_url()."assets/bulk_files/sample_coupon.csv"?>" download="sample_coupon.csv">Download Sample CSV</a>

 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
                            
                        </form>
      </div>
     
    </div>
  </div>
</div>


                        </div>
                    </div>
                </div>
                <!-- end page title -->

               <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
<a href="<?php echo base_url().'addCoupon'?>" class="btn btn-primary m-auto">Add Coupon</a><br/><br/>

                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                     <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Coupon Code</th>
                                            <th class="text-center">Coupon Type</th>
                                            
                                           
                                            <th class="text-center">Start Date</th>
											<th class="text-center">Expire Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                         <?php foreach($data as $res){?>
                                       <tr>
                                        <td class="text-center"><?php echo $res['id'];?></td>
                                        <td class="text-center"><?php echo $res['title'];?></td>
                                        <td class="text-center"><?php echo $res['coupon_code'];?></td>
                                        <td class="text-center"><?php if($res['coupon_type']==1){echo "Default";}else{echo "First Order";}?></td>
										
										
										  <td class="text-center"><?php echo $res['start_date'];?></td>
										  <td class="text-center"><?php echo $res['expire_date'];?></td>

                                        
                                        
	
                                        <td class="text-center">
                                            <a href="<?php echo base_url().'editCoupon?id='.$res['id'];?>" class="btn btn-success btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a onclick="remove('<?php echo base_url().'deleteCoupon?id='.$res['id'];?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
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
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php //include 'layouts/right-sidebar.php'; ?>
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