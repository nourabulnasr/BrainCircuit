<header>
    <nav>
        <ul>
            <span style="color: red;">
            <?php
            session_start();
            if (isset($_SESSION["Loggedin"])) {
                echo $_SESSION["UserName"];
            }
            ?>
            </span>
            <li><a href="index.php" class="nav-link" id="home-link">Home
                    <img src="https://openui.fly.dev/openui/24x24.svg?text=🏠" alt="House Icon" class="w-6 h-6 mr-2" />
                </a></li>
            <li><a href="quizzez.php" class="nav-link" id="quizzez-link">Quizzes
                    <img src="https://openui.fly.dev/openui/24x24.svg?text=📝" alt="Quizzez Icon" class="w-6 h-6" />
                </a></li>
            <li><a href="progress.php" class="nav-link" id="progress-link">Progress
                    <img src="https://openui.fly.dev/openui/24x24.svg?text=📈" alt="Progress Icon" class="w-6 h-6 mr-2" />
                </a></li>
            <li><a href="forum.php" class="nav-link" id="forum-link">Forum
                    <img src="https://openui.fly.dev/openui/24x24.svg?text=💬" alt="Forum Icon" class="w-6 h-6 mr-2" />
                </a></li>

            <?php
            //session_start();
            if (isset($_SESSION["Loggedin"])) {
                echo '<li><a href="signout.php" class = "nav-link" id="forum-link">Sign Out
                <img src="https://openui.fly.dev/openui/24x24.svg?text=💬" alt="Forum Icon" class="w-6 h-6 mr-2" />
                </a></li>';
            }
            else
            {
                echo '<li><a href="SignUp.php" class = "nav-link" id="forum-link">Sign Up
                <img src="https://openui.fly.dev/openui/24x24.svg?text=💬" alt="Forum Icon" class="w-6 h-6 mr-2" />
                </a></li>';
            }

            ?>


        </ul>


    </nav>
</header>


<!-- 
 to make an active state to highlight the page we are on by making a unqiue id -->