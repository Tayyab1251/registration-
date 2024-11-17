<!-- including Header/Footer -->
<?php
session_start();

include 'public\views\header.php';
 if (isset($_SESSION['error'])): ?>
  <div class="container my-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?php echo  $_SESSION['error']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Method not matched -->

<?php if (isset($_SESSION['error'])): ?>
  <div class="container my-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?php echo  $_SESSION['error']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- SigUp form -->

<h1 class="title py-4 text-primary text-center">User SignUp</h1>
<form action="public\views\signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>">
    <div id="warning" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; ?>">
  </div>
  <button type="submit" class="btn btn-primary w-100">Signup</button>
</form>

<?php include 'public\views\footer.php'; ?>