<?php 

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    //include 'layouts/session.php'; ?>
    <?php include 'layouts/head-main.php';
        include 'assets/lang/en.php'; 
       // session_start();
    ?>

    <head>
        
        <title>POS</title>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <div class="page-content">
           
  <div class="container-fluid">
<?php 
	//echo $rand;
	?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">POS</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
					
                        <div class="col-12 padding-y-sm mt-2">
                            
                            <div class="row">
                                <div class="col-4 padding-y-sm mt-2">
                                    <form action="" method="post"> 
                                        <input type="text" name="search" class="form-control" onkeyup="suggest(this.value)" Placeholder="Search">
                                    </form>
                                </div>
                                <div class="col-4 padding-y-sm mt-2">
                                   <div class="row mb-4">
                                     
                                    <div class="col-sm-12">
                                       <select name="category" id="category" class="form-control" onchange="sub(this.value)">
                                        <option value="0">--Select Category--</option>
                                        <?php foreach($data as $res){
                                            
                                        ?>
                                        <option value="<?php echo $res['id'];?>"><?php echo $res['category'];?></option>
                                        <?php }
                                          
                                        ?>
                                    </select> 
                                </div>
                            </div>
                        </div>
						 <div class="col-4 padding-y-sm mt-2 ">
                                   <div class="row mb-4 ">
                               
                                <div class="col-sm-12" class="form-control">
                                 <select name="subcategory" id="subcategory" class="form-control" onchange="suggest_subcategory(this.value)">
                                    <option value="0">--Select Sub Category--</option>
                                   
                                 </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row" id="append_image">
                        <?php foreach($data2 as $res){?>
                        <div class="col-6 mt-3">
                            <div class="row" 
onclick="add_cart('<?php echo $res['product_name'];?>',
	'<?php echo $res['currency'];?>',
	'<?php echo $res['display_image'];?>',
	'<?php echo $res['discounted_price'];?>',
	'<?php echo $res['id'];?>',
	'<?php echo $res['tax'];?>',
	'<?php echo $rand;?>'
	)">
							
							<div class="col-5"><?php if($res['display_image']){?>
                                
                               <div class="col-md-4 m-auto mt-2" id="disp_image"><img src="<?php echo base_url()?>/assets/singleProductImg/<?php echo $res['display_image'];?>" height="70px" width="70px" /></div>
                               <?php } ?></div>
                               <div class="col-7 p-2">
                                <?php echo $res['product_name'];?><br/>
                                <?php echo $res['currency'].' '.$res['selling_price'];?>&nbsp;&nbsp;<del style="font-size:10px;"><?php echo $res['currency'].' '.$res['cost_price'];?></del>
                            </div>
                        </div>
                    </div>
<input type="hidden" id="product_name" value="<?php echo $res['product_name']; ?>" >					
					
                    <?php } ?>
                </div>
            </div>
            

        </div>
        


    </div>
</div>
</div>



<div class="col-4 ">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 h-100">
                   <div class="row mb-4 ">
                     
                    <div class="col-sm-12 ">
                       <select name="customer" id="customer" class="form-control" onchange="sub1(this.value)">
                        <option value="0">--Select Customer--</option>
                        <?php foreach($data1 as $res1){
                           
                        ?>
                        <option value="<?php echo $res1['id'];?>"><?php echo $res1['first_name'].' '.$res1['last_name'];?></option>
                        <?php }
                          
                        ?>
                    </select> 
                </div>
            </div>
        </div></div>
        <div class="row">
            <div class="col-6"><button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
               Customer
           </button></div>

           <div class="col-6"><button type="button" class="btn btn-primary float-end w-100" >
               New Order
           </button></div>
       </div>
       
       <br/>
       <p>Current Customer : <span id="name"></span></p>
       
       <div class="row">
        <div class="col-6"> <div class="row mb-4">
         
            <div class="col-sm-12">
               <select name="select" id="select" class="form-control" >
                <option value="0">Select</option>
                <?php //foreach($data1 as $res){
                   
                ?>
                <option value="<?php //echo $res['id'];?>"><?php //echo $res['first_name'].' '.$res['last_name'];?></option>
                <?php //}
                  
                ?>
            </select> 
        </div>
    </div></div>

    <div class="col-6"><button type="button" class="btn btn-danger float-end w-100" >
       Clear Cart
   </button></div>
</div>
<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 p-2">
                                     <thead>
                                        <tr>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Qty.</th>
                                            <th class="text-center">Unit Price</th>
											<th class="text-center">Sub Total</th>
                                            <th class="text-center">Delete</th>
                                           
                                        </tr>
                                    </thead>
									 <tbody id="app_tr">
	 
	 
                                       
	 
									
										 </tbody>
									</table>
					<div class="row">				
<div class="col-6 text-right">Sub total :</div><div class="col-6 pull-right"> 0</div>
<div class="col-6 text-right">Product discount :</div><div class="col-6 pull-right"> 0</div>
<div class="col-6 text-right">Extra discount :</div><div class="col-6 pull-right"> 0</div>
<div class="col-6 text-right">Coupon discount :</div><div class="col-6 pull-right"> 0</div>
<div class="col-6 text-right">Tax :</div><div class="col-6 pull-right"> 0</div>
<div class="col-6 text-right">Total :</div><div class="col-6 pull-right"> 0</div>

</div>

<br/>
<div class="row">
            <div class="col-6"><a onclick="cancel()" class="btn btn-danger w-100" >
               Cancel
           </a></div>

           <div class="col-6"><button type="button" class="btn btn-primary float-end w-100" >
               Order
           </button></div>
       </div>
	   
</div>
</div>
</div> 
</div> 

</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="form">
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" required>
              </div>
          </div>
          
          <div class="row mb-4">
            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" required>
          </div>
      </div>
      
      <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
      </div>
  </div>
  
  <div class="row mb-4">
    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone Number</label>
    <div class="col-sm-9">
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required>
  </div>
</div>

<div class="row mb-4">
    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-9">
      <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
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
    <button type="submit"  class="btn btn-primary"  data-bs-dismiss="modal" id="add">Add</button>
</div>

</div>
</div>

</div>
</div>
</div>
</div>
<?php include 'layouts/footer.php'; ?>

</div>

<?php include 'layouts/vendor-scripts.php'; ?>

<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>

<script>

    $('#status').click(function(){
        var stat=$('#status').prop('checked');
		if(stat==true){
			$('#status').val(1);
		}
		if(stat==false){
			$('#status').val(0);
		}
	});


    function sub1(a){

        if(a>0){
            $.ajax({
              url: "<?php echo base_url().'ajax_name'?>",
              cache: false,
              type: "POST",
              data: {id : a},
              success: function(html){
                $("#name").text(html);
            }
        });
        }
    }
	
	function sub(a){
	//alert(a);
	
	$.ajax({
  url: "<?php echo base_url().'ajax_subcategory'?>",
  type: "POST",
  data: {id : a},
  cache: false,
  success: function(html){
  
    $("#subcategory").html(html);
  }
});


$.ajax({
  url: "<?php echo base_url().'ajax_suggest_category'?>",
  type: "POST",
  data: {id : a},
  cache: false,
  success: function(html){
  
    $("#append_image").html(html);
  }
});
	}
    
	
	$("#category").select2({
	selectOnClose: true
	
	});
	
	$("#subcategory").select2({
	selectOnClose: true
	
	});
	
	$("#customer").select2({
	selectOnClose: true
	
	});
	
	$("#select").select2({
	selectOnClose: true
	
	});
	
	$('#add').click(function(){
	var first_name=$('#first_name').val();
	
	var last_name=$('#last_name').val();
	var email=$('#email').val();
	var phone=$('#phone').val();
	var address=$('#address').val();
	var status=$('#status').val();
	//alert(status);
	if(first_name != "" && last_name != "" && email != "" && phone != "" && address != ""){
		$.ajax({
  url: "<?php echo base_url().'ajax_add_customer'?>",
  type: "POST",
  data: {first_name : first_name,last_name:last_name,email:email,phone:phone,address:address,status:status},
  cache: false,
  success: function(html){
  
    $("#customer").append(html);
  }
});
	}
});


 function cancel(){
	   
	   
	   Swal.fire({
  title: 'Are you sure?',
  text: "You Want To Cancel The Order!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, cancel it!',
   cancelButtonText: 'No'
}).then((result) => {
  if (result.isConfirmed) {
   
  }
})
	   }
	   
	   
	   function suggest(a){
	   
	   $.ajax({
  url: "<?php echo base_url().'ajax_suggest'?>",
  type: "POST",
  data: {like:a},
  cache: false,
  success: function(html){
  
    $("#append_image").html(html);
  }
});
	   }
	   
	   
	    function suggest_subcategory(a){
	   
	   $.ajax({
  url: "<?php echo base_url().'ajax_suggest_subcategory'?>",
  type: "POST",
  data: {id:a},
  cache: false,
  success: function(html){
  
    $("#append_image").html(html);
  }
});
	   }
	   
	   
	   
	   function add_cart(a,b,c,d,e,f,g){
	
	$.ajax({
  url: "<?php echo base_url().'add_cart'?>",
  type: "POST",
  data: {product_name : a,currency:b,image:c,unit_price:d,id:e,tax:f,rand:g},
  cache: false,
  success: function(html){
  $('#app_tr').append(html)
  
    $.ajax({
		url: "<?php echo base_url().'ajax_read_cart'?>",
  type: "POST",
  data: {rand:g},
  cache: false,
  success: function(html){
  $('#app_tr').append(html)
    
  }
});
	
  }
});
	
}
	   
	   function destroy(a){
	
		$.ajax({
  url: "<?php echo base_url().'ajax_destroy'?>",
  cache: false,

  success: function(html){
  
  $('#des_'+a).html('');
    
  }
});
	
}


  function update_cart(a,b,c,d,e){
	
		$.ajax({
  url: "<?php echo base_url().'ajax_update_cart'?>",
     data: {product_qty:a,product_id:b,rand:c,unit_price:d,currency:e},
	 type: "POST",
  cache: false,
  success: function(html){
  
  $('#upcart_'+b).html(html);
    
  }
});
	
}
</script> 