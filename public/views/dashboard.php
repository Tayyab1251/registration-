<?php
session_start();
if (!isset($_SESSION['username'])) {
  $_SESSION['loginError'] = "Shushhh ! You're not logged in";
  header("location: login.php");
}
include 'header.php';
?>

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h2 class="text-white">Dashboard</h2>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#home">
          <i class="bi bi-house-door"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#profile">
          <i class="bi bi-person"></i> Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#settings">
          <i class="bi bi-gear"></i> Settings
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#logout">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </li>
    </ul>
  </div>

  <!-- Page Content -->
  <div id="page-content-wrapper" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="btn btn-primary" id="menu-toggle">
        <i class="bi bi-list"></i> Toggle Sidebar
      </button>
      <h4 class="ms-auto">Welcome to your Dashboard</h4>
    </nav>

    <!-- Content Section -->
    <div id="content" class="mt-3">
      <div id="home" class="section fade-in">
        <h3>Home</h3>
        <!-- Welcome Message with Profile Image -->
        <div class="alert alert-success d-flex align-items-center" role="alert">
          <img src="http://static.everypixel.com/ep-pixabay/0329/8099/0858/84037/3298099085884037069-head.png" alt="Profile Picture" class="rounded-circle me-3" width="50">
          <div>
            <h5 class="mb-0">Welcome back, <?php echo $_SESSION['username']; ?>!</h5>
            <p>We’re glad to have you back. Check out your dashboard for more information.</p>
          </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="row">
          <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Sales</h5>
                <p class="card-text">$5,400 this month</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title">New Messages</h5>
                <p class="card-text">You have 12 unread messages.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
              <div class="card-body">
                <h5 class="card-title">Tasks Completed</h5>
                <p class="card-text">8/10 tasks completed this week!</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Motivational Quote -->
        <div class="alert alert-info">
          <p><em>"The best way to predict the future is to create it." - Abraham Lincoln</em></p>
        </div>
      </div>

      <div id="profile" class="section mt-4" style="display:none;">
        <h3>Your Profile</h3>
        <p>View and edit your profile information here.</p>
      </div>

      <div id="settings" class="section mt-4" style="display:none;">
        <h3>Settings</h3>
        <p>Manage your account settings.</p>
      </div>

      <div id="logout" class="section mt-4" style="display:none;">
        <h3>Logout</h3>
        <p>You can log out from your account here.</p>
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- JavaScript to toggle the sidebar and sections -->
<script>
  // Toggle sidebar visibility
  document.getElementById("menu-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("wrapper").classList.toggle("toggled");
  });

  // Show content based on sidebar navigation
  const links = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('.section');

  links.forEach(link => {
    link.addEventListener('click', function() {
      // Hide all sections
      sections.forEach(section => section.style.display = 'none');

      // Remove active class from all links
      links.forEach(link => link.classList.remove('active'));

      // Show the selected section
      const target = this.getAttribute('href').substring(1);
      document.getElementById(target).style.display = 'block';

      // Add active class to the clicked link
      this.classList.add('active');
    });
  });
</script>

<style>
  /* Custom styles for the fade-in effect */
  .fade-in {
    animation: fadeIn 1.5s ease-out;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  /* Styling for the profile picture */
  .profile-img {
    border-radius: 50%;
    width: 50px;
    margin-right: 10px;
  }
</style>

<?php include 'footer.php'; ?>