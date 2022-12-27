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
    <title>Edit Product</title>
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
    <li class="breadcrumb-item"><a href="<?= base_url() ?>stocks">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
  </ol>
</nav>

                        <form action="<?= base_url() ?>editStockPro" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
							<input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="product_name" class="form-control" id="horizontal-firstname-input" placeholder="Enter Product Name" value="<?php echo $data['product_name'];?>" required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Cost Price</label>
                                <div class="col-sm-9">
                                  <input type="text" name="cost_price" class="form-control" id="horizontal-firstname-input" placeholder="Enter Cost Price" value="<?php echo $data['cost_price'];?>" onkeypress="return isNumber(event)" required>
                                </div>
                            </div>
                           
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Marked Price</label>
                                <div class="col-sm-9">
                                  <input type="text" name="selling_price" class="form-control" id="horizontal-firstname-input" placeholder="Enter Selling Price" value="<?php echo $data['selling_price'];?>" onkeypress="return isNumber(event)" required>
                                </div>
                            </div>
<div class="row mb-4">
                                <label for="discounted_price" class="col-sm-3 col-form-label">Discounted Price</label>
                                <div class="col-sm-9">
                                  <input type="text" name="discounted_price" class="form-control" id="discounted_price" placeholder="Enter Discounted Price" value="<?php echo $data['discounted_price'];?>" onkeypress="return isNumber(event)"  required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="tax" class="col-sm-3 col-form-label">Tax</label>
                                <div class="col-sm-9">
                                  <input type="text" name="tax" class="form-control" id="tax" value="<?php echo $data['tax'];?>" placeholder="Enter Tax" onkeypress="return isNumber(event)" required>
                                </div>
                            </div>
							
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Images</label>
                                <div class="col-sm-9">
                                  <input type="file" name="image[]" class="form-control" id="horizontal-firstname-input" placeholder="Enter Your " multiple>
                                </div>
								
								<div class="row mt-2">
								
								<?php foreach($data1 as $res){if($res['name']){?>
								
								<div class="col-md-4 " id="images_<?php echo $res['id']; ?>"><img src="<?php echo base_url()?>assets/multiProductImg/<?php echo $res['name'];?>" height="100%" width="100%" /><span style="font-size:13px;cursor:pointer;" id="image_<?php echo $res['id']; ?>" onclick="del(<?php echo $res['id']; ?>)">&#x2715;</span></div>
								<?php }}?>
								</div>
                            </div>
<br/>
                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Display Image</label>
                                <div class="col-sm-9">
                                  <input type="file" name="display_image" class="form-control" id="horizontal-firstname-input" placeholder="Enter Your ">
								  <input type="hidden" name="display_image" value="<?php echo $data['display_image'];?>">
                                </div>
								
								<?php if($data['display_image']){?>
							
							 <div class="col-md-4 m-auto mt-2" id="disp_image"><img src="<?php echo base_url()?>/assets/singleProductImg/<?php echo $data['display_image'];?>" height="100%" width="100%" /><span style="font-size:13px;cursor:pointer;" id="d_image">&#x2715;</span></div>
								<?php } ?>
                            </div>
<br/>
                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SKU</label>
                                <div class="col-sm-9">
                                  <input type="text" name="sku" class="form-control" id="horizontal-firstname-input" placeholder="Enter SKU " value="<?php echo $data['sku'];?>" required>
                                </div>
                            </div>


                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                  <input type="text" name="description" class="form-control" id="horizontal-firstname-input" placeholder="Enter Description " value="<?php echo $data['description'];?>" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                 <select name="category" class="form-control" onchange="sub(this.value)">
                                    <option value="0">Select Category</option>
									  <?php foreach($data2 as $res){
									
									  ?>
									 
<option value="<?php echo $res['id'];?>" <?php if($data['category']==$res['id']){echo "Selected";}?>><?php echo $res['category'];?></option>
                                     <?php }
									  
									  ?>
                                 </select> 
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category</label>
                                <div class="col-sm-9" class="form-control">
                                 <select name="subcategory" id="subcategory" class="form-control">
                                    <option value="0">Select Sub Category</option>
                                   <?php foreach($data6 as $res){
									
									  ?>
									 
<option value="<?php echo $res['id'];?>" <?php if($data['subcategory']==$res['id']){echo "Selected";}?>><?php echo $res['subcategory'];?></option>
                                     <?php }
									  
									  ?>
                                 </select>
                                </div>
                            </div>

							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-9">
                                  <input type="text" name="quantity" class="form-control" id="horizontal-firstname-input" placeholder="Enter Quantity " value="<?php echo $data['quantity'];?>" required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Supplier</label>
                                <div class="col-sm-9">
                                 <select name="supplier" class="form-control" >
                                    <option value="0">Select Supplier</option>
									  <?php foreach($data4 as $res1){
									
									  ?>
<option value="<?php echo $res1['id'];?>" <?php if($data['supplier']==$res1['id']){echo "Selected";}?>><?php echo $res1['supplier_name'];?></option>
                                     <?php }
									  
									  ?>
                                 </select> 
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Warehouse</label>
                                <div class="col-sm-9">
                                 <select name="warehouse" class="form-control" >
                                    <option value="0">Select Warehouse</option>
									  <?php foreach($data5 as $res){
									
									  ?>
                                    <option value="<?php echo $res['id'];?>"<?php if($data['warehouse']==$res['id']){echo "Selected";}?> ><?php echo $res['name'];?></option>
                                     <?php }
									  
									  ?>
                                 </select> 
                                </div>
                            </div>


<div class="row mb-4">
	<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Currency</label>
                                <div class="col-sm-9">
                                 <select name="currency" class="form-control" >
                                    <option value="0" selected="selected">Select Currency</option>
									 
<option value="USD" <?php if($data['currency']=="USD"){echo "Selected";}?>>United States Dollars</option>
<option value="EUR" <?php if($data['currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="GBP" <?php if($data['currency']=="GBP"){echo "Selected";}?>>United Kingdom Pounds</option>
<option value="DZD" <?php if($data['currency']=="DZD"){echo "Selected";}?>>Algeria Dinars</option>
<option value="ARP" <?php if($data['currency']=="ARP"){echo "Selected";}?>>Argentina Pesos</option>
<option value="AUD" <?php if($data['currency']=="AUD"){echo "Selected";}?>>Australia Dollars</option>
<option value="ATS" <?php if($data['currency']=="ATS"){echo "Selected";}?>>Austria Schillings</option>
<option value="BSD" <?php if($data['currency']=="BSD"){echo "Selected";}?>>Bahamas Dollars</option>
<option value="BBD" <?php if($data['currency']=="BBD"){echo "Selected";}?>>Barbados Dollars</option>
<option value="BEF" <?php if($data['currency']=="BEF"){echo "Selected";}?>>Belgium Francs</option>
<option value="BMD" <?php if($data['currency']=="BMD"){echo "Selected";}?>>Bermuda Dollars</option>
<option value="BRR" <?php if($data['currency']=="BRR"){echo "Selected";}?>>Brazil Real</option>
<option value="BGL" <?php if($data['currency']=="BGL"){echo "Selected";}?>>Bulgaria Lev</option>
<option value="CAD" <?php if($data['currency']=="CAD"){echo "Selected";}?>>Canada Dollars</option>
<option value="CLP" <?php if($data['currency']=="CLP"){echo "Selected";}?>>Chile Pesos</option>
<option value="CNY" <?php if($data['currency']=="CNY"){echo "Selected";}?>>China Yuan Renmimbi</option>
<option value="CYP" <?php if($data['currency']=="CYP"){echo "Selected";}?>>Cyprus Pounds</option>
<option value="CSK" <?php if($data['currency']=="CSK"){echo "Selected";}?>>Czech Republic Koruna</option>
<option value="DKK" <?php if($data['currency']=="DKK"){echo "Selected";}?>>Denmark Kroner</option>
<option value="NLG" <?php if($data['currency']=="NLG"){echo "Selected";}?>>Dutch Guilders</option>
<option value="XCD" <?php if($data['currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="EGP" <?php if($data['currency']=="EGP"){echo "Selected";}?>>Egypt Pounds</option>
<option value="FJD" <?php if($data['currency']=="FJD"){echo "Selected";}?>>Fiji Dollars</option>
<option value="FIM" <?php if($data['currency']=="FIM"){echo "Selected";}?>>Finland Markka</option>
<option value="FRF" <?php if($data['currency']=="FRF"){echo "Selected";}?>>France Francs</option>
<option value="DEM" <?php if($data['currency']=="DEM"){echo "Selected";}?>>Germany Deutsche Marks</option>
<option value="XAU" <?php if($data['currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="GRD" <?php if($data['currency']=="GRD"){echo "Selected";}?>>Greece Drachmas</option>
<option value="HKD" <?php if($data['currency']=="HKD"){echo "Selected";}?>>Hong Kong Dollars</option>
<option value="HUF" <?php if($data['currency']=="HUF"){echo "Selected";}?>>Hungary Forint</option>
<option value="ISK" <?php if($data['currency']=="ISK"){echo "Selected";}?>>Iceland Krona</option>
<option value="INR" <?php if($data['currency']=="INR"){echo "Selected";}?>>India Rupees</option>
<option value="IDR" <?php if($data['currency']=="IDR"){echo "Selected";}?>>Indonesia Rupiah</option>
<option value="IEP" <?php if($data['currency']=="IEP"){echo "Selected";}?>>Ireland Punt</option>
<option value="ILS" <?php if($data['currency']=="ILS"){echo "Selected";}?>>Israel New Shekels</option>
<option value="ITL" <?php if($data['currency']=="ITL"){echo "Selected";}?>>Italy Lira</option>
<option value="JMD" <?php if($data['currency']=="JMD"){echo "Selected";}?>>Jamaica Dollars</option>
<option value="JPY" <?php if($data['currency']=="JPY"){echo "Selected";}?>>Japan Yen</option>
<option value="JOD" <?php if($data['currency']=="JOD"){echo "Selected";}?>>Jordan Dinar</option>
<option value="KRW" <?php if($data['currency']=="KRW"){echo "Selected";}?>>Korea (South) Won</option>
<option value="LBP" <?php if($data['currency']=="LBP"){echo "Selected";}?>>Lebanon Pounds</option>
<option value="LUF" <?php if($data['currency']=="LUF"){echo "Selected";}?>>Luxembourg Francs</option>
<option value="MYR" <?php if($data['currency']=="MYR"){echo "Selected";}?>>Malaysia Ringgit</option>
<option value="MXP" <?php if($data['currency']=="MXP"){echo "Selected";}?>>Mexico Pesos</option>
<option value="NLG" <?php if($data['currency']=="NLG"){echo "Selected";}?>>Netherlands Guilders</option>
<option value="NZD" <?php if($data['currency']=="NZD"){echo "Selected";}?>>New Zealand Dollars</option>
<option value="NOK" <?php if($data['currency']=="NOK"){echo "Selected";}?>>Norway Kroner</option>
<option value="PKR" <?php if($data['currency']=="PKR"){echo "Selected";}?>>Pakistan Rupees</option>
<option value="XPD" <?php if($data['currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="PHP" <?php if($data['currency']=="PHP"){echo "Selected";}?>>Philippines Pesos</option>
<option value="XPT" <?php if($data['currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
<option value="PLZ" <?php if($data['currency']=="PLZ"){echo "Selected";}?>>Poland Zloty</option>
<option value="PTE" <?php if($data['currency']=="PTE"){echo "Selected";}?>>Portugal Escudo</option>
<option value="ROL" <?php if($data['currency']=="ROL"){echo "Selected";}?>>Romania Leu</option>
<option value="RUR" <?php if($data['currency']=="RUR"){echo "Selected";}?>>Russia Rubles</option>
<option value="SAR" <?php if($data['currency']=="SAR"){echo "Selected";}?>>Saudi Arabia Riyal</option>
<option value="XAG" <?php if($data['currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="SGD" <?php if($data['currency']=="SGD"){echo "Selected";}?>>Singapore Dollars</option>
<option value="SKK" <?php if($data['currency']=="SKK"){echo "Selected";}?>>Slovakia Koruna</option>
<option value="ZAR" <?php if($data['currency']=="ZAR"){echo "Selected";}?>>South Africa Rand</option>
<option value="KRW" <?php if($data['currency']=="KRW"){echo "Selected";}?>>South Korea Won</option>
<option value="ESP" <?php if($data['currency']=="ESP"){echo "Selected";}?>>Spain Pesetas</option>
<option value="XDR" <?php if($data['currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="SDD" <?php if($data['currency']=="SDD"){echo "Selected";}?>>Sudan Dinar</option>
<option value="SEK" <?php if($data['currency']=="SEK"){echo "Selected";}?>>Sweden Krona</option>
<option value="CHF" <?php if($data['currency']=="CHF"){echo "Selected";}?>>Switzerland Francs</option>
<option value="TWD" <?php if($data['currency']=="TWD"){echo "Selected";}?>>Taiwan Dollars</option>
<option value="THB" <?php if($data['currency']=="THB"){echo "Selected";}?>>Thailand Baht</option>
<option value="TTD" <?php if($data['currency']=="TTD"){echo "Selected";}?>>Trinidad and Tobago Dollars</option>
<option value="TRL" <?php if($data['currency']=="TRL"){echo "Selected";}?>>Turkey Lira</option>
<option value="VEB" <?php if($data['currency']=="VEB"){echo "Selected";}?>>Venezuela Bolivar</option>
<option value="ZMK" <?php if($data['currency']=="ZMK"){echo "Selected";}?>>Zambia Kwacha</option>
<option value="EUR" <?php if($data['currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="XCD" <?php if($data['currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="XDR" <?php if($data['currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="XAG" <?php if($data['currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="XAU" <?php if($data['currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="XPD" <?php if($data['currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="XPT" <?php if($data['currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
                                     
                                 </select> 
                                </div>
                            </div>
							
                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                   <label class="switch" >
					<input type="hidden" name="stat" id="stat" value="<?php echo $data['status'];?>"	>		   
<input type="checkbox" name="status" id="status" value="" <?php if($data['status']==1){echo "Checked";} ?> >
<span class="slider round"></span>
</label>
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
  url: "<?php echo base_url()?>ProductController/delete_display_image",
   data: {id : id},
   type:"POST",
  cache: false,
  success: function(html){
    $("#disp_image").html('');
  }
});
		});
		
		
		function del(id){
		
		$.ajax({
  url: "<?php echo base_url()?>ProductController/delete_image",
   data: {id : id},
   type:"POST",
  cache: false,
  success: function(html){
  
    $("#images_"+id).html('');
  }
});
		}
		
		</script>

<script>
	function sub(a){
	//alert(a);
	var postid=<?php echo $_GET['id'];?>;
	$.ajax({
  url: "<?php echo base_url().'CategoryController/ajax_subcategory'?>",
  type: "POST",
  data: {id : a ,postid:postid},
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
$('#stat').val(1);
}
if(stat==false){
$('#stat').val(0);
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