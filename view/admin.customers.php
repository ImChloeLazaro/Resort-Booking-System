<?php require_once '../includes/header.inc.php';?>
<?php require_once '../controller/Session.php'?>  
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php require_once '../includes/navbar.admin.php' ?>
        </div>
        
        <div class="row d-flex flex-md-row" style="height: auto;">

            <div class="col-12 overflow-auto" style="height: 55vh;">
            <h5>Customer</h5>
                <table class="table table-responsive">
                    <thead>
                        <th class="col-2">Customer Name</th>
                        <th class="col-2">Room Number</th>
                        <th class="col-2">From</th>
                        <th class="col-2">Until</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Chloe Kim N. Lazaro</p>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once '../includes/footer.php' ?>
</div>
<?php require_once '../includes/footer.inc.php'?>