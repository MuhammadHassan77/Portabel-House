<?php 
require("./dbconnect.php");

if (isset($_POST['act']) && $_POST['act'] == "savechanges") {
    // print_r($_POST);
    // exit;
    if (
       
        !empty($_POST['url']) ||
        // !empty($_POST['email']) ||
        // !empty($_POST['userId']) ||
        !empty($_POST['details'])
    ) {
       
        $details = $_POST['details'];
        $email = $_POST['email'];
        $url = $_POST['url'];
        $userId = $_POST['userId'];

        $q = "INSERT INTO  savechanges(details)
        VALUES('{$details}') ";
      
        $res = mysqli_query($mysqli, $q);
        $lastId = $mysqli->insert_id;

        if ($res) {
            $date=date("h:i:sa d-m-Y");
            // $sql = "INSERT INTO saveurl(url,email,savedate,userid) VALUES('$url.$lastId','$email','$date','$userId') ";
            $sql = "INSERT INTO saveurl(url,email,savedate,userid) VALUES('$url.$lastId','','$date',1) ";
            $result = mysqli_query($mysqli, $sql);

            echo json_encode(array("result" => 200, "lastId" => $lastId));
        } else {
            echo json_encode(array("result" => "error"));
        }
    }
}


?>