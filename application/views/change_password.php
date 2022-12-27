
<style type="text/css">
	
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

body {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	height: 100vh;
	overflow: hidden;
	background: url("https://i.pinimg.com/564x/0e/58/17/0e5817b2f5a8e955103255569de24896.jpg")
		no-repeat center center;
	background-size: cover;
	backdrop-filter: blur(7px);
}

* {
	font-family: "Poppins", sans-serif;
	text-decoration: none;
	font-weight: bold;
	color: #363636;
}

.container {
	width: 106%;
	height: 100vh;
	display: flex;
	align-items: center;
}

.content {
	margin: 0 auto;
	width: 720px;
	height: 440px;
	display: flex;
}

.banner {
	height: 100%;
	width: 350px;
	background: rgb(0, 0, 0, 0.4);
	border-radius: 20px 0 0 20px;
}

.banner * {
	margin: 40px;
	color: #ccc;
}

.form {
	height: 100%;
	width: 300px;
	background: #fff;
	display: flex;
	flex-direction: column;
	align-items: center;
	border-radius: 0 20px 20px 0;
	position: relative;
}

.form img {
	margin: 45px 0 20px;
	height: 70px;
	border-radius: 50%;
}

p,
a {
	font-size: small;
}

a {
	color: #1663be;
}
#r {
	position: absolute;
	bottom: 20px;
}

input {
	margin-bottom: 10px;
}

input[type="email"],
input[type="password"] {
	width: 212px;
	height: 32px;
	border: 2px solid #ccc;
	color: #000;
	font-weight: bold;
	border-radius: 20px;
}

input:focus {
	outline: 0;
	transition: 0.8s;
	border: 2px solid #646464;
}

::placeholder {
	color: #181818;
	position: absolute;
	top: 7px;
	left: 10px;
}

input:focus ~ input[type="email"]::placeholder {
	color: black;
	position: absolute;
	top: 7px;
	left: 10px;
}

::-ms-reveal {
	filter: invert(100%);
}

button {
	width: 220px;
	height: 38px;
	border: 2px solid #142b54;
	background: #142b54;
	color: #fff;
	cursor: pointer;
	border-radius: 20px;
	box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
		rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
}

button:active {
	transform: scale(1.05);
	box-shadow: 3px 2px 22px 1px rgba(0, 0, 0, 0.24);
}

@media (max-width: 720px) {
	.banner {
		display: none;
	}
	.content {
		display: flex;
		justify-content: center;
	}

	.form {
		border-radius: 20px;
	}
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <?php
 
							  $id=$_SESSION['id'];
                              		$this->db->select('*'); 
									$this->db->where('id',$id); 
                            		$result=$this->db->get('admin')->row_array();
                            		
                              ?>


<div class="container">
	<div class="content">
		
		<form method="post" action="change_password_1">
			 <input type="hidden" name="old" class="form-control" id="old"  value="<?php echo $result['password']; ?>" placeholder="Enter password" > 
		<div class="form">
			<img src="https://i.pinimg.com/236x/4d/a8/bb/4da8bb993057c69a85b9b6f2775c9df2.jpg" alt="profile">
		
			
			<input type="password" name="old_password" id="old_password" placeholder="Old Password" required>
			<input type="password" name="new_password" id="new_password" placeholder="New Password" required>
			<input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password"required>
			<button type="submit" onclick="return formsubmit()">Change</button>
		   
		 	<a href="<?php echo base_url()?>" id="r">Back</a>
		</div>
		 </form>
	</div>
</div>

<script>

function formsubmit(){
    
	var old=$('#old').val();

	var new_password=$('#new_password').val();
	var confirm_new_password=$('#confirm_new_password').val();
	var old_password=$('#old_password').val();
	
	if(old_password!=""){
	if(old_password!==old){
	swal('Old Password is Wrong');
	return false;
	}
	}
		
	if(new_password !== confirm_new_password){
	swal('Password Does Not Match');
	return false;
	}
	
}
</script>