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
                        <div class="col-md-9">

                            <h1 class="h3 mb-3"><strong>Messages</strong></h1>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                                <table id="datatablesSimple"
                                    style="background-color: #e4ffff; padding: 10px; color: #052a2a;">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                $getall = getAllMessages();

                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                        <tr>

                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                            <td><?php echo $row['date_updated']; ?></td>
                                            <td>

                                                <button type="button"
                                                    onclick="permenantdeleteData(<?php echo $row['contact_id']; ?>, 'contact', 'contact_id' )"
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>