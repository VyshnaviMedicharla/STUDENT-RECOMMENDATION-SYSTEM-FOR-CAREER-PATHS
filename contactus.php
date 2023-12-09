<?php include 'header.php'; ?>
<?php
  $con= new mysqli('localhost','root','','CAREER');
  if(isset($_POST['submit'])){
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $mobile=$_POST['mobile'];
   $email=$_POST['email'];
   $message=$_POST['message'];
  
   $sql="INSERT INTO contact SET first_name='$fname',last_name='$lname',mobile='$mobile',email='$email',description='$message'";
   $r=mysqli_query($con,$sql);
   echo "<center><h3><script>alert('your message was sent successfully !!!!');</script></h3></center>";
   header("refresh:0;url=index.php");
  }
?>
<link rel="stylesheet" href="css/contactus.css">
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Contact Us</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
    <!-- contact -->
	<div class="contact py-5" id="contact">
		<div class="container pb-xl-5 pb-lg-3">
			<div class="row">
				<div class="col-lg-6">
					<img src="images/b2.png" alt="image" class="img-fluid" />
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="contactus.php" method="POST" class="contact-wthree-do">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											First name
										</label>
										<input class="form-control" type="text" placeholder="firstname" name="fname" required="">
									</div>
									<div class="col-md-6 mt-md-0 mt-4">
										<label>
											Last name
										</label>
										<input class="form-control" type="text" placeholder="lastname" name="lname" required="">
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
									<div class="col-md-12">
										<label>
											Your message
										</label>
										<textarea placeholder="Add your Description here" name="message" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-12">
									<button type="submit" class="btn btn-cont-w3 btn-block mt-4" name="submit">Send</button>
								</div>
							</div>
						</form>
					</div>
					<!-- //contact form grid ends here -->
				</div>
			</div>
		</div>
	</div>
	<!-- //contact-->
    <?php include 'footer.php'; ?>