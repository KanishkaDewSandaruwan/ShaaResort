<?php



//product

function getAllroom()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM room WHERE is_deleted = 0 ";
    return mysqli_query($con, $viewcat);
}

function getAllAvailableroom()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM room WHERE is_deleted = 0 AND room_status = 1 ORDER BY date_updated DESC ";
    return mysqli_query($con, $viewcat);
}


function checkRoomByName($room_name)
{
	include 'connection.php';

	$product = "SELECT * FROM room WHERE room_name = '$room_name' AND is_deleted = 0";
	$result = mysqli_query($con, $product);
	return mysqli_num_rows($result);
}

function getroomByID($room_id)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM room WHERE is_deleted = 0 AND room_id = '$room_id'";
	return mysqli_query($con, $viewcat);
}

function getvehicleByID($vehicle_id)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM vehicle WHERE is_deleted = 0 AND vehicle_id = '$vehicle_id' ";
	return mysqli_query($con, $viewcat);
}


function getvehicleAvailable($cat_id)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM vehicle WHERE is_deleted = 0 AND cat_id = '$cat_id' AND vehicle_status = 1";
	return mysqli_query($con, $viewcat);
}

function getVehicleByName($vehicle_id)
{
	include 'connection.php';

	$vehicle = "SELECT * FROM vehicle WHERE is_deleted = 0 AND vehicle_id = '$vehicle_id' ";
	$result = mysqli_query($con, $vehicle);
	return mysqli_num_rows($result);
}

function getRentByID($rent_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent WHERE is_deleted = 0 AND rent_id = '$rent_id' ";
	return mysqli_query($con, $rent);

}

function getExtendByID($rent_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM extend WHERE is_deleted = 0 AND rent_id = '$rent_id' ";
	return mysqli_query($con, $rent);

}

function getRentByIDWithVehicle($rent_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent join vehicle on vehicle.vehicle_id = vehicle_rent.vehicle_id WHERE vehicle_rent.is_deleted = 0 AND vehicle_rent.rent_id = '$rent_id' ";
	return mysqli_query($con, $rent);

}


function getOrderByID($order_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM room_orders WHERE is_deleted = 0 AND order_id = '$order_id' ";
	return mysqli_query($con, $rent);

}

function getAllOrderbyCustomer($customer_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM room_orders WHERE is_deleted = 0 AND customer_id = '$customer_id' ";
	return mysqli_query($con, $rent);

}

function getAllOrders()
{
	include 'connection.php';

	$rent = "SELECT * FROM room_orders join customer on  customer.customer_id = room_orders.customer_id WHERE room_orders.is_deleted = 0";
	return mysqli_query($con, $rent);

}


function getAllRents()
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent join customer on  customer.customer_id = vehicle_rent.customer_id WHERE vehicle_rent.is_deleted = 0";
	return mysqli_query($con, $rent);

}

function getAllRentsByIDAdmin($rent_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent WHERE is_deleted = 0 AND rent_id = '$rent_id' ";
	return mysqli_query($con, $rent);

}


function getAllRentsByID($customer_id)
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent join customer on  customer.customer_id = vehicle_rent.customer_id WHERE vehicle_rent.is_deleted = 0 AND vehicle_rent.customer_id = '$customer_id'";
	return mysqli_query($con, $rent);

}

function getRentByDateAvailable($vehicle_id, $start_date, $end_date)
{
	include 'connection.php';

	$rent = "SELECT * FROM vehicle_rent WHERE is_deleted = 0 AND NOT(end_date < '$start_date' OR start_date > '$end_date') AND vehicle_id = '$vehicle_id' ";
	return mysqli_query($con, $rent);

}

function getAllroomByIDHome($data)
{
	include 'connection.php';

    $room_id = $data['room_id'];

	$viewcat = "SELECT * FROM room WHERE is_deleted = 0 AND room_id = '$room_id' ";
	$res = mysqli_query($con, $viewcat);

    $roomArray = array();
    while($row = mysqli_fetch_assoc($res)){
        $roomArray[] = $row['room_price'];
        $roomArray[] = $row['waiting_time'];
        $roomArray[] = $row['number_of_works'];
    }
    echo json_encode($roomArray);
}

function getCountroomByID($room_id)
{
	include 'connection.php';

	$view = "SELECT * FROM room WHERE is_deleted = 0 AND room_id = '$room_id' ";
	return  mysqli_query($con, $view);
}

//booking



//customer


function checkuserPassword($data)
{
    include 'connection.php';
    $customer_id = $data['customer_id'];
    $password = $data['password'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND password = '$password' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function checkUserEmail($data)
{
    include 'connection.php';

    $customer_id = $data['customer_id'];
    $email = $data['email'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND email = '$email' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function getAllcustomerById($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND customer_id = '$customer_id'";
    return mysqli_query($con, $q1);
}

function checkBookingDate($newStartTime, $newEndTime, $room_id){

    include 'connection.php';

    $viewbooking = "SELECT * FROM booking WHERE (is_deleted = 0 AND room_id = '$room_id') AND
	NOT(end_time < '$newStartTime' OR booking_date > '$newEndTime')";

    $result = mysqli_query($con, $viewbooking);
    $count = mysqli_num_rows($result);
    return $count;
}


function getAllcustomers()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getLoginAdmin($data){
	include 'connection.php';

    $email = $data['email'];
    $password = $data['password'];

	$loginAdmin = "SELECT * FROM customer WHERE email = '$email' AND password ='$password'";
	$count_loginAdmin = mysqli_query($con,$loginAdmin);

    if($email == 'admin'){
        $_SESSION['admin'] = $email;
    }else{
        $res = checkCustomerByEmail($email);
        $row = mysqli_fetch_assoc($res);
        $_SESSION['customer'] = $row['customer_id'];
    }
	return mysqli_num_rows($count_loginAdmin);
}



function checkStaff($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM staff WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}

function checkCustomerByEmail($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}


function checkCustomerByID($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE customer_id='$customer_id' AND is_deleted = '0'";
    return mysqli_query($con, $q1);
}

function getAllCustomer()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND email != 'admin'";
    $table = mysqli_query($con, $q1);
    $columns = mysqli_fetch_all ($table, MYSQLI_ASSOC);

    return $columns;

}

//driver

function getAlldriver()
{
    include 'connection.php';

    $q1 = "SELECT * FROM driver WHERE is_deleted = 0";
    return mysqli_query($con, $q1);
}

function getDriverByID($driver_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM driver WHERE is_deleted = 0 AND driver_id = '$driver_id'";
    return mysqli_query($con, $q1);
}

function getAllCategory()
{
    include 'connection.php';

    $q1 = "SELECT * FROM category WHERE is_deleted = 0";
    return mysqli_query($con, $q1);

}

function getAllCategoryByID($cat_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM category WHERE is_deleted = 0 AND cat_id = '$cat_id'";
    return mysqli_query($con, $q1);

}

//gallery

function getAllgalleryImages()
{
    include 'connection.php';

    $q1 = "SELECT * FROM gallery";
    return mysqli_query($con, $q1);

}
//guide

function getAllguide()
{
    include 'connection.php';

    $q1 = "SELECT * FROM guide WHERE is_deleted = 0";
    return mysqli_query($con, $q1);

}
function getGuideByID($guid_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM guide WHERE is_deleted = 0 AND guid_id = '$guid_id'";
    return mysqli_query($con, $q1);
}
//staff

function getAllstaff()
{
    include 'connection.php';

    $q1 = "SELECT * FROM staff WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getStaffByID($staff_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM staff WHERE is_deleted = 0 AND staff_id = '$staff_id'";
    return mysqli_query($con, $q1);
}

//contact

function getAllMessages(){
	include 'connection.php';

	$messages = "SELECT * FROM contact";
	return mysqli_query($con,$messages);
}

//count

function dataCount($table){
	include 'connection.php';

	$counts = "SELECT * FROM $table";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataCountWhere($table, $where){
	include 'connection.php';

	$counts = "SELECT * FROM $table WHERE $where";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataforCount($table , $fields){
	include 'connection.php';

	$counts = "SELECT sum($fields) as sum FROM $table";
    $getdata = mysqli_query($con,$counts);
    $row = mysqli_fetch_assoc($getdata);
    echo $row['sum'];
}

function dataforCountMonth($table){
	include 'connection.php';

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE month(now()) = month(date_updated)";
    return mysqli_query($con,$counts);
}

function dataforCountToday($table){
	include 'connection.php';

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE day(now()) = day(date_updated)";
    return mysqli_query($con,$counts);
}

function dataforCountLastWeek($table){
	include 'connection.php';
    $NewDate = Date('y:m:d', strtotime('-7 days'));

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE NOT(date_updated < '$NewDate'  OR date_updated >  now())";
    return mysqli_query($con,$counts);
}


//settings

function getAllSettings(){
	include 'connection.php';

	$settings = "SELECT * FROM settings";
	return mysqli_query($con,$settings);
}

function checkPasswordByName($data){
	include 'connection.php';
	$email = $data['email'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM customer WHERE password = '$password' AND email = '$email' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}

function checkStaffPasswordByEmail($data){
	include 'connection.php';
	$email = $data['email'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM staff WHERE password = '$password' AND email = '$email' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}


?>