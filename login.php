
<?php include 'header.php'; ?>


<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE EMAIL='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			$_SESSION['id']=$row[0];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
			header('location: dashboard.php?q=1'); 					
		}
	}
?>


<link rel="stylesheet" href="css/login.css">
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Login</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
    <div class="contact py-5" id="contact">
		<div class="container pb-xl-5 pb-lg-3">
			<div class="row">
				<div class="col-lg-6">
					<img src="images/b2.png" alt="image" class="img-fluid" />
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="login.php" method="post" class="contact-wthree-do">
							<div class="form-group">
									<div class="col-md-6">
										<label for="username">
										   Email id:
										</label><br>
										<input class="form-control" id="username" type="text" placeholder="email id.." name="email" required="">
									</div><br>
									<div class="col-md-6 mt-md-0 mt-4">
										<label for="password">
											Password:
										</label><br>
										<input class="form-control" id="password" type="password" placeholder="password" name="password" required="">
									</div><br>
                                    <div class="col-md-6">
                                        <input type="submit" name="submit" value="login" class="login"> 
                                    </div>
							</div>
                       </form><br>
                       <div>
                           <p>if you're not register?<a href="signup.php" class="sign" style="text-decoration:none;">signup</a></p>
                      </div>
                  </div>
                </div>
         </div>
      </div><br>
<?php include 'footer.php'?>