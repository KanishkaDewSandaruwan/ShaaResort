<?php



//product

function getAllroom()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM room WHERE is_deleted = 0 ";
    return mysqli_query($con, $viewcat);
}

function getAllBooking()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM booking join customer on customer.customer_id = booking.customer_id WHERE booking.is_deleted = 0 ";
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

function checkLocationByName($location_name)
{
	include 'connection.php';

	$product = "SELECT * FROM location WHERE location_name = '$location_name'";
	$result = mysqli_query($con, $product);
	return mysqli_num_rows($result);
}
function checkFacilityByName($facility_name)
{
	include 'connection.php';

	$product = "SELECT * FROM facility WHERE facility_name = '$facility_name'";
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

function getRoomByDateAvailable($room_id, $arrival_date, $departure_date)
{
	include 'connection.php';

	$rent = "SELECT * FROM booking WHERE is_deleted = 0 AND NOT(departure_date < '$arrival_date' OR arrival_date > '$departure_date') AND room_id = '$room_id' ";
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

function getAllLocation()
{
    include 'connection.php';

    $q1 = "SELECT * FROM location";
    return mysqli_query($con, $q1);
}

function getAllFacility()
{
    include 'connection.php';

    $q1 = "SELECT * FROM facility";
    return mysqli_query($con, $q1);
}


function getAllbookingByCustomer($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM booking join room on room.room_id = booking.room_id  WHERE booking.customer_id = '$customer_id'";
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

function dataforCountMonth($table , $fields){
	include 'connection.php';

	$counts = "SELECT sum($fields) as sum FROM $table WHERE month(now()) = month(date_updated)";
    $getdata = mysqli_query($con,$counts);
    $row = mysqli_fetch_assoc($getdata);
    echo $row['sum'];
}

function dataforCountToday($table , $fields){
	include 'connection.php';

	$counts = "SELECT sum($fields) as sum FROM $table WHERE day(now()) = day(date_updated)";
    $getdata = mysqli_query($con,$counts);
    $row = mysqli_fetch_assoc($getdata);
    echo $row['sum'];
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


?>