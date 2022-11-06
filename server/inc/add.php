<?php

function addRoom($data, $img)
{
	include 'connection.php';

	$room_name = $data['room_name'];
	$cat_id = $data['cat_id'];
	$room_details = $data['room_details'];
	$room_price = $data['room_price'];
	$room_occupancy = $data['room_occupancy'];
	$is_active = $data['is_active'];

	$count = checkRoomByName($room_name);

	if ($count == 0) {

		$sql = "INSERT INTO room(room_name, cat_id, room_details, room_price, room_occupancy, room_image, is_deleted, date_updated ,is_active) 
		VALUES('$room_name', '$cat_id', '$room_details', '$room_price', '$room_occupancy', '$img' ,0 , now(), '$is_active')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}




function addBooking($data)
{
	include 'connection.php';

	$room_id = $data['room_id'];
	$departure_date = $data['departure_date'];
	$arrival_date = $data['arrival_date'];
	$customer_id = $data['customer_id'];
	$total = $data['total'];
	$booking_occupancy = $data['booking_occupancy'];

	$sql = "INSERT INTO booking(customer_id, room_id, total, arrival_date, departure_date, booking_occupancy, is_deleted ,date_updated) 
	VALUES('$customer_id', '$room_id', '$total', '$arrival_date', '$departure_date', '$booking_occupancy' ,0 , now())";
	mysqli_query($con, $sql);
	echo json_encode(mysqli_insert_id($con));

}

function addFacility($data)
{
	include 'connection.php';

	$facility_name = $data['facility_name'];
	$facility_desc = $data['facility_desc'];

	$count = checkFacilityByName($facility_name);

	if ($count == 0) {

		$sql = "INSERT INTO facility(facility_name, facility_desc) VALUES('$facility_name', '$facility_desc')";
		return mysqli_query($con, $sql);
	}
	else {
		echo json_encode($count);
	}
}


function addLocation($data, $img)
{
	include 'connection.php';

	$location_name = $data['location_name'];

	$count = checkLocationByName($location_name);

	if ($count == 0) {

		$sql = "INSERT INTO location(location_name, location_image) VALUES('$location_name', '$img')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}

function addCategory($data, $img)
{
    include 'connection.php';

    $category_name = $data['category_name'];


    $sql = "INSERT INTO category(cat_name, cat_image, is_deleted, date_updated) VALUES('$category_name', '$img', 0 , now())";
    return mysqli_query($con, $sql);

}


//cntact
function addMessage($data)
{
    include 'connection.php';

    $name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];


	$sql = "INSERT INTO contact(name, email, subject, message, date_updated) VALUES('$name', '$email', '$subject', '$message', now())";
	return mysqli_query($con, $sql);
}



function createCustomer($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$gender = $data['gender'];
	$password = $data['password'];

	$sql = "INSERT INTO customer(name, email, phone, nic, address, gender, password, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', '$password', 0 )";
	return mysqli_query($con, $sql);
	
}

function insertImagetoGallery($img)
{
    include 'connection.php';

	$sql = "INSERT INTO gallery(gallery_image) VALUES('$img')";
	return mysqli_query($con, $sql);
}


?>