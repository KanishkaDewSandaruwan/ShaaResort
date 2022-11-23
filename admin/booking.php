<!DOCTYPE html>
<html lang="en">
<?php include 'template/head.php'; ?>

<body>
    <div class="wrapper">

        <?php include 'template/navbar.php'; ?>

        <div class="main">

            <?php include 'template/topbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0" >
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="h3 mb-3"><strong>Booking</strong></h1>
                        </div>
        
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>

                                            <th>Booking ID</th>
                                            <th>Customer</th>
                                            <th>Total Amount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Date Updated</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $getall = getAllBooking();

                                        while ($row = mysqli_fetch_assoc($getall)) {
                                            $booking_id = $row['booking_id'];
                                        ?>


                                        <tr>

                                            <td class="order-color">
                                                <?php echo $row['booking_id']; ?>
                                            </td>

                                            <td class="order-color">
                                            <?php echo $row['name']; ?><br><?php echo $row['phone']; ?><br><?php echo $row['email']; ?><br><?php echo $row['address']; ?>
                                            </td>
                                            <td>Rs.
                                                <?php echo $row['total']; ?>.00
                                            </td>


                                          
                                            <td>
                                                <?php echo $row['arrival_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['departure_date']; ?>
                                            </td>
                                            <td> <select
                                                onchange='updateData(this, "<?php echo $booking_id; ?>","booking_status", "booking", "booking_id")'
                                                id="booking_status <?php echo $booking_id; ?>" class='form-control'
                                                name="booking_status" type='text'>
                                                <option value="0" <?php if ($row['booking_status']=="0") echo "selected"; ?>>
                                                    Pending
                                                </option>
                                                <option value="1" <?php if ($row['booking_status']=="1") echo "selected"; ?>>
                                                    Accept
                                                </option>
                                                <option value="2" <?php if ($row['booking_status']=="2") echo "selected"; ?>>
                                                    Cancel
                                                </option>
                                            </select></td>
                                            <td>
                                                <?php echo $row['date_updated']; ?>
                                            </td>
                                            <td>
         
                                                <a href="bille.php?booking_id=<?php echo $row['booking_id']; ?>"
                                                    class="btn btn-darkblue"> <i class="fa-solid fa-file-pdf"></i>
                                                </a>
         
                                                <button type="button"
                                                    onclick="deleteData(<?php echo $row['booking_id']; ?>,'booking', 'booking_id')"
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