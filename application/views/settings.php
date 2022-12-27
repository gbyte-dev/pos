<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

 //include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php';
	include 'assets/lang/en.php'; 
	
	?>

<head>
    <title>Manage Website</title>
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


</style>	

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
<br/><br/><br/><br/><br/><br/>
        	<div class="row" >
       
            <!-- end col -->

            <div class="col-xl-6" style="margin:auto;">
                <div class="card" style="margin-bottom:60px;" >
                    <div class="card-body" >
                       

<form action="<?= base_url() ?>manage_website" method="post" enctype='multipart/form-data'>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Shop name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="shop_name" class="form-control" id="horizontal-firstname-input" placeholder="Enter Shop Name" value="<?php echo $data['shop_name'];?>" required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Shop Logo</label>
                                <div class="col-sm-9">
								<input type="hidden" name="logo" value="<?php echo $data['shop_logo'];?>">
                                  <input type="file" name="shop_logo" class="form-control" id="horizontal-firstname-input" placeholder="Enter Your ">
                                </div>
								<?php if($data['shop_logo']){?>
								<br/><br/><br/>
							 <div class="col-md-4 m-auto" id="disp_image"><img src="<?php echo base_url()?>/assets/website_image/<?php echo $data['shop_logo'];?>" height="100%" width="100%" /><span style="font-size:13px;cursor:pointer;" id="d_image">&#x2715;</span></div>
								<?php } ?>
								
                            </div>

                            


                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                  <input type="text" name="shop_description" class="form-control" id="horizontal-firstname-input" placeholder="Enter Description " value="<?php echo $data['shop_description'];?>"  required>
                                </div>
                            </div>

                             <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Currency</label>
                                <div class="col-sm-9">
                                 <select name="shop_currency" class="form-control" >
                                    <option value="0" selected="selected">Select Currency</option>
									 
<option value="USD" <?php if($data['shop_currency']=="USD"){echo "Selected";}?>>United States Dollars</option>
<option value="EUR" <?php if($data['shop_currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="GBP" <?php if($data['shop_currency']=="GBP"){echo "Selected";}?>>United Kingdom Pounds</option>
<option value="DZD" <?php if($data['shop_currency']=="DZD"){echo "Selected";}?>>Algeria Dinars</option>
<option value="ARP" <?php if($data['shop_currency']=="ARP"){echo "Selected";}?>>Argentina Pesos</option>
<option value="AUD" <?php if($data['shop_currency']=="AUD"){echo "Selected";}?>>Australia Dollars</option>
<option value="ATS" <?php if($data['shop_currency']=="ATS"){echo "Selected";}?>>Austria Schillings</option>
<option value="BSD" <?php if($data['shop_currency']=="BSD"){echo "Selected";}?>>Bahamas Dollars</option>
<option value="BBD" <?php if($data['shop_currency']=="BBD"){echo "Selected";}?>>Barbados Dollars</option>
<option value="BEF" <?php if($data['shop_currency']=="BEF"){echo "Selected";}?>>Belgium Francs</option>
<option value="BMD" <?php if($data['shop_currency']=="BMD"){echo "Selected";}?>>Bermuda Dollars</option>
<option value="BRR" <?php if($data['shop_currency']=="BRR"){echo "Selected";}?>>Brazil Real</option>
<option value="BGL" <?php if($data['shop_currency']=="BGL"){echo "Selected";}?>>Bulgaria Lev</option>
<option value="CAD" <?php if($data['shop_currency']=="CAD"){echo "Selected";}?>>Canada Dollars</option>
<option value="CLP" <?php if($data['shop_currency']=="CLP"){echo "Selected";}?>>Chile Pesos</option>
<option value="CNY" <?php if($data['shop_currency']=="CNY"){echo "Selected";}?>>China Yuan Renmimbi</option>
<option value="CYP" <?php if($data['shop_currency']=="CYP"){echo "Selected";}?>>Cyprus Pounds</option>
<option value="CSK" <?php if($data['shop_currency']=="CSK"){echo "Selected";}?>>Czech Republic Koruna</option>
<option value="DKK" <?php if($data['shop_currency']=="DKK"){echo "Selected";}?>>Denmark Kroner</option>
<option value="NLG" <?php if($data['shop_currency']=="NLG"){echo "Selected";}?>>Dutch Guilders</option>
<option value="XCD" <?php if($data['shop_currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="EGP" <?php if($data['shop_currency']=="EGP"){echo "Selected";}?>>Egypt Pounds</option>
<option value="FJD" <?php if($data['shop_currency']=="FJD"){echo "Selected";}?>>Fiji Dollars</option>
<option value="FIM" <?php if($data['shop_currency']=="FIM"){echo "Selected";}?>>Finland Markka</option>
<option value="FRF" <?php if($data['shop_currency']=="FRF"){echo "Selected";}?>>France Francs</option>
<option value="DEM" <?php if($data['shop_currency']=="DEM"){echo "Selected";}?>>Germany Deutsche Marks</option>
<option value="XAU" <?php if($data['shop_currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="GRD" <?php if($data['shop_currency']=="GRD"){echo "Selected";}?>>Greece Drachmas</option>
<option value="HKD" <?php if($data['shop_currency']=="HKD"){echo "Selected";}?>>Hong Kong Dollars</option>
<option value="HUF" <?php if($data['shop_currency']=="HUF"){echo "Selected";}?>>Hungary Forint</option>
<option value="ISK" <?php if($data['shop_currency']=="ISK"){echo "Selected";}?>>Iceland Krona</option>
<option value="INR" <?php if($data['shop_currency']=="INR"){echo "Selected";}?>>India Rupees</option>
<option value="IDR" <?php if($data['shop_currency']=="IDR"){echo "Selected";}?>>Indonesia Rupiah</option>
<option value="IEP" <?php if($data['shop_currency']=="IEP"){echo "Selected";}?>>Ireland Punt</option>
<option value="ILS" <?php if($data['shop_currency']=="ILS"){echo "Selected";}?>>Israel New Shekels</option>
<option value="ITL" <?php if($data['shop_currency']=="ITL"){echo "Selected";}?>>Italy Lira</option>
<option value="JMD" <?php if($data['shop_currency']=="JMD"){echo "Selected";}?>>Jamaica Dollars</option>
<option value="JPY" <?php if($data['shop_currency']=="JPY"){echo "Selected";}?>>Japan Yen</option>
<option value="JOD" <?php if($data['shop_currency']=="JOD"){echo "Selected";}?>>Jordan Dinar</option>
<option value="KRW" <?php if($data['shop_currency']=="KRW"){echo "Selected";}?>>Korea (South) Won</option>
<option value="LBP" <?php if($data['shop_currency']=="LBP"){echo "Selected";}?>>Lebanon Pounds</option>
<option value="LUF" <?php if($data['shop_currency']=="LUF"){echo "Selected";}?>>Luxembourg Francs</option>
<option value="MYR" <?php if($data['shop_currency']=="MYR"){echo "Selected";}?>>Malaysia Ringgit</option>
<option value="MXP" <?php if($data['shop_currency']=="MXP"){echo "Selected";}?>>Mexico Pesos</option>
<option value="NLG" <?php if($data['shop_currency']=="NLG"){echo "Selected";}?>>Netherlands Guilders</option>
<option value="NZD" <?php if($data['shop_currency']=="NZD"){echo "Selected";}?>>New Zealand Dollars</option>
<option value="NOK" <?php if($data['shop_currency']=="NOK"){echo "Selected";}?>>Norway Kroner</option>
<option value="PKR" <?php if($data['shop_currency']=="PKR"){echo "Selected";}?>>Pakistan Rupees</option>
<option value="XPD" <?php if($data['shop_currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="PHP" <?php if($data['shop_currency']=="PHP"){echo "Selected";}?>>Philippines Pesos</option>
<option value="XPT" <?php if($data['shop_currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
<option value="PLZ" <?php if($data['shop_currency']=="PLZ"){echo "Selected";}?>>Poland Zloty</option>
<option value="PTE" <?php if($data['shop_currency']=="PTE"){echo "Selected";}?>>Portugal Escudo</option>
<option value="ROL" <?php if($data['shop_currency']=="ROL"){echo "Selected";}?>>Romania Leu</option>
<option value="RUR" <?php if($data['shop_currency']=="RUR"){echo "Selected";}?>>Russia Rubles</option>
<option value="SAR" <?php if($data['shop_currency']=="SAR"){echo "Selected";}?>>Saudi Arabia Riyal</option>
<option value="XAG" <?php if($data['shop_currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="SGD" <?php if($data['shop_currency']=="SGD"){echo "Selected";}?>>Singapore Dollars</option>
<option value="SKK" <?php if($data['shop_currency']=="SKK"){echo "Selected";}?>>Slovakia Koruna</option>
<option value="ZAR" <?php if($data['shop_currency']=="ZAR"){echo "Selected";}?>>South Africa Rand</option>
<option value="KRW" <?php if($data['shop_currency']=="KRW"){echo "Selected";}?>>South Korea Won</option>
<option value="ESP" <?php if($data['shop_currency']=="ESP"){echo "Selected";}?>>Spain Pesetas</option>
<option value="XDR" <?php if($data['shop_currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="SDD" <?php if($data['shop_currency']=="SDD"){echo "Selected";}?>>Sudan Dinar</option>
<option value="SEK" <?php if($data['shop_currency']=="SEK"){echo "Selected";}?>>Sweden Krona</option>
<option value="CHF" <?php if($data['shop_currency']=="CHF"){echo "Selected";}?>>Switzerland Francs</option>
<option value="TWD" <?php if($data['shop_currency']=="TWD"){echo "Selected";}?>>Taiwan Dollars</option>
<option value="THB" <?php if($data['shop_currency']=="THB"){echo "Selected";}?>>Thailand Baht</option>
<option value="TTD" <?php if($data['shop_currency']=="TTD"){echo "Selected";}?>>Trinidad and Tobago Dollars</option>
<option value="TRL" <?php if($data['shop_currency']=="TRL"){echo "Selected";}?>>Turkey Lira</option>
<option value="VEB" <?php if($data['shop_currency']=="VEB"){echo "Selected";}?>>Venezuela Bolivar</option>
<option value="ZMK" <?php if($data['shop_currency']=="ZMK"){echo "Selected";}?>>Zambia Kwacha</option>
<option value="EUR" <?php if($data['shop_currency']=="EUR"){echo "Selected";}?>>Euro</option>
<option value="XCD" <?php if($data['shop_currency']=="XCD"){echo "Selected";}?>>Eastern Caribbean Dollars</option>
<option value="XDR" <?php if($data['shop_currency']=="XDR"){echo "Selected";}?>>Special Drawing Right (IMF)</option>
<option value="XAG" <?php if($data['shop_currency']=="XAG"){echo "Selected";}?>>Silver Ounces</option>
<option value="XAU" <?php if($data['shop_currency']=="XAU"){echo "Selected";}?>>Gold Ounces</option>
<option value="XPD" <?php if($data['shop_currency']=="XPD"){echo "Selected";}?>>Palladium Ounces</option>
<option value="XPT" <?php if($data['shop_currency']=="XPT"){echo "Selected";}?>>Platinum Ounces</option>
                                     
                                 </select> 
                                </div>
                            </div>
							
							 <div class="row mb-4">
                                <label for="qty" class="col-sm-3 col-form-label">Limited Stock Quantity</label>
                                <div class="col-sm-9">
                                  <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter Quantity" min="1" value="<?php echo $data['quantity'];?>"  required>
                                </div>
                            </div>
							
							
							<div class="row mb-4">
                                <label for="login_1" class="col-sm-3 col-form-label">Login 1st Para</label>
                                <div class="col-sm-9">
                                  <input type="text" name="login_1" class="form-control" id="login_1"  min="1" value="<?php echo $data['login_1'];?>"  required>
                                </div>
                            </div>
							
							
							<div class="row mb-4">
                                <label for="login_2" class="col-sm-3 col-form-label">Login 2nd Para</label>
                                <div class="col-sm-9">
			  <input type="text" name="login_2" class="form-control" id="login_2"  min="1" value="<?php echo $data['login_2'];?>"  required>
                                </div>
                            </div>
							
							<div class="row mb-4">
                                <label for="login_3" class="col-sm-3 col-form-label">Login 3rd Para</label>
                                <div class="col-sm-9">
                                  <input type="text" name="login_3" class="form-control" id="login_3"  min="1" value="<?php echo $data['login_3'];?>"  required>
                                </div>
                            </div>
							
							

                             <div class="row mb-4" style="display:none;">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                  <label class="switch" >
<input type="checkbox" name="status" id="status" value="0"  />
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
	
	
	$('#d_image').click(function(){
		
		var id=<?php echo $data['id'];?>;
		
		$.ajax({
  url: "<?php echo base_url()?>ProductController/delete_website_image",
   data: {id : id},
   type:"POST",
  cache: false,
  success: function(html){
    $("#disp_image").html('');
  }
});
		});
	</script>