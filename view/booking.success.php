<?php require_once '../includes/header.inc.php' ?>
<?php require_once '../controller/Session.php' ?>
<?php require_once '../controller/Room.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">
                        <img src="../public/image/cover_photo_1.png" alt="logo" style="height: 50px; width:50px"><span class="px-3 fw-bold" style="color: rgb(109, 140, 98)">Saluysoy Resort</span>
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
                                <a class="nav-link" href="#places">Places</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#rooms">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#footer">Contact Us</a>
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
        </div>

        <main class="col-12 py-lg-3" style="height: auto;">

            <h4 class="text-center p-3 fw-bold text-secondary" id="places">Thank You for Booking!</h4>

            <div class="card" style="width: 24rem; margin:auto">
            <small class="text-center text-light bg-success fw-bold">Please show this schedule to the receptionist if you visit us</small>
                <div class="m-2">
                <?php 
                $reservation = $room->displayRoom($_GET['room_id'])->fetch_object();
                ?>
                    <div class="d-flex justify-content-between">
                        <p>Transaction Date</p>
                        <p class="fw-bold text-primary"><?php echo date("Y-m-d")?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Transaction Reference</p>
                        <p class="fw-bold text-primary"><?php echo $reservation->id?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Customer Name</p>
                        <p class="fw-bold text-primary"><?php echo $reservation->firstname . ' ' . $reservation->middlename . ' '.$reservation->lastname?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Customer Email</p>
                        <p class="fw-bold text-primary"><?php echo $reservation->email?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Start Date</p>
                        <p class="fw-bold text-primary"><?php echo $reservation->start?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>End Date</p>
                        <p class="fw-bold text-primary"><?php echo $reservation->expire?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Total Payment</p>
                        <p class="fw-bold text-primary">₱<?php echo $reservation->total?></p>
                    </div>
                <?php
                ?>
                </div>
                <a href="home.php" class="fw-bold text-decoration-none text-center mb-3 text-danger">Back to Home</a>
            </div>

        </main>

        <!-- Footer -->
        <?php require_once '../includes/footer.php' ?>
    </div>
</div>
<?php require_once '../includes/footer.inc.php' ?>