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

                            <h1 class="h3 mb-3"><strong>Customer</strong></h1>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                            <table id="datatablesSimple" style="background-color: #e4ffff; padding: 10px; color: #052a2a;">
                                    <thead>
                                        <tr>
                                        
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>NIC</th>
                                            <th>Address</th>
                                            <th>Gender</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>NIC</th>
                                            <th>Address</th>
                                            <th>Gender</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                $getall = getAllcustomers();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $customer_id = $row['customer_id'];
                                  ?>


                                        <tr>
                                            
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['nic']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php if ($row['gender']=="1"){ echo "Male"; }else{ echo "Female";} ?>
                                            </td>
                                            <td> <button type="button"
                                                    onclick="deleteData(<?php echo $row['customer_id']; ?>,'customer', 'customer_id')"
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

<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
</html>