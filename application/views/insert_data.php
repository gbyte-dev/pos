<?php 
   /*ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);*/
   
   //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
   include 'assets/lang/en.php'; 
   
   ?>
<head>
   <title>Add Product</title>
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
   .fluid1 {
   width: 384px!important;
   margin-left:10px!important;
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
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>products">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transfer Product</li>
                     </ol>
                  </nav>
                  <form action="<?= base_url() ?>transfer" method="post" enctype='multipart/form-data'>
                     <div class="row mb-4">
                        <label for="from_account" class="col-sm-3 col-form-label">From Ware House</label>
						
                        <div class="col-sm-9">
                           <select name="warehouse" id="warehouse"  class="ui fluid search dropdown"  onchange="sub1(this.value)">
                             <?php //echo $data9['product_name']  ?>
                              <?php foreach($data15 as $data13){
                                 ?>
                              <option value="<?php echo $data13['id'];?>" <?php if($data11['warehouse_from'] ==$data13['id'] ) { echo "selected"; } ?>><?php echo $data13['name'];?></option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-4">
                        <label for="from_account" class="col-sm-3 col-form-label">Select Product</label>
                        <select class="ui fluid search dropdown fluid1" multiple id="select1" onchange="sub2(this.value)">
                           <?php 
                              $pro_qry=explode(",",$data11['pro_qty']);
                              
                              foreach($data20 as $res1){
                              
                              ?>
                           <option  value="<?php echo $res1['id'];?>"
                              <?php if (in_array($res1['id'], $pro_qry)){echo "selected";} ?>><?php echo $res1['product_name'];?></option>
                           <?php }
                              ?>
                        </select>
                     </div>
                     <div class="row mb-4">
                        <label for="to_account" class="col-sm-3 col-form-label">To Ware House</label>
                        <div class="col-sm-9">
                           <select name="warehouse" id="warehouse" class="ui fluid search dropdown" >
                              
							  
                              <?php foreach($data12 as $data13){
                                 ?>
                              <option value="<?php echo $data13['id'];?>" <?php if($data11['warehouse_to'] ==$data13['id'] ) { echo "selected"; } ?>><?php echo $data13['name'];?></option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                     <div class="row justify-content-end"> 
                        <div class="col-sm-9">
                           <div>
                              <div class="row justify-content-end">
                                 <div class="col-sm-9">
                                    <div>
                                       <button type="submit" class="btn btn-primary w-md">Next</button>
                                    </div>
                                 </div>
                              </div>
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
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
			   <form action="<?= base_url() ?>insert_new" method="post" enctype='multipart/form-data'>
                  <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                     <thead>
                        <tr>
                           <th class="text-center">Product Name</th>
                           <th class="text-center">Current Quantity</th>
                           <th class="text-center">Quantity Transfer</th>
                        </tr>
                     </thead>
                     <tbody id ="ffff">

                      <input type="hidden" name="last_insert" value="<?php echo $lastdata;?>">
					  
					  
					    <?php 
						//print_r($data11);
						
						 $pro_id_exp=explode(",",$data11['pro_qty']);
						//print_r($pro_id_exp);
						//die('======');
						$this->db->select('*'); 
			                            $this->db->from('transfer_product');     
			                            $this->db->order_by('id', 'DESC'); 
		                                $last_record=$this->db->get()->row_array();
										//print_r($last_record);die('====');
										$insert_last=$last_record['warehouse_to'];
										
						foreach($pro_id_exp as $res1){
							
							$this->db->select('*'); 
			                            $this->db->from('products');     
			                            $this->db->where('id',$res1);
		                                $aa=$this->db->get()->row_array();
										//print_r($aa);die();
										
							?>
						
					 <tr>
					 <input type="hidden" name="curr_qty[]" value="<?php echo $aa['quantity'];?>">
					 <input type="hidden" name="insert_last" value="<?php echo $insert_last;?>">
					<td class="text-center"><?php echo $aa['product_name'];?></td>
                    <td class="text-center"><?php echo $aa['quantity'];?></td>
                    <td class="text-center">
					<input type="hidden" class="" name="product_id[]" value="<?php echo $aa['id'];?>">
					<input type="text" class="form-control" name="tranfer_qty[]"></td>
                                       
					 </tr>
					 
						<?php }?>
						
						
                     </tbody>
                  </table>
				  <button type="submit" class="btn btn-primary w-md pull-left" style="float: right;">Submit</button>
				  </form>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
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
<link href=
   "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
   rel="stylesheet" />
<script src=
   "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<!-- App js -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>
</html>
<script>
   $('.ui.dropdown').dropdown();
   
   function sub1(a) {
   //alert(a);
   
   $.ajax({
   url: "<?php echo base_url().'demoajax'?>",
   cache: false,
   type: "POST",
   data: {
   id: a
   },
   success: function(html) {
   
   $("#select1").html(html);
   }
   });
   }
   
   
   function sub2(a) {
   //alert(a);
   if(a){
   $.ajax({
   url: "<?php echo base_url().'showdata'?>",
   cache: false,
   type: "POST",
   data: {
   id: a
   }, 
   dataType: "json",
   success: function(html) {
   
   var markup = '<tr><td class="text-center" >'+html.name+'</td><td class="text-center" >'+html.qyt+'</td><td class="text-center" ><input type="text" class=""></td></tr>';
   
   $("#ffff").append(markup);
   //$("#text3").text('<input type="text" value=' '>');
   
   }
   });
   }
   }
   
   
   
   
   
</script>