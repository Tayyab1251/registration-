<!-- including Header/Footer -->
<?php
session_start();

include 'public\views\header.php';

// Check if the session variable is set
if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];  // Display the success message
  unset($_SESSION['success']);  // Clear the message after displaying
  print_r($_SESSION);
}
?>
<!-- SigUp form -->
<h1 class="title py-4 text-primary text-center">User SignUp</h1>
<form action="public\views\signup.php" method="post">

  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
    <div id="warning" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100" >Signup</button>
</form>

<?php include 'public\views\footer.php'; ?>