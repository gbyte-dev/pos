

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
	width: 350px;
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
<?php /*if(isset($_GET['msg'])&& $_GET['msg']=="wrong_email"){?>
<div class="alert alert-danger" role="alert">
You Have Entered Wrong Email Or Password Or The Email Does Not Exist!
</div>
<?php } */?>


<div class="container">
	<div class="content">
		<div class="banner">
			<h1><?php echo $data['login_1'];?></h1>
			<h3><?php echo $data['login_2'];?></h3>
			<br>
			<h3><?php echo $data['login_3'];?></h3>
		</div>
		<form method="post" action="Login/authenticate">
		<div class="form ">
			<img src="https://i.pinimg.com/236x/4d/a8/bb/4da8bb993057c69a85b9b6f2775c9df2.jpg" alt="profile">
			<p>Need an Account? <a href=""> Sign Up</a></p>
			
			<input type="email" name="email" placeholder="Email" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit">Sign In</button>
		   
		 	<a href="" id="r">Forgot Your Password?</a>
		</div>
		 </form>
	</div>
</div>