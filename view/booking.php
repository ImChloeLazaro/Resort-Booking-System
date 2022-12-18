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
            <h4 class="text-center p-3 fw-bold text-secondary" id="places">Place Your Booking Date</h4>

            <div class="card" style="width: 24rem; margin:auto">
                <small class="text-center text-light bg-danger fw-bold">You are not able to cancel your booking once you booked.</small>
                <?php $room->booking() ?>
                <?php
                if (isset($_POST['book_btn'])) :

                    $price = $_POST['price'];
                    $user_id = $_POST['user_id'];
                    $room_id = $_POST['room_id'];
                ?>
                    <form method="post" class="m-2">
                        <p>Price <?php echo $price ?> per Night</p>
                        <label for="date">Start</label>
                        <input type="date" name="start" class="form-control">
                        <label for="date">Expire</label>
                        <input type="date" name="expire" class="form-control">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="room_id" value="<?php echo $room_id ?>">
                        <input type="hidden" name="price" value="<?php echo $price ?>">
                        <input class="btn btn-primary w-100 fw-bold mt-2" type="submit" name="booknow" value="Book Now">
                    </form>
                <?php
                endif;
                ?>
            </div>

        </main>

        <!-- Footer -->
        <?php require_once '../includes/footer.php' ?>
    </div>
</div>
<?php require_once '../includes/footer.inc.php' ?>