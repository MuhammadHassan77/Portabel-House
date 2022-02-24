<?php
require("./dbconnect.php");


$to_admin = "3dsium.com@gmail.com";


$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$savdesign = $_POST['save_url'];
$enquiryDetail = $_POST['enquiryDetail'];
$total_price = $_POST['total_price'];
$to_user = $email;

// print_r($_POST);
// exit;
$subject = "User Design Order";
// $from="3dsium.com@gmail.com";
$message = "Username : " . $name . "\r\n" .  "User design url : " . $savdesign .
    "\r\n" . "User Contact Number : " . $contact_number . "\r\n" . "Enquiry  Detail : " . $enquiryDetail;
// $header="from:".$from;
$header = 'From: 3dsium.com@gmail.com' . "\r\n" .
    'Reply-To: 3dsium.com@gmail.com' . "\r\n" .
    'Cc:' . $to_admin . "\r\n" .
    'Bcc:' . $to_admin . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$query = "INSERT INTO `orders`(`fullname`, `email`, `phone`,`enquirydetail`,`total_price`,`design_url`) 
    VALUES ('$name','$email','$contact_number','$enquiryDetail',$total_price,'$savdesign')";
$result = mysqli_query($mysqli, $query);
// var_dump($result);
// echo $query;
// exit;
if ($result) {
    mail($to_user, $subject, $message, $header);
    echo json_encode(array("statusCode" => 200));

} else {
    echo json_encode(array("statusCode" => 201));
}
