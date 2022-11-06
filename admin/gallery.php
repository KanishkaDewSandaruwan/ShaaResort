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
                            <h1 class="h3 mb-3"><strong>Resort Gallery</strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#GalleryImage">Add
                                New</button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                                <table id="datatablesSimple"
                                    style="background-color: #e4ffff; padding: 10px; color: #052a2a;">
                                    <tbody>
                                        <?php
                                        $getall = getAllgalleryImages();

                                        while ($row = mysqli_fetch_assoc($getall)) {

                                            $gallery_id = $row['gallery_id'];
                                            $img = $row['gallery_image'];
                                            $img_src = "../server/uploads/gallery/" . $img; ?>


                                        <tr>
                                            <td><img width="500px" src='<?php echo $img_src; ?>'></td>
                                            <td>

                                                <button type="button"
                                                    onclick="permenantdeleteData(<?php echo $row['gallery_id']; ?>, 'gallery', 'gallery_id')"
                                                    class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                </button>

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

<div class="modal fade" id="GalleryImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #052a2a;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: white;" id="exampleModalLabel">Resort Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <input onchange="insertImage(this.form);" class="form-control" name="file" type="file"
                            id="formFile">
                    </div>
                </form>
                <div class="modal-footer" style="background-color: #052a2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>