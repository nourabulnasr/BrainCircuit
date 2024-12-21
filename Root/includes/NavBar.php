<?php
$base_path = '/SWE_PROJECT/Root'; // Root-relative path for consistent navigation

?>

<header>
    <link rel="stylesheet" href="<?php echo $base_path; ?>/css/style.css">

    <nav id="navbar" class="navbar">
        <ul>
            <span style="color: red;">
                <?php
                session_start();
                if (isset($_SESSION["Loggedin"])) {
                    echo $_SESSION["UserName"];
                }
                ?>
            </span>
            <li><a href="<?php echo $base_path; ?>/index.php" class="nav-link" id="home-link">Home</a></li>
            <li><a href="<?php
            if(isset($_SESSION['usertype']))
            {
                if($_SESSION['usertype'] == 0)
                {
                    echo $base_path . "/Admin";
                }
                else
                {
                    echo $base_path . "/UserDashboard";
                }  
            }
            else
            {
                echo $base_path . "/index";
            }
            ?>.php" class="nav-link" id="quizzez-link">Dashboard</a></li>
            <li><a href="<?php echo $base_path; ?>/pages/quizzez.php" class="nav-link" id="quizzez-link">Quizzes</a></li>
            <li><a href="<?php echo $base_path; ?>/pages/progress.php" class="nav-link" id="progress-link">Progress</a></li>
            <li><a href="<?php echo $base_path; ?>/pages/forum.php" class="nav-link" id="forum-link">Forum</a></li>

            <?php
            if (isset($_SESSION["Loggedin"])) {
                echo '<li><a href="' . $base_path . '/authentication/signout.php" class="nav-link" id="signout-link">Sign Out</a></li>';
            } else {
                echo '<li><a href="' . $base_path . '/authentication/SignUp.php" class="nav-link" id="signup-link">Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
