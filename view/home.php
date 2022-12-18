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

        <div class="col-12 animate__animated animate__fadeIn">
            <div class="row" style="height: 70vh;">
                <img src="../public/image/cover_photo_3.jpg" class="img-fluid" alt="..." style="padding-left:0; padding-right:0; max-height:70vh; filter:opacity(80%)">
            </div>
        </div>

        <aside class="col-12 py-lg-3" style="height: auto;">

            <h4 class="text-center p-3 fw-bold text-secondary" id="places">Featured Places</h4>
            <p class="text-center" style="text-align: justify;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi veniam officiis vel omnis dolore id sit, ab error ratione cum.</p>

            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-evenly">
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/resources7.jpg" class="img-fluid h-100" alt="...">
                </div>

                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/resources1.jpg" class="img-fluid h-100" alt="...">
                </div>

                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/resources3.jpg" class="img-fluid h-100" alt="...">
                </div>

                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/resources4.jpg" class="img-fluid h-100" alt="...">
                </div>

                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/resources4.jpg" class="img-fluid h-100" alt="...">
                </div>
            </div>

        </aside>

        <div class="col-12 py-lg-3 bg-light h-auto" id="rooms">
            <h4 class="text-center p-3 fw-bold text-secondary" id="places">Our Rooms</h4>

            <p class="text-center" style="text-align: justify;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi veniam officiis vel omnis dolore id sit, ab error ratione cum.</p>


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($room->showRoom() as $room) :
                    ?>
                        <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card swiper-slide" style="height: auto;">
                            <img src="../storage/<?php echo $room['picture'] ?>" class="img-fluid h-100" alt="...">
                            <div class="card-body d-flex justify-content-between">
                            <form action="booking.php" method="post">
                                <input type="hidden" name="price" value="<?php echo $room['price']?>">
                                <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['data'])){echo $session::showSession('data')['id'];}?>">
                                <input type="hidden" name="room_id" value="<?php echo $room['id']?>">
                                <?php 
                                    
                                    if(isset($_SESSION['data'])):    
                                        $class = '';
                                        $room['is_occupied'] ? $class = 'disabled': $class = '';
                                        ?>
                                            <button name="book_btn" class="btn btn-sm btn-success  <?php echo $class?>">Book Now</button>
                                        <?php
                                    else:
                                        ?>
                                            <button name="book_btn" class="btn btn-sm btn-success disabled">Book Now</button>
                                        <?php
                                    endif;
                                ?>
                            </form>
                                <div class="d-flex flex-column">
                                    <small class="text-secondary">₱<?php echo $room['price'] ?> per Night</small>
                                    <small class="text-secondary"><?php echo $room['is_occupied'] ? "Occupied" : "Available" ?></small>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

        <div class="col-12 bg-light py-lg-5" style="height: auto;" id="services">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-evenly">
                <div class="col-12 col-lg-3 mx-1 d-flex flex-column justify-content-center align-items-center" style="height: 10rem;">
                    <img src="../public/image/wallet_vector.png" alt="" style="height: 5rem;">
                    <p>Affordable Price</p>
                </div>

                <div class="col-12 col-lg-3 mx-1 d-flex flex-column justify-content-center align-items-center" style="height: 10rem;">
                    <img src="../public/image/location_vector.png" alt="" style="height: 5rem;">
                    <p>Easy to Locate</p>
                </div>

                <div class="col-12 col-lg-3 mx-1 d-flex flex-column justify-content-center align-items-center" style="height: 10rem;">
                    <img src="../public/image/5star_vector.png" alt="" style="height: 5rem;">
                    <p class="">has 5 Star Rating</p>
                </div>

                <div class="col-12 col-lg-3 mx-1 d-flex flex-column justify-content-center align-items-center" style="height: 10rem;">
                    <img src="../public/image/certificate_vector.png" alt="" style="height: 5rem;">
                    <p>Certified by Municipality of Sipocot</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once '../includes/footer.php' ?>
    </div>
</div>
<?php require_once '../includes/footer.inc.php' ?>