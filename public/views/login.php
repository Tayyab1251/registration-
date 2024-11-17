<?php 
session_start();

include 'header.php';

if (isset($_SESSION['success'])): ?>
    <div class="container my-1">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo  $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; 
  
  include 'footer.php';
  ?>

  