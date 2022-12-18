<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../public/image/cover_photo_1.png" alt="logo" style="height: 50px; width:50px"><span class="px-3 fw-bold">Saluysoy Resort</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100 d-lg-flex justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.customers.php">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.rooms.php">Rooms</a>
        </li>
        <li class="nav-item">
          <?php
            if (!isset($_SESSION['data'])) {
            ?>
              <a class="nav-link" href="auth.php">Account</a>
            <?php
            } else {
            ?>
              <a class="nav-link" href="../controller/Logout.php">Logout <?php echo "<b>" . strtoupper($session::showSession('data')['firstname']) . "</b>" ?></a>
            <?php
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>