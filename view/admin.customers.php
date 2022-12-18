<?php require_once '../includes/header.inc.php';?>
<?php require_once '../controller/Session.php'?> 
<?php require_once '../controller/Room.php'?>  
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
                        <?php  
                        foreach($room->showAllReserved() as $reservation):
                           ?>
                            <tr>
                                <td>
                                    <p><?php echo $reservation['firstname'] . ' ' . $reservation['middlename'] . ' ' . $reservation['lastname']?></p>
                                </td>
                                <td>
                                    <p><?php echo $reservation['number']?></p>
                                </td>
                                <td>
                                    <p><?php echo $reservation['total'] ?></p>
                                </td>
                                <td>
                                    <p><?php echo $reservation['start'] ?> - <?php echo $reservation['expire']?></p>
                                </td>
                            </tr>
                           <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once '../includes/footer.php' ?>
</div>
<?php require_once '../includes/footer.inc.php'?>