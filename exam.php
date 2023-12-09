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
<head>
<link rel="stylesheet" href="css/exam.css">

</head>
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Exam</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
      <div class="main">
          <br>
          <br>
          <div class="container">
            <div class="row  justify-content-center">
         <form method="post" action="exam.php">
        <label for="subject">Select a Subject:</label>
        <select name="subject" id="subject">
        <?php
                    // Connect to the database and fetch subject names
                    $conn = new mysqli("localhost", "root", "", "career");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT * FROM subjects");
                    while ($row = $result->fetch_assoc()) {
                        $subject_id = $row['subject_id'];
                        $subject_name = $row['subject_name'];
                        
                        // Check if the subject has already been selected
                        $selected = '';
                        if ($_POST["subject"] == $subject_id) {
                            $selected = 'disabled';
                        }
                        
                        echo "<option value='" . $subject_id . "' $selected>" . $subject_name . "</option>";
                    }
                    $conn->close();
                    ?>
        </select>
        <input type="submit" value="Start Exam" class="btn">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the selected subject
        $selectedSubject = $_POST["subject"];
        // Redirect to a page that displays questions for the selected subject
        
        header("Location: exam_questions.php?subject=" . $selectedSubject);
    }
    ?>  
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>             
    </div>
  </div>
</div>

<?php include 'footer.php';?>

      