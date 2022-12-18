<?php require_once '../includes/header.inc.php'; ?>
<?php require_once '../controller/Session.php' ?>
<?php require_once '../controller/Room.php' ?>
<?php $room->AddRoom() ?>
<?php $room->editRoom()?>
<?php $room->deleteRoom() ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php require_once '../includes/navbar.admin.php' ?>
        </div>
        <div class="row d-flex flex-md-row" style="height: auto;">
            <div class="col-12">
                <button class="btn btn-primary float-end mx-1 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add Rooms</button>
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
                        <?php
                        foreach ($room->showRoom() as $room) :
                        ?>
                            <tr>
                                <td>
                                    <img src="../storage/<?php echo $room['picture'] ?>" style="height: 50px; width: 50px;" alt="...">
                                    <p class="fw-bold"><?php echo $room['number'] ?></p>
                                </td>
                                <td>
                                    <p><?php echo $room['description'] ?></p>
                                </td>
                                <td>
                                    <p>₱<?php echo $room['price'] ?></p>
                                </td>
                                <td>
                                    <p><?php echo $room['type'] ?></p>
                                </td>
                                <td>
                                    <p><?php echo $room['is_occupied'] ? "Occupied" : "Available" ?></p>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#update<?php echo $room['id']?>">Edit</button>
                                    <a class="btn btn-sm btn-danger text-decoration-none text-light fw-bold" href="admin.rooms.php?id=<?php echo $room['id'] ?>">Delete</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="update<?php echo $room['id']?>" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div>
                                                <h5>Edit Room</h5>
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input class="my-1 form-control" type="text" name="rnumber" id="" placeholder="Room Number" value="<?php echo $room['number'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="my-1 form-control" type="text" name="description" id="" placeholder="Description" value="<?php echo $room['description'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="my-1 form-control" type="text" name="price" id="price" placeholder="Price" value="<?php echo $room['price'] ?>">
                                                    </div>
                                                    <div class="form-group mb-1">
                                                        <select class="form-select" name="type" id="">
                                                            <option value="">Type</option>
                                                            <option value="regular">Regular</option>
                                                            <option value="vip">VIP</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $room['id']?>">
                                                    <input class="btn btn-primary fw-bold w-100" name="edit_room" type="submit" value="Edit Room">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div>
                                <h5>Add Room</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" type="file" name="image" id="">
                                    </div>
                                    <div class="form-group">
                                        <input class="my-1 form-control" type="text" name="rnumber" id="" placeholder="Room Number">
                                    </div>
                                    <div class="form-group">
                                        <input class="my-1 form-control" type="text" name="description" id="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input class="my-1 form-control" type="text" name="price" id="price" placeholder="Price">
                                    </div>
                                    <div class="form-group mb-1">
                                        <select class="form-select" name="type" id="">
                                            <option value="">Type</option>
                                            <option value="regular">Regular</option>
                                            <option value="vip">VIP</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary fw-bold w-100" name="add_room" type="submit" value="Add Room">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php require_once '../includes/footer.php' ?>
</div>
<?php require_once '../includes/footer.inc.php' ?>