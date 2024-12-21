<?php


?>

<!--
1) Always check links 
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quizzez</title>
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>


  <?php include "../includes/NavBar.php"; ?>




  <main>
    <div class="container">
      <h1 class="title">Explore Quizzes</h1>
      <div class="quizzes">


      <?php
       include('../includes/Connection.php');
       $con = mysqli_connect("localhost", "root", "","learningplatform3");
       $sql="select * from quizzes";
       $quizzes = mysqli_query($GLOBALS['con'],$sql);
       if ($quizzes) {
        while ($row = mysqli_fetch_assoc($quizzes)) {
            $id = $row["id"];
            $title = $row["quiz_title"];
            $subject = $row["subject"];
            echo '<div class="quiz-card">';
            echo '<alt= Quiz Image class="quiz-image">';
            echo "<h2 class='quiz-title'>$title</h2>";
            echo "<p class='quiz-description'>$subject</p>";
            echo '<a href="#" class="btn">Start Quiz</a>';
            echo '</div>';
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
         
      ?>

        <div class="quiz-card">
          <alt= Quiz Image class="quiz-image">
            <h2 class="quiz-title">Quiz Title 1</h2>
            <p class="quiz-description">Description of the quiz goes here.</p>
            <a href="#" class="btn">Start Quiz</a>
        </div>

        <div class="quiz-card">
          <alt="Quiz Image" class="quiz-image">
            <h2 class="quiz-title">Quiz Title 2</h2>
            <p class="quiz-description">Description of the quiz goes here.</p>
            <a href="#" class="btn">Start Quiz</a>
        </div>

        <div class="quiz-card">
          <alt="Quiz Image" class="quiz-image">
            <h2 class="quiz-title">Quiz Title 3</h2>
            <p class="quiz-description">Description of the quiz goes here.</p>
            <a href="#" class="btn">Start Quiz</a>
        </div>
      </div>
    </div>
  </main>


  <footer>
    <p>&copy; 2024 Interactive Learning Platform</p>
  </footer>

</body>

</html>