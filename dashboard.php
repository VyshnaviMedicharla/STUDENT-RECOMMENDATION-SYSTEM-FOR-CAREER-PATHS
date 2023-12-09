<?php include 'header.php'; ?>
<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once 'database.php';
    }
?>
<link rel="stylesheet" href="css/dashboard.css">

<!-- banner -->
	<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Dashboard</li>
			</ol>
	</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
    <div class="container">

    <?php
    
    // Establish a database connection (replace with your credentials)
    $con = new mysqli("localhost", "root", "", "career");
    $str="SELECT score FROM results WHERE email='$email'";
    $result = $con->query($str);
    $row = $result->fetch_assoc();
    $total=$row['score'];

    $str1="SELECT * FROM marks WHERE email='$email'";
    $result1=$con->query($str1);
    $count=$result1->num_rows;

?>
           <div class="row justify-content-center">
               <div class="col-md-6 square">
                      <div class="row justify-content-center logo">
                      <div class="col-md-4 text-center">
                             <br>
                             <h1><i class="fa-solid fa-user-graduate fa-2xl"></i></h1>
                             <br>

                          </div>
                          </div>
                      <div class="row justify-content-center logo">
                          <div class="col-md-4 text-center">
                              <h6><?php echo $_SESSION['id'];?></h6>
                              <p><?php echo $email;?></p>
                          </div>
                      </div>
                      <div class="row bg-info logo">
                          <div class="col-md-6 text-center">
                             <h5>Total Score : <?php echo $total;?></h5>
                          </div>
                          <div class="col-md-6 text-center">
                          <h5>Total Tests Taken : <?php echo $count;?></h5>
                          </div>
                      </div>
                        <?php
                          if ($result1->num_rows > 0) {

                              echo "<div class='row jusify-content-center '><div class='col-md-6 text-center tb'><h5>Topic</h5></div><div class='col-md-6 text-center tb'><h5>Score</h5></div></div>";
                            while ($row1 = $result1->fetch_assoc()) {
                                echo "<div class='row'>
                                <div class='col-md-6 text-center tb'><h6>".$row1['subject_name']."</h6></div>
                                <div class='col-md-6 text-center tb'><h6>".$row1['score']."</h6></div>
                                 </div>";
                            }
                        } 
                        else {
                            echo "No tests are taken..........";
                        }
                        ?>
                </div>
            
           </div>
    </div>
    <br>
                <br>
                <br>

    <?php include 'footer.php';?>