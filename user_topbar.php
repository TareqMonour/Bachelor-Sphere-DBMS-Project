<?php
// Ensure the session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }
</style>

<nav class="navbar navbar-light fixed-top bg-info" style="padding:0;min-height: 3.5rem">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <!-- Optional place for a logo or other branding -->
        <span class="logo">BS</span> <!-- Replace with your system's logo if needed -->
      </div>
      <div class="col-md-4 float-left text-white">
        <large><b><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : 'Bachelor Sphere' ?></b></large>
      </div>
      <div class="float-right">
        <div class="dropdown mr-4">
          <a href="#" class="text-white dropdown-toggle" id="user_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- Check if login_name is set before displaying -->
            <?php echo isset($_SESSION['login_name']) ? $_SESSION['login_name'] : 'Guest'; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="user_settings" style="left: -2.5em;">
            <!-- <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> Profile</a> -->
            <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
  // Handle any custom user actions here, if needed.
</script>
