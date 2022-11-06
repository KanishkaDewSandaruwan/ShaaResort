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
                            <h1 class="h3 mb-3"><strong>Facility</strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal">Add
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

                                            <th>Facility Name</th>
                                            <th>Facility Description</th>
                                            <th></th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                            $getall = getAllFacility();

                            while($row=mysqli_fetch_assoc($getall)){

                                $facility_id = $row['facility_id']; ?>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input id="facility_name  <?php echo $facility_id; ?>" type="text"
                                                        name="facility_name"
                                                        onchange="updateData(this, '<?php echo $facility_id; ?>', 'facility_name', 'facility', 'facility_id');"
                                                        value="<?php echo $row['facility_name']; ?>"
                                                        data-parsley-trigger="change" required=""
                                                        placeholder="Enter Category Name" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="facility_desc  <?php echo $facility_id; ?>" type="text"
                                                        name="facility_desc"
                                                        onchange="updateData(this, '<?php echo $facility_id; ?>', 'facility_desc', 'facility', 'facility_id');"
                                                        value="<?php echo $row['facility_desc']; ?>"
                                                        data-parsley-trigger="change" required=""
                                                        placeholder="Enter Category Name" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </td>


                                            <td><button type="button"
                                                    onclick="permenantdeleteData(<?php echo $row['facility_id']; ?>,'facility', 'facility_id')"
                                                    class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i> Delete
                                                </button></td>
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

<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background-color: #052a2a;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Facilities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="facility_name" id="facility_name"
                                placeholder="Facility Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="facility_desc" id="facility_desc"
                                placeholder="Facility Description" required>
                        </div>

                </div>
                <div class="modal-footer " style="background-color: #052a2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addFacility(this.form)" name="submit" class="btn btn-info">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>