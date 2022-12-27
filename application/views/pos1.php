<?php include 'layouts/head-main.php';
  include 'assets/lang/en.php'; 
  ?>
<head>
  <title>POS</title>
  <?php include 'layouts/head.php'; ?>
  <?php include 'layouts/head-style.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
  *,
  *:after,
  *:before {
  box-sizing: border-box;
  }
  $primary-color: #00005c; // Change color here. C'mon, try it! 
  $text-color: mix(#000, $primary-color, 64%);
  body {
  font-family: "Inter", sans-serif;
  color: $text-color;
  font-size: calc(1em + 1.25vw);
  background-color: mix(#fff, $primary-color, 90%);
  }
  form {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  }
  label {
  display: flex;
  cursor: pointer;
  font-weight: 500;
  position: relative;
  overflow: hidden;
  margin-bottom: 0.375em;
  /* Accessible outline */
  /* Remove comment to use */ 
  /*
  &:focus-within {
  outline: .125em solid $primary-color;
  }
  */
  input {
  position: absolute;
  left: -9999px;
  &:checked + span {
  background-color: mix(#fff, $primary-color, 84%);
  &:before {
  box-shadow: inset 0 0 0 0.4375em $primary-color;
  }
  }
  }
  span {
  display: flex;
  align-items: center;
  padding: 0.375em 0.75em 0.375em 0.375em;
  border-radius: 99em; // or something higher...
  transition: 0.25s ease;
  &:hover {
  background-color: mix(#fff, $primary-color, 84%);
  }
  &:before {
  display: flex;
  flex-shrink: 0;
  content: "";
  background-color: #fff;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  margin-right: 0.375em;
  transition: 0.25s ease;
  box-shadow: inset 0 0 0 0.125em $primary-color;
  }
  }
  }
  // Codepen spesific styling - only to center the elements in the pen preview and viewport
  .container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  }
  // End Codepen spesific styling
  @media only screen and (max-width: 600px) {
  body {
  background-color: lightblue;
  }
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
        
        <div class="row">
          <div class="col-md-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">POS</h4>
              <h4 class="mb-sm-0 font-size-18"><?php $biller_name =	biller_name($_SESSION['id']);
                echo "Biller: $biller_name";						
                ?></h4>
            </div>
          </div>
        </div>
        <!-- end page title -->
        <?php //print_r($_SESSION);?>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 padding-y-sm mt-2">
                    <div class="row">
                      <div class="col-md-4 padding-y-sm mt-2">
                        <form action="" method="post"> 
                          <input type="text" name="search" class="w-100" onkeyup="suggest(this.value)" Placeholder="Search" >
                        </form>
                      </div>
                      <div class="col-md-4 padding-y-sm mt-2">
                        <div class="row mb-4">
                          <div class="col-md-12">
                            <select name="category" id="category" class="form-control" onchange="sub(this.value)">
                              <option value="0">Select Category</option>
                              <?php foreach($data as $res){
                                ?>
                              <option value="<?php echo $res['id'];?>"><?php echo $res['category'];?></option>
                              <?php }
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 padding-y-sm mt-2 ">
                        <div class="row mb-4 ">
                          <div class="col-md-12" class="form-control">
                            <select name="subcategory" id="subcategory" class="form-control" onchange="suggest_subcategory(this.value)">
                              <option value="0">Select Sub Category</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" id="append_image">
                      <?php foreach($data2 as $res2){
                        ?>
                      <div class="col-md-6 mt-3" style="cursor:pointer;">
                        <div class="row" 
                          onclick="add_cart(
                          '<?php echo $res2['id'];?>',
                          '<?php echo $rand;?>'
                          )">
                          <div class="col-md-5">
                            <?php if($res2['display_image']){?>
                            <div class="col-md-4 m-auto mt-2" id="disp_image">
                              <img src="<?php echo base_url()?>/assets/singleProductImg/<?php echo $res2['display_image'];?>" height="70px" width="70px" />
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-4 m-auto mt-2" id="disp_image"><img src="<?php echo base_url()?>/assets/singleProductImg/default.png" height="70px" width="70px" /></div>
                            <?php } ?>
                          </div>
                          <div class="col-md-7 p-2">
                            <?php echo $res2['product_name'];?><br/>
                            <?php echo $res2['currency'].' '.$res2['discounted_price'];?>&nbsp;&nbsp;<del style="font-size:10px;"><?php echo $res2['currency'].' '.$res2['selling_price'];?></del><br/>
                            <span>Qty: <?php echo $res2['quantity'];?></span>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" id="product_name" value="<?php echo $res2['product_name']; ?>" >					
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 h-100">
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
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mt-2"><button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Customer
                    </button>
                  </div>
                  <div class="col-md-6 mt-2"><button type="button" class="btn btn-primary float-end w-100" >
                    New Order
                    </button>
                  </div>
                </div>
                <br/>
                <p>Current Customer : <span id="name"></span></p>
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
                  <div class="col-md-6 text-right" >Sub total :</div>
                  <div class="col-md-6 pull-right" id="sub_total"> 0</div>
                  <div class="col-md-6 text-right">Product discount :</div>
                  <div class="col-md-6 pull-right" id="disco"> 0</div>
                  <div class="col-md-6 text-right">Extra discount :</div>
                  <div class="col-md-6 pull-right"> <span id="default">0</span><span id="extra_discount"></span><span><button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    <i class="fa fa-edit"></i>
                    </button></span>
                  </div>
                  <div class="col-md-6 text-right">Coupon discount :
                  </div>
                  <div class="col-md-6 pull-right"><span id="coupon_discount">0</span> 
				  <span><button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                    <i class="fa fa-edit"></i>
                    </button></span>
                  </div>
                  <div class="col-md-6 text-right">Tax :</div>
                  <div class="col-md-6 pull-right" id="tax"> 0</div>
                  <div class="col-md-6 text-right">Total :</div>
                  <div class="col-md-6 pull-right" id="total"> 0</div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-md-6 mt-2"><a onclick="cancel()" class="btn btn-danger w-100" >
                    Cancel
                    </a>
                  </div>
                  <div class="col-md-6 mt-2"><button type="button" class="btn btn-primary float-end w-100" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Order
                    </button>
                  </div>
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
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" min="10" maxlength="11" onkeypress="return isNumber(event)" required>
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
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Extra Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form">
            <div class="row">
              <div class="col-md-6">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Discount</label>
                <div class="col-sm-12">
                  <input type="text" name="discount" class="form-control" id="extradiscount"  required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="horizontal-firstname-input" class="col-form-label">Type</label>
                  <div class="col-md-12">
                    <label class="col-sm-12" >
                      <select name="type" id="type" class="form-control ">
                        <option value="1">Amount($)</option>
                        <option value="2">Percent(%)</option>
                      </select>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit"  class="btn btn-primary"  data-bs-dismiss="modal" id="add_extra_discount">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Coupon Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form">
            <div class="row mb-4">
              <label for="coupon_code" class="col-sm-3 col-form-label">Coupon Code</label>
              <div class="col-sm-9">
                <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" required>
                <span id="error" ></span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit"  class="btn btn-primary"   id="add_coupon_discount">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose Payment Method</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div>
              <?php foreach($data3 as $res3){?>
              <label>
              <input type="radio" name="radio" id="method" value="<?php echo $res3['id'];?>"/>
              &nbsp;&nbsp;<span><?php echo $res3['payment']; ?></span>
              </label>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-primary"  data-bs-dismiss="modal" id="submit">Submit</button>
        </div>
      </div>
    </div>
    <input type="hidden" id="coupon_price" value="">
  </div>
  <?php include 'layouts/footer.php'; ?>
</div>
<?php include 'layouts/vendor-scripts.php'; ?>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<script>
  $('#status').click(function() {
      var stat = $('#status').prop('checked');
      if (stat == true) {
          $('#status').val(1);
      }
      if (stat == false) {
          $('#status').val(0);
      }
  });
  
  
  function sub1(a) {
      if (a > 0) {
          $.ajax({
              url: "<?php echo base_url().'ajax_name'?>",
              cache: false,
              type: "POST",
              data: {
                  id: a
              },
              success: function(html) {
                  $("#name").text(html);
              }
          });
      }
  }
  
  function sub(a) {
  	
      $.ajax({
          url: "<?php echo base_url().'ajax_subcategory'?>",
          type: "POST",
          data: {
              id: a
          },
          cache: false,
          success: function(html) {
              $("#subcategory").html(html);
          }
      });
  
  
      $.ajax({
          url: "<?php echo base_url().'ajax_suggest_category'?>",
          type: "POST",
          data: {
              id: a
          },
          cache: false,
          success: function(html) {
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
  
  $('#add').click(function() {
      var first_name = $('#first_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var address = $('#address').val();
      var status = $('#status').val();
      
      if (first_name != "" && last_name != "" && email != "" && phone != "" && address != "") {
          $.ajax({
              url: "<?php echo base_url().'ajax_add_customer'?>",
              type: "POST",
              data: {
                  first_name: first_name,
                  last_name: last_name,
                  email: email,
                  phone: phone,
                  address: address,
                  status: status
              },
              cache: false,
              success: function(html) {
                  $("#customer").append(html);
              }
          });
      }
  });
  
  
  function cancel() {
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
  window.location = window.location.href;
          }
      })
  }
  
  
  function suggest(a) {
  
      $.ajax({
          url: "<?php echo base_url().'ajax_suggest'?>",
          type: "POST",
          data: {
              like: a
          },
          cache: false,
          success: function(html) {
              $("#append_image").html(html);
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: <?php echo $rand; ?>
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
          }
      });
  }
  
  
  function suggest_subcategory(a) {
  
      $.ajax({
          url: "<?php echo base_url().'ajax_suggest_subcategory'?>",
          type: "POST",
          data: {
              id: a
          },
          cache: false,
          success: function(html) {
  
              $("#append_image").html(html);
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: <?php echo $rand; ?>
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
          }
      });
  }
  
  function add_cart(a, b) {
  
      $.ajax({
          url: "<?php echo base_url().'add_cart'?>",
          type: "POST",
          dataType: "json",
          data: {
              product_id: a,
              rand: b
          },
          cache: false,
          success: function(html) {
             
              if (html.html) {
                  
                  $('#app_tr').append(html.html)
              } else {
                 
                  $('#upcart_' + a).text(html.subto)
                  $('#qty_' + a).val(html.qty)
              }
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: b
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
  
          }
      });
  
  }
  
  function destroy(a, b) {
     
      $.ajax({
          url: "<?php echo base_url().'ajax_destroy'?>",
          cache: false,
          data: {
              id: a
          },
          type: "POST",
          success: function(html) {
   $('#extra_discount').text(0);
   $('#coupon_discount').text(0);
              $('#des_' + a).html('');
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: b
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
          }
      });
  
  }
  
  
  function update_cart(a, b, c, d, e) {
      $.ajax({
          url: "<?php echo base_url().'ajax_update_cart'?>",
          data: {
              product_qty: a,
              product_id: b,
              rand: c,
              unit_price: d,
              currency: e
          },
          type: "POST",
          cache: false,
          success: function(html) {
  		
  		if(html=="error"){
  		$('#upcart_' + b).html('');
  		$('#qty_'+b).val(0);
  		$('#unit').text(0);
  		$('#sub_total').text(0);
                      $('#disco').text(0);
                      $('#tax').text(0);
                      $('#total').text(0);
  			
  	   
  	   
  	   Swal.fire({
    title: 'Max Quantity Reach',
   
    icon: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK'
  }).then((result) => {
    if (result.isConfirmed) {
      //
    }
  })
  	 
  		}
  			if(html!="error"){
  			$('#upcart_' + b).html(html);
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: c
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
  			}
  
          }
      });
  }
  
  
  $('#add_extra_discount').click(function() {
   
      var value = $('#extradiscount').val();
      var type = $('#type').find(":selected").val();
    
      $.ajax({
          url: "<?php echo base_url().'ajax_add_extra_discount'?>",
          type: "POST",
          data: {
              value: value,
              type: type
          },
          cache: false,
          success: function(html) {
              $.ajax({
                  url: "<?php echo base_url().'ajax_read_cart'?>",
                  type: "POST",
                  data: {
                      rand: <?php echo $rand; ?>,
  					value: value,
              type: type
                  },
                  cache: false,
                  dataType: "json",
                  success: function(html) {
                      $('#sub_total').text(html.subtotal);
                      $('#disco').text(html.discount);
                      $('#tax').text(html.tax);
                      $('#total').text(html.total);
                  }
              });
              $('#extra_discount').html(html);
              $('#default').hide();
  
          }
      });
  });
  
  $('#submit').click(function(){
  	
  	
  	var dta=$('#app_tr').html();
  	str = dta.replace(/\s/g, '');
  	
  	if(str==""){
  	swal("Please Add A Product In Cart");
  	return false; 
  	}
  	var customer_id=$('#customer').val();
  	if(customer_id == 0){
  	swal('Please Select A Customer');
  	return false;
  	}
  	var random=<?php echo $rand;?>;
  	var payment_method=$('#method:checked').val();
  	
  	var sub_total= $('#sub_total').val();
  	var product_discount= $('#disco').val();
  	var value = $('#extradiscount').val();
      var type = $('#type').find(":selected").val();
  	var tax=$('#tax').val();
  	var coupon=$('#coupon_code').val();
  	
  	
  	if(payment_method==undefined){
  	swal('Select Payment Method');
  	return false;
  	}
  	
  	else{
  	 $.ajax({
                  url: "<?php echo base_url().'ajax_submit_order'?>",
                  type: "POST",
                  data: {customer_id:customer_id,
                      rand:random,
  					payment_method:payment_method,
  					value: value,
              type: type,coupon:coupon
                  },
                  cache: false,
                 // dataType: "json",
                  success: function(html) {
  				
     //alert(html);
  
   $.ajax({
  	 url: "<?php echo base_url().'ajax_final_cart'?>",
                  type: "POST",
                  data: {sale_id:html,rand:random
                      
                  },
                  cache: false,
                 // dataType: "json",
                  success: function(html) {
                     
                  }
              });
  			 location.reload();
  
                  }
              });
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
  
  
  $('#add_coupon_discount').click(function(){
  	
  	var coupon_code=$('#coupon_code').val();
  	var customer_id=$('#customer').val();
  $.ajax({	
  	url: "<?php echo base_url().'ajax_coupon_discount'?>",
                  type: "POST",
                  data: {coupon_code:coupon_code,
  				customer_id:customer_id,
  				cart_key:<?php echo $rand;?>
                  },
                  cache: false,
  				dataType: "json",
                  success: function(html) {
  				//json=$.parseJSON(html);
  				//alert(html.coupon_discount);
  				
  if(html.status=="expire" || html.status=="" || html.status=="invalid"){
  	if(html.status=="expire"){
  	$('#error').html('<span class="text-danger">Coupon Is Expired</span>');
  	
  				}if(html.status==""){
  				
  				$('#error').html('<span class="text-success">Coupon Applied Successfully</span>');
  				$('#exampleModal4').modal('hide');
				$('#coupon_discount').text(html.coupon_discount);
  				}
  				if(html.status=="invalid"){
  				$('#error').html('<span class="text-danger">Invalid Coupon</span>');
  				
  				}
  				}
  				else{
  				$('#error').text(html.status);
  				}
  				if(html.coupon_error){
  				$('#error').text(html.coupon_error);
  				
  				}
  				if(html.total!=0){
  				$('#coupon_price').val(html.total);
  				$('#total').text(html.total);
  				}
  				
  				}	
  });	
  });
</script>