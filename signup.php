<?php include 'header.php'; ?>

<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$mobile = $_POST['mobile'];
		$mobile = stripslashes($mobile);
		$mobile = addslashes($mobile);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);
		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		$score=0;
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
			$str1="insert into results set email='$email',score='$score'";
			$r=mysqli_query($con,$str1);
            $str="insert into user set USERNAME='$name',MOBILE='$mobile',EMAIL='$email',PASSWORD='$password'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header("refresh:0;url=login.php");

		}
    }
?>











<link rel="stylesheet" href="css/signup.css">
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Signup</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
		<div class="container pb-xl-5 pb-lg-3">
			<div class="row">
				<div class="col-lg-6">
					<img src="images/b2.png" alt="image" class="img-fluid" />
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="signup.php" method="post" class="contact-wthree-do" enctype="multipart/form-data">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											User name:
										</label>
										<input class="form-control" type="text" placeholder="firstname" name="name" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Mobile
										</label>
										<input class="form-control" type="text" placeholder="xxxx xxxx xx" name="mobile" required="">
									</div>
									<div class="col-md-6 mt-md-0 mt-4">
										<label>
											Email
										</label>
										<input class="form-control" type="email" placeholder="example@mail.com" name="email" required="">
									</div>
								</div>
							</div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Password
										</label>
										<input type="password" name="password" placeholder="password" required="" class="form-control">
									</div>
                                    <div class="col-md-6 mt-md-0 mt-4">
										<label>
											confirm password
										</label>
										<input class="form-control" type="password" placeholder="password" name="password" required="">
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-12">
									<button type="submit" class="btn btn-cont-w3 btn-block mt-4" name="submit">Signup</button>
								</div>
							</div>
						</form>
					</div>
					<!-- //contact form grid ends here -->
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'?>