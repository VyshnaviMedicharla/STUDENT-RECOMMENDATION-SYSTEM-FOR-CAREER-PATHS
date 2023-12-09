<?php
 include_once 'database.php';
 session_start();
 $name = $_SESSION['name'];
 $email = $_SESSION['email'];
 include_once 'database.php';
?>
<?php include 'header.php'?>
<link rel="stylesheet" href="css/exam_questions.css">
<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
				<li class="breadcrumb-item" aria-current="page">Exam Questions</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
    <br>
    <br>
    <div class="container">
     <br><br>
    <form method="post" action="result.php?subject=<?php echo $_GET['subject'];?>">
        <?php
        // Get the subject ID from the URL
        $subjectID = $_GET['subject'];
        $sno=0;
        // Connect to the database and fetch questions for the selected subject
        $conn = new mysqli("localhost", "root", "", "career");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM questions WHERE subject_id = $subjectID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>".++$sno." . " .$row["question_text"] . "</p>";
                echo "<input type='radio' name='q" . $row["question_id"] . "' value='1'> " . $row["option1"] . "<br>";
                echo "<input type='radio' name='q" . $row["question_id"] . "' value='2'> " . $row["option2"] . "<br>";
                echo "<input type='radio' name='q" . $row["question_id"] . "' value='3'> " . $row["option3"] . "<br>";
                echo "<input type='radio' name='q" . $row["question_id"] . "' value='4'> " . $row["option4"] . "<br><hr><br>";
                
            }
    
        } else {
            echo "No questions available for this subject.";
        }

        $conn->close();
        ?>
        <input type="submit" value="Submit" class="btn">
    </form>
    </div>
   
 <?php include 'footer.php';?>