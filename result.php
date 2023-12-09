<?php include 'header.php';?>
<?php
 include_once 'database.php';
 session_start();
 $name = $_SESSION['name'];
 $email = $_SESSION['email'];
 include_once 'database.php';
?>


<head>
<link rel="stylesheet" href="css/exam.css">

</head>
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Result</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
      <div class="main">
      <br><br><br><br>
   <div class="container">
    <div class="row justify-content-center">
        
    <?php
    $score = 0;

    
    // Establish a database connection (replace with your credentials)
    $conn = new mysqli("localhost", "root", "", "career");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Loop through submitted answers and calculate the score
    foreach ($_POST as $key => $value) {
        $question_id = substr($key, 1); // Extract question_id from input name
        $sql = "SELECT correct_option FROM questions WHERE question_id = $question_id";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($value == $row["correct_option"]) {
                $score++;
            }
        }
          
    }
    
    $SID=$_GET['subject'];
    $str="SELECT subject_name from subjects WHERE subject_id='$SID'";
    $result3=$conn->query($str);
    $row1=$result3->fetch_assoc();
    $subject=$row1['subject_name'];
    $str1="INSERT INTO marks SET subject_id='$SID',email='$email',subject_name='$subject',score='$score'";

    $s=$conn->query($str1);




    $str2 = "SELECT score FROM results WHERE email='$email'";
    $result1=$conn->query($str2);
    $row=$result1->fetch_assoc();
    $cr=(int)$row['score'];
    $sum=(int)$score+$cr;
    $str3="UPDATE results SET score='$sum' WHERE email='$email'";
    $r=$conn->query($str3);
    $conn->close();

   echo  "<h1>Your Score is : ".$score." /10</h1>";
   ?>
   </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
</div>

<?php include 'footer.php';?>