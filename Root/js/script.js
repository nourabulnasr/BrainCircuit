
// to make a form on the forum page
document.getElementById('forum-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const postContent = e.target.querySelector('textarea').value;
    
    const postList = document.querySelector('.forum-posts ul');
    const newPost = document.createElement('li');
    newPost.textContent = postContent;
    postList.appendChild(newPost);
    
    e.target.reset();  
});

// Select all navigation links
const navLinks = document.querySelectorAll('.nav-link');

// Function to add 'active' class to the current page link
function setActiveLink() {
  const currentPath = window.location.pathname;

  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('active');
      link.parentElement.classList.add('active');
    } else {
      link.classList.remove('active');
      link.parentElement.classList.remove('active');
    }
  });
}

// Call the function to set active link on page load
setActiveLink();

document.getElementById("nav-toggle").addEventListener("click", function() {
  const nav = document.getElementById("navbar").querySelector("ul");
  nav.classList.toggle("show");
});





