<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Add Supplier</title>
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
<br/><br/><br/><br/>
        	<div class="row">
           
            <!-- end col -->

            <div class="col-xl-6" style="margin:auto;">
                <div class="card" style="margin-bottom:60px;" >
                    <div class="card-body">
                       	<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="font-size:20px;">
    <li class="breadcrumb-item"><a href="<?= base_url() ?>supplier">Supplier</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
  </ol>
</nav>

<form action="<?= base_url() ?>addSupp" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="supplier_name" class="col-sm-3 col-form-label">Supplier name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Enter Supplier Name" required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" required onkeypress="return isNumber(event)" maxlength="12">
                                </div>
                            </div>
                           
                            <div class="row mb-4">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                  <input type="text" name="state" class="form-control" id="state" placeholder="Enter State" required>
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                  <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
                                </div>
                            </div>

                           

                             <div class="row mb-4">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                  <input type="file" name="image" class="form-control" id="image" >
                                </div>
                            </div>

                             


                             <div class="row mb-4" >
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea name="address" class="form-control" id="address" placeholder="Enter Address" required style="resize:none;"></textarea>
                                </div>
                            </div>

                         

                            

							<div class="row mb-4">
                                <label for="zipcode" class="col-sm-3 col-form-label">Zipcode</label>
                                <div class="col-sm-9">
                                  <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Enter Zipcode" onkeypress="return isNumber(event)" maxlength="6" required>
                                </div>
                            </div>


<div class="row mb-4" style="display:none;">
	<label for="currency" class="col-sm-3 col-form-label">Currency</label>
                                <div class="col-sm-9">
                                 <select name="currency" id="currency" class="form-control" >
                                    <option value="0" selected="selected">Select Currency</option>
									 
<option value="USD" <?php if($data3['shop_currency']=="USD"){echo "Selected";}?>>United States Dollars</option>
<option value="EUR" <?php if($data3['shop_currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="GBP" <?php if($data3['shop_currency']=="GBP"){echo "Selected";}?>>United Kingdom Pounds</option>
<option value="DZD" <?php if($data3['shop_currency']=="DZD"){echo "Selected";}?>>Algeria Dinars</option>
<option value="ARP" <?php if($data3['shop_currency']=="ARP"){echo "Selected";}?>>Argentina Pesos</option>
<option value="AUD" <?php if($data3['shop_currency']=="AUD"){echo "Selected";}?>>Australia Dollars</option>
<option value="ATS" <?php if($data3['shop_currency']=="ATS"){echo "Selected";}?>>Austria Schillings</option>
<option value="BSD" <?php if($data3['shop_currency']=="BSD"){echo "Selected";}?>>Bahamas Dollars</option>
<option value="BBD" <?php if($data3['shop_currency']=="BBD"){echo "Selected";}?>>Barbados Dollars</option>
<option value="BEF" <?php if($data3['shop_currency']=="BEF"){echo "Selected";}?>>Belgium Francs</option>
<option value="BMD" <?php if($data3['shop_currency']=="BMD"){echo "Selected";}?>>Bermuda Dollars</option>
<option value="BRR" <?php if($data3['shop_currency']=="BRR"){echo "Selected";}?>>Brazil Real</option>
<option value="BGL" <?php if($data3['shop_currency']=="BGL"){echo "Selected";}?>>Bulgaria Lev</option>
<option value="CAD" <?php if($data3['shop_currency']=="CAD"){echo "Selected";}?>>Canada Dollars</option>
<option value="CLP" <?php if($data3['shop_currency']=="CLP"){echo "Selected";}?>>Chile Pesos</option>
<option value="CNY" <?php if($data3['shop_currency']=="CNY"){echo "Selected";}?>>China Yuan Renmimbi</option>
<option value="CYP" <?php if($data3['shop_currency']=="CYP"){echo "Selected";}?>>Cyprus Pounds</option>
<option value="CSK" <?php if($data3['shop_currency']=="CSK"){echo "Selected";}?>>Czech Republic Koruna</option>
<option value="DKK" <?php if($data3['shop_currency']=="DKK"){echo "Selected";}?>>Denmark Kroner</option>
<option value="NLG" <?php if($data3['shop_currency']=="NLG"){echo "Selected";}?>>Dutch Guilders</option>
<option value="XCD" <?php if($data3['shop_currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="EGP" <?php if($data3['shop_currency']=="EGP"){echo "Selected";}?>>Egypt Pounds</option>
<option value="FJD" <?php if($data3['shop_currency']=="FJD"){echo "Selected";}?>>Fiji Dollars</option>
<option value="FIM" <?php if($data3['shop_currency']=="FIM"){echo "Selected";}?>>Finland Markka</option>
<option value="FRF" <?php if($data3['shop_currency']=="FRF"){echo "Selected";}?>>France Francs</option>
<option value="DEM" <?php if($data3['shop_currency']=="DEM"){echo "Selected";}?>>Germany Deutsche Marks</option>
<option value="XAU" <?php if($data3['shop_currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="GRD" <?php if($data3['shop_currency']=="GRD"){echo "Selected";}?>>Greece Drachmas</option>
<option value="HKD" <?php if($data3['shop_currency']=="HKD"){echo "Selected";}?>>Hong Kong Dollars</option>
<option value="HUF" <?php if($data3['shop_currency']=="HUF"){echo "Selected";}?>>Hungary Forint</option>
<option value="ISK" <?php if($data3['shop_currency']=="ISK"){echo "Selected";}?>>Iceland Krona</option>
<option value="INR" <?php if($data3['shop_currency']=="INR"){echo "Selected";}?>>India Rupees</option>
<option value="IDR" <?php if($data3['shop_currency']=="IDR"){echo "Selected";}?>>Indonesia Rupiah</option>
<option value="IEP" <?php if($data3['shop_currency']=="IEP"){echo "Selected";}?>>Ireland Punt</option>
<option value="ILS" <?php if($data3['shop_currency']=="ILS"){echo "Selected";}?>>Israel New Shekels</option>
<option value="ITL" <?php if($data3['shop_currency']=="ITL"){echo "Selected";}?>>Italy Lira</option>
<option value="JMD" <?php if($data3['shop_currency']=="JMD"){echo "Selected";}?>>Jamaica Dollars</option>
<option value="JPY" <?php if($data3['shop_currency']=="JPY"){echo "Selected";}?>>Japan Yen</option>
<option value="JOD" <?php if($data3['shop_currency']=="JOD"){echo "Selected";}?>>Jordan Dinar</option>
<option value="KRW" <?php if($data3['shop_currency']=="KRW"){echo "Selected";}?>>Korea (South) Won</option>
<option value="LBP" <?php if($data3['shop_currency']=="LBP"){echo "Selected";}?>>Lebanon Pounds</option>
<option value="LUF" <?php if($data3['shop_currency']=="LUF"){echo "Selected";}?>>Luxembourg Francs</option>
<option value="MYR" <?php if($data3['shop_currency']=="MYR"){echo "Selected";}?>>Malaysia Ringgit</option>
<option value="MXP" <?php if($data3['shop_currency']=="MXP"){echo "Selected";}?>>Mexico Pesos</option>
<option value="NLG" <?php if($data3['shop_currency']=="NLG"){echo "Selected";}?>>Netherlands Guilders</option>
<option value="NZD" <?php if($data3['shop_currency']=="NZD"){echo "Selected";}?>>New Zealand Dollars</option>
<option value="NOK" <?php if($data3['shop_currency']=="NOK"){echo "Selected";}?>>Norway Kroner</option>
<option value="PKR" <?php if($data3['shop_currency']=="PKR"){echo "Selected";}?>>Pakistan Rupees</option>
<option value="XPD" <?php if($data3['shop_currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="PHP" <?php if($data3['shop_currency']=="PHP"){echo "Selected";}?>>Philippines Pesos</option>
<option value="XPT" <?php if($data3['shop_currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
<option value="PLZ" <?php if($data3['shop_currency']=="PLZ"){echo "Selected";}?>>Poland Zloty</option>
<option value="PTE" <?php if($data3['shop_currency']=="PTE"){echo "Selected";}?>>Portugal Escudo</option>
<option value="ROL" <?php if($data3['shop_currency']=="ROL"){echo "Selected";}?>>Romania Leu</option>
<option value="RUR" <?php if($data3['shop_currency']=="RUR"){echo "Selected";}?>>Russia Rubles</option>
<option value="SAR" <?php if($data3['shop_currency']=="SAR"){echo "Selected";}?>>Saudi Arabia Riyal</option>
<option value="XAG" <?php if($data3['shop_currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="SGD" <?php if($data3['shop_currency']=="SGD"){echo "Selected";}?>>Singapore Dollars</option>
<option value="SKK" <?php if($data3['shop_currency']=="SKK"){echo "Selected";}?>>Slovakia Koruna</option>
<option value="ZAR" <?php if($data3['shop_currency']=="ZAR"){echo "Selected";}?>>South Africa Rand</option>
<option value="KRW" <?php if($data3['shop_currency']=="KRW"){echo "Selected";}?>>South Korea Won</option>
<option value="ESP" <?php if($data3['shop_currency']=="ESP"){echo "Selected";}?>>Spain Pesetas</option>
<option value="XDR" <?php if($data3['shop_currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="SDD" <?php if($data3['shop_currency']=="SDD"){echo "Selected";}?>>Sudan Dinar</option>
<option value="SEK" <?php if($data3['shop_currency']=="SEK"){echo "Selected";}?>>Sweden Krona</option>
<option value="CHF" <?php if($data3['shop_currency']=="CHF"){echo "Selected";}?>>Switzerland Francs</option>
<option value="TWD" <?php if($data3['shop_currency']=="TWD"){echo "Selected";}?>>Taiwan Dollars</option>
<option value="THB" <?php if($data3['shop_currency']=="THB"){echo "Selected";}?>>Thailand Baht</option>
<option value="TTD" <?php if($data3['shop_currency']=="TTD"){echo "Selected";}?>>Trinidad and Tobago Dollars</option>
<option value="TRL" <?php if($data3['shop_currency']=="TRL"){echo "Selected";}?>>Turkey Lira</option>
<option value="VEB" <?php if($data3['shop_currency']=="VEB"){echo "Selected";}?>>Venezuela Bolivar</option>
<option value="ZMK" <?php if($data3['shop_currency']=="ZMK"){echo "Selected";}?>>Zambia Kwacha</option>
<option value="EUR" <?php if($data3['shop_currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="XCD" <?php if($data3['shop_currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="XDR" <?php if($data3['shop_currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="XAG" <?php if($data3['shop_currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="XAU" <?php if($data3['shop_currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="XPD" <?php if($data3['shop_currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="XPT" <?php if($data3['shop_currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
                                     
                                 </select> 
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
                <!-- end card -->
            </div>
			
            <!-- end col -->
        </div>
		<br/>

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