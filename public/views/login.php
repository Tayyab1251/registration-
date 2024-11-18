<?php
session_start();

include 'header.php';
if (isset($_SESSION['loginError'])): ?>
  <div class="container my-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['loginError']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php unset($_SESSION['loginError']); ?>
<?php endif; ?>


<?php
if (isset($_SESSION['success'])): ?>
  <div class="container my-1">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['success']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php
if (isset($_SESSION['error'])): ?>
  <div class="container my-1">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['error']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="container">
  <h1 class="title py-4 text-primary text-center">User Login Page</h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
      <div id="warning" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo 'Login button clicked.<br>';

  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    include '../db/db-config.php';
    // Getting the data
    $sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($username == $row['username'] && $password == $row['password']) {
        sleep(1);
        header("location: http://localhost/php/register/public/views/dashboard.php");
        exit();
      } else {
        $_SESSION['error'] = "Invalid login credentials";
      }
    }
    $conn->close();
  }
}
include 'footer.php';
?>