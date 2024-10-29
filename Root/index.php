<!-- instead of harcoding the navbar in every file i made a navbar.html and i will include it in every html file by 
 using <div id="navbar"></div> and adding a script tag to each file before closing the body tag, which fetches 
 the navbar.html file and inserts it into the navbar element. -->


<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Brain Circuit</title>
  
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  <div id="NavBar">
    <?php include './includes/NavBar.php'; ?>
  </div>


  <main>
  <h1 style="color: blue;">Welcome To Brain Circuit</h1>

    <a href="./authentication/login.php" class="button">Login</a>
    <a href="./authentication/SignUp.php" class="button">Sign Up</a>
    <?php

    
    if (isset($_SESSION["Loggedin"])) {
      echo $_SESSION["Loggedin"];
      echo $_SESSION["UserID"];
    }


    ?>
    <p>Engage in quizzes, track your progress, and participate in discussions.</p>
  </main>

  <footer>
    <p>© 2024 Interactive Learning Platform</p>
  </footer>

  <script>
       const currentPage = window.location.pathname.split("/").pop();

// Get all the navigation links
const navLinks = document.querySelectorAll(".nav-link");

// Loop through links and add active class to the matching one
navLinks.forEach(link => {
  const href = link.getAttribute("href");
  
  // Compare href with the current page URL
  if (href === currentPage) {
    link.classList.add("active");
  }
});
      </script>
</body>

</html>