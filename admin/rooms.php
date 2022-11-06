<!DOCTYPE html>
<html lang="en">
<?php include 'template/head.php'; ?>


<body>
    <div class="wrapper">

        <?php include 'template/navbar.php'; ?>

        <div class="main">

            <?php include 'template/topbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="h3 mb-3"><strong>Rooms</strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#RoomModal">Add
                                New</button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                                <table id="datatablesSimple"
                                    style="background-color: #e4ffff; padding: 10px; color: #052a2a;">
                                    <thead>
                                        <tr>
                                            <th>Room Name</th>
                                            <th>Room Details</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Occupancy</th>
                                            <th>Room Price</th>
                                            <th>Available</th>
                                            <th>Date Updated</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $getall = getAllroom();

                                        while ($row = mysqli_fetch_assoc($getall)) {

                                            $room_id = $row['room_id'];
                                            $img = $row['room_image'];
                                            $img_src = "../server/uploads/room/" . $img; ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['room_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['room_details']; ?>
                                            </td>
                                            <td>
                                                <img onclick="upImage(<?php echo $room_id; ?>)" width="200px"
                                                    src='<?php echo $img_src; ?>'>
                                                <form enctype="multipart/form-data" method="POST">
                                                    <div class="mb-3">
                                                        <input class="form-control" value="<?php echo $row['room_id'] ?>"
                                                            name="id" type="hidden" id="id">
                                                        <input class="form-control" value="room_id" name="id_fild"
                                                            type="hidden" id="id_fild">
                                                        <input class="form-control" value="room" name="table"
                                                            type="hidden" id="table">
                                                        <input class="form-control" value="room_image" name="field"
                                                            type="hidden" id="field">
                                                        <input onchange="uploadImageroomEdit(this.form);"
                                                            class="form-control" style="display: none;" name="file"
                                                            type="file" id="formFile<?php echo $room_id; ?>">
                                                    </div>
                                                </form>

                                            </td>

                                            <td><select
                                                    onchange='updateData(this, "<?php echo $room_id; ?>","cat_id", "room", "room_id")'
                                                    id="cat_id <?php echo $room_id; ?>" class='form-control norad tx12'
                                                    name="cat_id" type='text'>
                                                    <?php 
                                                    $getallCat = getAllCategory();
                                                    while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                    <option value="<?php echo $row2['cat_id']; ?>"
                                                        <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                                        <?php echo $row2['cat_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="number" class="form-control"
                                                    onchange="updateData(this, '<?php echo $room_id; ?>', 'room_occupancy', 'room', 'room_id');"
                                                    name="room_occupancy" id="room_occupancy <?php echo $room_id; ?>"
                                                    value="<?php echo $row['room_occupancy']; ?>">
                                            </td>

                                            <td>
                                                <input type="number" class="form-control"
                                                    onchange="updateData(this, '<?php echo $room_id; ?>', 'room_price', 'room', 'room_id');"
                                                    name="room_price" id="room_price <?php echo $room_id; ?>"
                                                    value="<?php echo $row['room_price']; ?>">
                                            </td>

                                            <td>
                                                <select
                                                    onchange="updateData(this, '<?php echo $room_id; ?>', 'is_active', 'room', 'room_id');"
                                                    id="is_active <?php echo $room_id; ?>"
                                                    class='form-control norad tx12' name="is_active" type='text'>
                                                    <option value="1"
                                                        <?php if ($row['is_active'] == "1" ) echo "selected" ; ?>>
                                                        Active
                                                    </option>
                                                    <option value="0"
                                                        <?php if ($row['is_active'] == "0" ) echo "selected" ; ?>>
                                                        Deactive
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <?php echo $row['date_updated']; ?>
                                            </td>
                                            <td>

                                                <a href="room_edit.php?room_id=<?php echo $row['room_id']; ?>"
                                                    class="btn btn-darkblue">
                                                    <i class="fa-solid fa-pen-to-square"></i> </a>

                                                <?php if ($row['is_active']=="0"): ?>
                                                <button type="button"
                                                    onclick="deleteData(<?php echo $row['room_id']; ?>,'room', 'room_id')"
                                                    class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <?php endif; ?>


                                            </td>
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php include 'template/footer.php'; ?>

        </div>
    </div>

    <?php include 'template/footer_script.php'; ?>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="RoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background-color: #052a2a;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Rooms</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12">
                            <label for="room_name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" name="room_name" id="room_name"
                                placeholder="Room Name" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="cat_id" class="form-label">Category</label>
                            <select class="form-select" name="cat_id" id="cat_id" aria-label="Default select example">
                                <?php $getall = getAllCategory();
                                while ($row = mysqli_fetch_assoc($getall)) { ?>
                                <option value="<?php echo $row['cat_id'] ?>">
                                    <?php echo $row['cat_name'] ?>
                                </option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="room_price" class="form-label">Room Price</label>
                            <input type="number" class="form-control" name="room_price" id="room_price"
                                placeholder="Room Price" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="room_occupancy" class="form-label">Room Occupancy</label>
                            <input type="number" class="form-control" name="room_occupancy" id="room_occupancy"
                                placeholder="Room Occupancy" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="room_details" class="form-label">Room Description</label>
                            <textarea id="room_details" name="room_details"></textarea>



                            <script>
                            $('#room_details').summernote({
                                placeholder: 'Room Details',
                                tabsize: 2,
                                height: 120,
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['view', ['fullscreen', 'codeview', 'help']]
                                ]
                            });
                            </script>

                        </div>

                        <div class="form-group mt-3">
                            <label for="inputPassword">Active</label>
                            <select id="is_active" class='form-control norad tx12' name="is_active" type='text'>
                                <option value="1"> Active</option>
                                <option value="0"> Deactive</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="file" class="form-label">Package Image file</label>
                            <input class="form-control" name="file" type="file" id="file">
                        </div>

                </div>
                <div class="modal-footer " style="background-color: #052a2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addRoom(this.form)" name="submit" class="btn btn-info">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>