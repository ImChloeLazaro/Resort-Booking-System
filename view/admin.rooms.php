<?php require_once '../includes/header.inc.php';?>
<?php require_once '../controller/Session.php'?>  
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php require_once '../includes/navbar.admin.php' ?>
        </div>
        <div class="row d-flex flex-md-row" style="height: auto;">
            <div class="col-12">
                <button class="float-end mx-1">Show Rooms</button>
            </div>

            <div class="col-12 overflow-auto" style="height: 55vh;">
            <h5>Rooms</h5>
                <table class="table table-responsive">
                    <thead>
                        <th class="col-2">Room Number</th>
                        <th class="col-2">Description</th>
                        <th class="col-2">Price</th>
                        <th class="col-2">Type</th>
                        <th class="col-2">Status</th>
                        <th class="col-2">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="../storage/resources2.jpg" style="height: 50px; width: 50px;" alt="...">
                                <p class="fw-bold">R-101</p>
                            </td>
                            <td>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam culpa libero deleniti vero saepe voluptas est neque esse nostrum repudiandae.</p>
                            </td>
                            <td>
                                <p>5000</p>
                            </td>
                            <td>
                                <p>Regular</p>
                            </td>
                            <td>
                                <p>Available</p>
                            </td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once '../includes/footer.php' ?>
</div>
<?php require_once '../includes/footer.inc.php'?>