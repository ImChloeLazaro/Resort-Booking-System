<?php require_once '../includes/header.inc.php';?>
<?php require_once '../controller/auth.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php require_once '../includes/navbar.inc.php' ?>
        </div>
        <div class="row d-flex flex-column-reverse flex-md-row">
            <div class="col-12 col-md-4 m-auto my-5" style="height: 40vh;">
                <div class="card h-auto">
                    <h5 class="p-2 text-center">Login</h5>
                    <?php $auth->login();?>
                    <form method="POST">
                        <div class="form-group d-flex justify-content-center">
                            <input type="text" name="email" id="email" class="form-control my-1 mx-2 w-100" placeholder="Email">
                        </div>
                        
                        <div class="form-group d-flex justify-content-center">
                            <input type="text" name="password" id="password" class="form-control my-1 mx-2 w-100" placeholder="Password">
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="Login" class="btn btn-primary mt-1 mb-3 mx-2 w-100 fw-bold" name="login">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../includes/footer.php' ?>
</div>
<?php require_once '../includes/footer.inc.php'?>