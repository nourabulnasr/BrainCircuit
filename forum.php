<?php 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="NavBar">
      <?php include 'NavBar.php'; ?>
    </div>
    
    <main>
        <!-- <h1>Discussion Forum</h1>
        <div class="forum-container">
            <form id="forum-form">
                <textarea placeholder="Post your question here..." required></textarea>
                <button type="submit">Post</button>
            </form>
            
            <div class="forum-posts">
                <h2>Recent Discussions:</h2>
                <ul>
                    <li>How to link CSS in HTML?</li>
                    <li>Best practices for responsive design?</li>
                    <li>Why is my JavaScript function not working?</li>
                </ul>
            </div>
        </div> -->
        <div class="container">
            <h1 class="title">Join the Discussion</h1>
        
            <!-- New Post Section -->
            <div class="new-post">
              <h2 class="forum-title">Start a New Discussion</h2>
              <form action="#" method="POST">
                <label for="topic-title" class="forum-description">Title:</label><br>
                <input type="text" id="topic-title" name="topic-title" placeholder="Enter the topic title" required class="input-field"><br><br>
        
                <label for="topic-content" class="forum-description">Discussion:</label><br>
                <textarea id="topic-content" name="topic-content" rows="5" placeholder="Write your discussion here..." required class="textarea-field"></textarea><br><br>
        
                <button type="submit" class="btn">Post Discussion</button>
              </form>
            </div>
        
            <!-- Discussion Topics -->
            <div class="discussions">
              <div class="forum-card">
                <h2 class="forum-title">Topic Title 1</h2>
                <p class="forum-description">Discussion about the topic goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn">Join Discussion</a>
              </div>
        
              <div class="forum-card">
                <h2 class="forum-title">Topic Title 2</h2>
                <p class="forum-description">Discussion about the topic goes here. Nullam convallis justo in odio varius, id ultricies mi ultricies.</p>
                <a href="#" class="btn">Join Discussion</a>
              </div>
        
              <div class="forum-card">
                <h2 class="forum-title">Topic Title 3</h2>
                <p class="forum-description">Discussion about the topic goes here. Sed euismod, libero nec fringilla tincidunt, metus justo lacinia arcu.</p>
                <a href="#" class="btn">Join Discussion</a>
              </div>
            </div>
          </div>


    </main>

    <footer>
        <p>&copy; 2024 Interactive Learning Platform</p>
    </footer>

    <!-- <script src="js/script.js"></script> -->
</body>
</html>
