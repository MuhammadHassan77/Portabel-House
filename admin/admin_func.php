<?php

require("../dbconnect.php");

session_start();


// // Turn off all error reporting
// error_reporting(0);

// //Report simple running errors
// error_reporting(E_ERROR | E_WARNING);

function getFileNames($folderPath)
{
    $fileNames = array();
    if ($handle = opendir($folderPath)) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {
                $fileNames[] = $entry;
                // echo "$entry" . "<br>";
            }
        }
        return $fileNames;

        closedir($handle);
    }
}


function countFiles($folderPath)
{
    $dir = opendir($folderPath); # This is the directory it will count from
    $i = 0; # Integer starts at 0 before counting

    # While false is not equal to the filedirectory
    while (false !== ($file = readdir($dir))) {
        if (!in_array($file, array('.', '..')) && !is_dir($file)) $i++;
    }
    return $i;
    // echo "There were $i files"; # Prints out how many were in the directory
}
// print_r(countFiles("./data/Face"));


// ENCRPYTION EMAIL
function encrypt($password)
{
    // Store the cipher method 
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method 
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption 
    $encryption_iv = '1234567891011121';

    // Store the encryption key 
    $encryption_key = "scraping";

    // Use openssl_encrypt() function to encrypt the data 
    $encrypt_pass = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    return $encrypt_pass;
}

// echo encrypt("m.hassanshaikh77@gmail.com");

function decrypt($encrypt_pass)
{
    $ciphering = "AES-128-CTR";

    $options = 0;

    // Non-NULL Initialization Vector for decryption 
    $decryption_iv = '1234567891011121';

    // Store the decryption key 
    $decryption_key = "scraping";

    // Use openssl_decrypt() function to decrypt the data 
    $decrypt_pass = openssl_decrypt(
        $encrypt_pass,
        $ciphering,
        $decryption_key,
        $options,
        $decryption_iv
    );

    return $decrypt_pass;
}
// echo decrypt("ZmdmgRzOr8haTw==");
// exit;

function getDynamicComponent($table, $element)
{
    global $mysqli;
    $q = "SELECT * FROM $table";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $id = $rows['id'];
        $name = $rows['name'];
        $url = $rows['url'];
        echo '
			<li onclick="document.getElementById(\'' . $element . '\').src=\'' . $url . '\'"
				class="list-group-item d-flex justify-content-between align-items-center">
						<img class="img-circle" width="150" alt=""src="' . $url . '">	
                      <h6>' . $name . '</h6>
			</li>';
    }
}

function getOrders()
{
    global $mysqli;
    $res = mysqli_query($mysqli, "SELECT COUNT(orderid) as total_orders FROM orders");
    foreach ($res as $row) {
        echo $row['total_orders'];
    }
}

function getComponents()
{
    global $mysqli;
    $res = mysqli_query($mysqli, "SELECT COUNT(id) as total_comps FROM patterns");
    foreach ($res as $row) {
        echo $row['total_comps'];
    }
}

function getModels()
{
    global $mysqli;
    $res = mysqli_query($mysqli, "SELECT COUNT(id) as total_model FROM models");
    foreach ($res as $row) {
        echo $row['total_model'];
    }
}



if (isset($_POST['act']) && $_POST['act'] == "adminlogin") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

        $q = "SELECT * FROM admin WHERE email='" . $_POST["email"] . "' AND password='" . encrypt($_POST["password"]) . "'";

        $result = mysqli_query($mysqli, $q);
        if ($result->num_rows === 1) {
            foreach ($result as $rows) {
                // session_start();
                $_SESSION["admin_id"] = $rows["id"];
                $_SESSION["admin_email"] = $rows["email"];
                // $id = $_SESSION["id"];
                // $email = $_SESSION["email"];
            }
            echo "success";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "updateComponent") {
    if (!empty($_POST["com_id"]) && !empty($_POST["com_name"]) && !empty($_POST["com_price"]) && !empty($_POST["table_name"])) {
        $id = $_POST['com_id'];
        $name = $_POST['com_name'];
        $price = $_POST['com_price'];
        $table = $_POST['table_name'];

        // print_r($_POST);
        // exit;

        $q = "UPDATE $table SET name='" . $name . "', price='" . $price . "' WHERE id='" . $id . "' ";

        $res = mysqli_query($mysqli, $q);
        if ($res) echo "success";
        else echo "error";
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "updateAdminInfo") {
    if (!empty($_POST["prof_id"]) && !empty($_POST["prof_name"]) && !empty($_POST["prof_email"])) {
        // && !empty($_POST["prof_op"]) && !empty($_POST["prof_np"])) {
        $id = $_POST['prof_id'];
        $name = $_POST['prof_name'];
        $email = $_POST['prof_email'];
        // $op = $_POST['prof_op'];
        // $np = $_POST['prof_np'];

        // print_r($_POST);
        // exit;

        $q = "UPDATE `admin` SET name='" . $name . "', email='" . $email . "' WHERE id='" . $id . "' ";

        $res = mysqli_query($mysqli, $q);
        if ($res) echo "success";
        else echo "error";
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "adminlogout") {

    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_email"]);
    // $destroyed = session_destroy();

    // if ($destroyed) echo "success";
    if (empty($_SESSION['admin_id']) && empty($_SESSION['admin_email'])) echo "success";
    else echo "error";
} elseif (isset($_POST['act']) && $_POST['act'] == "deleteComponent") {
    $id = $_POST['delete_id'];
    $table = $_POST['table_name'];
    // print_r($_POST);
    // exit;
    $res = mysqli_query($mysqli, "DELETE FROM $table WHERE id=$id");
    if ($res) {
        echo "success";
    } else {
        echo "error";
    }
}



// UPLOADING HOUSE COMPONENTS HANDLING
if (isset($_FILES) && !empty($_FILES)) {
    if ($_GET['act'] == "addRoofTexture") {
        $valid_extensions = array('png', 'jpg', 'jpeg');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;


        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['textureImg']['name'], PATHINFO_EXTENSION));


        // check's valid format 
        if (in_array($ext, $valid_extensions) && !empty($_POST['textureName']) && !empty($_POST['texturePrice']) && !empty($_POST['textureType'])) {

            $textureImg = pathinfo($_FILES['textureImg']['name']);

            $textureName = $_POST['textureName'];
            $textureType = $_POST['textureType'];
            $texturePrice = $_POST['texturePrice'];

            // counting files in folder
            $i = countFiles("../assets/walls&roof");
            // giving desired name to file 
            $texture =  ++$i . "." . $ext;


            $q = "INSERT INTO patterns(name,url,price,part_type)
                VALUES('" . $texture . "','./assets/walls&roof/" . $texture . "','" . $texturePrice . "','" . $textureType . "' )";
            // echo $q;  exit;
            $res = mysqli_query($mysqli, $q);

            //Move uploaded file to a nice directory
            $targetPath = "../assets/walls&roof/" . basename($texture);
            $saved = move_uploaded_file($_FILES['textureImg']['tmp_name'], $targetPath);
            if ($saved && $res) {
                echo '{ "result" : "Uploaded", "status":"200" }';
            }
        } else {
            echo '{ "result" : "Error" }';
        }
    } elseif ($_GET['act'] == "addWallTexture") {
        $valid_extensions = array('png', 'jpg', 'jpeg');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;


        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['textureImg']['name'], PATHINFO_EXTENSION));


        // check's valid format 
        if (in_array($ext, $valid_extensions) && !empty($_POST['textureName']) && !empty($_POST['texturePrice']) && !empty($_POST['textureType'])) {

            $textureImg = pathinfo($_FILES['textureImg']['name']);

            $textureName = $_POST['textureName'];
            $textureType = $_POST['textureType'];
            $texturePrice = $_POST['texturePrice'];

            // counting files in folder
            $i = countFiles("../assets/walls&roof");
            // giving desired name to file 
            $texture =  ++$i . "." . $ext;


            $q = "INSERT INTO patterns(name,url,price,part_type)
                VALUES('" . $texture . "','./assets/walls&roof/" . $texture . "','" . $texturePrice . "','" . $textureType . "' )";
            // echo $q;  exit;
            $res = mysqli_query($mysqli, $q);

            //Move uploaded file to a nice directory
            $targetPath = "../assets/walls&roof/" . basename($texture);
            $saved = move_uploaded_file($_FILES['textureImg']['tmp_name'], $targetPath);
            if ($saved && $res) {
                echo '{ "result" : "Uploaded", "status":"200" }';
            }
        } else {
            echo '{ "result" : "Error" }';
        }
    } elseif ($_GET['act'] == "addFloorTexture") {
        $valid_extensions = array('png', 'jpg', 'jpeg');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;


        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['textureImg']['name'], PATHINFO_EXTENSION));


        // check's valid format 
        if (in_array($ext, $valid_extensions) && !empty($_POST['textureName']) && !empty($_POST['texturePrice']) && !empty($_POST['textureType'])) {

            $textureImg = pathinfo($_FILES['textureImg']['name']);

            $textureName = $_POST['textureName'];
            $textureType = $_POST['textureType'];
            $texturePrice = $_POST['texturePrice'];

            // counting files in folder
            $i = countFiles("../assets/floor");
            // giving desired name to file 
            $texture =  ++$i . "." . $ext;


            $q = "INSERT INTO patterns(name,url,price,part_type)
                VALUES('" . $texture . "','./assets/floor/" . $texture . "','" . $texturePrice . "','" . $textureType . "' )";
            // echo $q;  exit;
            $res = mysqli_query($mysqli, $q);

            //Move uploaded file to a nice directory
            $targetPath = "../assets/floor/" . basename($texture);
            $saved = move_uploaded_file($_FILES['textureImg']['tmp_name'], $targetPath);
            if ($saved && $res) {
                echo '{ "result" : "Uploaded", "status":"200" }';
            }
        } else {
            echo '{ "result" : "Error" }';
        }
    }
    // elseif ($_GET['act'] == "uploadWomenCase") {
    //     $valid_extensions = array('png', 'jpg', 'jpeg');
    //     // valid extensions
    //     // print_r($_FILES);
    //     // print_r($_POST);
    //     // exit;


    //     // get uploaded file's extension
    //     $ext = strtolower(pathinfo($_FILES['textureImg']['name'], PATHINFO_EXTENSION));


    //     // check's valid format 
    //     if (in_array($ext, $valid_extensions) && !empty($_POST['textureName']) && !empty($_POST['texturePrice']) && !empty($_POST['textureType'])) {

    //         $textureImg = pathinfo($_FILES['textureImg']['name']);

    //         $textureName = $_POST['textureName'];
    //         $textureType = $_POST['textureType'];
    //         $texturePrice = $_POST['texturePrice'];

    //         // counting files in folder
    //         $i = countFiles("../assets/walls&roof");
    //         // giving desired name to file 
    //         $texture =  ++$i . "." . $ext;


    //         $q = "INSERT INTO patterns(name,url,price,part_type)
    //             VALUES('" . $texture . "','./assets/walls&roof/" . $texture . "','" . $texturePrice . "','" . $textureType . "' )";
    //         // echo $q;  exit;
    //         $res = mysqli_query($mysqli, $q);

    //         //Move uploaded file to a nice directory
    //         $targetPath = "../assets/walls&roof/" . basename($texture);
    //         $saved = move_uploaded_file($_FILES['textureImg']['tmp_name'], $targetPath);
    //         if ($saved && $res) {
    //             echo '{ "result" : "Uploaded", "status":"200" }';
    //         }
    //     } else {
    //         echo '{ "result" : "Error" }';
    //     }
    // }
    //  elseif ($_GET['act'] == "uploadDiamondBezel") {

    //     $valid_extensions = array('png');
    //     // valid extensions
    //     // print_r($_FILES);

    //     // get uploaded file's extension
    //     $ext = strtolower(pathinfo($_FILES['DiamondBezel']['name'], PATHINFO_EXTENSION));

    //     // checking file with same exists???
    //     if (in_array($_FILES['DiamondBezel']['name'], getFileNames("./data/Diamond Bezel/"))) {
    //         echo '{ "result" : "Error" }';
    //     } else {
    //         // check's valid format
    //         if (in_array($ext, $valid_extensions)) {

    //             // $DiamondBezel = pathinfo($_FILES['DiamondBezel']['name']);

    //             // counting files in folder
    //             // $i = countFiles("./data/Diamond Bezel");
    //             // giving desired name to file 
    //             // $DiamondBezel =  ++$i . "." . $ext;
    //             $DiamondBezel = strtolower($_FILES['DiamondBezel']['name']);
    //             $name = substr($DiamondBezel, 0, strpos($DiamondBezel, ".png"));

    //             $watchId = $_POST['watch'];

    //             if (empty($_POST['color']))
    //                 $color = $_POST['newColor'];
    //             else if (empty($_POST['newColor']))
    //                 $color = $_POST['color'];

    //             $q = "INSERT INTO Diamond_bezel(name,url,color,watch_id)
    //             VALUES('" . $name . "','./data/Diamond Bezel/" . $DiamondBezel . "', '" . $color . "', '" . $watch_id . "')";
    //             $res = mysqli_query($mysqli, $q);


    //             //Move uploaded file to a nice directory
    //             $targetPath = "./data/Diamond Bezel/" . basename($DiamondBezel);
    //             $saved = move_uploaded_file($_FILES['DiamondBezel']['tmp_name'], $targetPath);
    //             if ($saved && $res) {
    //                 echo '{ "result" : "Uploaded", "status":"200" }';
    //             }
    //         } else {
    //             echo '{ "result" : "Error" }';
    //         }
    //     }
    // } elseif ($_GET['act'] == "uploadFace") {

    //     $valid_extensions = array('png');
    //     // valid extensions
    //     // print_r($_FILES);

    //     // get uploaded file's extension
    //     $ext = strtolower(pathinfo($_FILES['Face']['name'], PATHINFO_EXTENSION));

    //     // checking file with same exists???
    //     if (in_array($_FILES['Face']['name'], getFileNames("./data/Face/"))) {
    //         echo '{ "result" : "Error" }';
    //     } else {
    //         // check's valid format
    //         if (in_array($ext, $valid_extensions)) {

    //             // $Face = pathinfo($_FILES['Face']['name']);

    //             // counting files in folder
    //             // $i = countFiles("./data/Face");
    //             // giving desired name to file 
    //             // $Face =  ++$i . "." . $ext;
    //             $Face = strtolower($_FILES['Face']['name']);
    //             $name = substr($Face, 0, strpos($Face, ".png"));

    //             $watchId = $_POST['watch'];

    //             if (empty($_POST['color']))
    //                 $color = $_POST['newColor'];
    //             else if (empty($_POST['newColor']))
    //                 $color = $_POST['color'];

    //             $q = "INSERT INTO face(name,url,color,watch_id)
    //             VALUES('" . $name . "','./data/Face/" . $Face . "','" . $color . "','" . $watch_id . "')";
    //             $res = mysqli_query($mysqli, $q);


    //             //Move uploaded file to a nice directory
    //             $targetPath = "./data/Face/" . basename($Face);
    //             $saved = move_uploaded_file($_FILES['Face']['tmp_name'], $targetPath);
    //             if ($saved && $res) {
    //                 echo '{ "result" : "Uploaded", "status":"200" }';
    //             }
    //         } else {
    //             echo '{ "result" : "Error" }';
    //         }
    //     }
    // }
}


//  elseif ($_GET['act'] == "uploadHour") {

//     $valid_extensions = array('png');
//     // valid extensions
//     // print_r($_FILES);

//     // get uploaded file's extension
//     $ext = strtolower(pathinfo($_FILES['Hour']['name'], PATHINFO_EXTENSION));

//     // checking file with same exists???
//     if (in_array($_FILES['Hour']['name'], getFileNames("./data/Hour hand/"))) {
//         echo '{ "result" : "Error" }';
//     } else {
//         // check's valid format
//         if (in_array($ext, $valid_extensions)) {

//             // $Hour = pathinfo($_FILES['Hour']['name']);

//             // counting files in folder
//             // $i = countFiles("./data/Hour hand");
//             // giving desired name to file 
//             // $Hour =  ++$i . "." . $ext;
//             $Hour = strtolower($_FILES['Hour']['name']);
//             $name = substr($Hour, 0, strpos($Hour, ".png"));

//             $q = "INSERT INTO hour(name,url)
//             VALUES('" . $name . "','./data/Hour hand/" . $Hour . "')";
//             $res = mysqli_query($mysqli, $q);

//             //Move uploaded file to a nice directory
//             $targetPath = "./data/Hour hand/" . basename($Hour);
//             $saved = move_uploaded_file($_FILES['Hour']['tmp_name'], $targetPath);
//             if ($saved && $res) {
//                 echo '{ "result" : "Uploaded", "status":"200" }';
//             }
//         } else {
//             echo '{ "result" : "Error" }';
//         }
//     }
// } elseif ($_GET['act'] == "uploadMin") {

//     $valid_extensions = array('png');
//     // valid extensions
//     // print_r($_FILES);

//     // get uploaded file's extension
//     $ext = strtolower(pathinfo($_FILES['Min']['name'], PATHINFO_EXTENSION));
//     // checking file with same exists???
//     if (in_array($_FILES['Min']['name'], getFileNames("./data/Min hand/"))) {
//         echo '{ "result" : "Error" }';
//     } else {
//         // check's valid format
//         if (in_array($ext, $valid_extensions)) {

//             // $Min = pathinfo($_FILES['Min']['name']);

//             // counting files in folder
//             // $i = countFiles("./data/Min hand");
//             // giving desired name to file 
//             // $Min =  ++$i . "." . $ext;
//             $Min = strtolower($_FILES['Min']['name']);
//             $name = substr($Min, 0, strpos($Min, ".png"));

//             $q = "INSERT INTO minute(name,url)
//             VALUES('" . $name . "','./data/Min hand/" . $Min . "')";
//             $res = mysqli_query($mysqli, $q);


//             //Move uploaded file to a nice directory
//             $targetPath = "./data/Min hand/" . basename($Min);
//             $saved = move_uploaded_file($_FILES['Min']['tmp_name'], $targetPath);
//             if ($saved && $res) {
//                 echo '{ "result" : "Uploaded", "status":"200" }';
//             }
//         } else {
//             echo '{ "result" : "Error" }';
//         }
//     }
// }




////////////////////////////////////////////////////////////////////////////////
// $count = countFiles('./watch6/Bezel/');
// $names = getFileNames('./watch6/Bezel/');
// // for ($i = 0; $i < $count; $i++) {
// $j = 46;
// for ($i = 1; $i <= $count; $i++) {
//     $q = "INSERT INTO bezel(name,url,watch_id)
//     VALUES('Bezel " . $j . "','./data/Bezel/" . $j . ".png',7);";
//     echo "<br>" . $q . "<br>";
//     // $res = mysqli_query($mysqli, $q);
//     // var_dump($res);
//     // echo   $names[$i]."<br>";
//     $j++;
// }
// exit;


// $c = [
// '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000',
// '#F4CC71','#F2B28F',
// // // '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000','#F4CC71','#F2B28F',
// // // '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000','#F4CC71','#F2B28F',
// ];

// // $count = countFiles('./data/Hour min hand/style 13/hands/');
// // $names = getFileNames('./data/Hour min hand/style 13/hands/');

// $count = countFiles('./data/Second hand/');
// $names = getFileNames('./data/Second hand/');
// // // for ($i = 0; $i < $count; $i++) {
// $j = 1;
// $k = 0;
// for ($i = 1; $i <= $count; $i++) {
//     // $q = "INSERT INTO hands(name,url,color,style_id)
//     //     VALUES('Hands " . $j . "','./data/Hands/" . $j . ".png','" . $c[$k] . "',13);";
//     $q = "INSERT INTO second_hand(name,url,color,style_id)
//     VALUES('Seccond Hand " . $j . "','./data/Second hand/" . $j . ".png','" . $c[$k] . "',8);";
//     // // $q="UPDATE lumi set url='./data/Hand lumi/" . $k . ".png',name='" . $k . "' where id=" . $k . ";" ;
//     // $q="UPDATE second_hand set color='" . $c[$j] . "' where id=" . $i . ";" ;
//     echo "<br>" . $q . "<br>" ; 
//     // $res=mysqli_query($mysqli, $q); 
//     // // var_dump($res); // // echo $names[$i]."<br>";
//     $j++;
//     $k++;
// }
// exit;

// $count = countFiles('./data/new hands/style 7/hands/');
// $names = getFileNames('./data/ rename("./data/new hands/style 7/hands/" . $names[$k], "./data/new hands/style 7/hands/" . $j . ".png");
// $j++;
// $k++;
// }
// exit;



    // $count = countFiles('./data/Case/men/');
    // $names = getFileNames('./data/Case/men/');
    // $count = countFiles('./watch7/case');
    // $names = getFileNames('./watch7/case');
    // $watch_id = 1;
    // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO watchcase(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Case Men','./data/Case/men/" . $names[$i] . "',1);" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo substr($names[$i],0,strpos($names[$i],".png"))."<br>";
        // }
        // exit;

        // $count = countFiles('./data/Case/women/');
        // $names = getFileNames('./data/Case/women/');
        // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO watchcase(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Case Women','./data/Case/women/" . $names[$i] . "',1)" ; // // echo $q."<br>";
            // // $res = mysqli_query($mysqli, $q);
            // // var_dump($res);
            // // echo substr($names[$i],0,strpos($names[$i],".png"))."<br>";
            // }
            // exit;

            // $count = countFiles('./data/Diamond Bezel/');
            // $names = getFileNames('./data/Diamond Bezel/');
            // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO daimond_bezel(name,url)
//     VALUES('Diamond Bezel " . $i . "','./data/Diamond Bezel/" . $i . ".png');" ; // echo "<br>" . $q . "<br>" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                // }

                // $count = countFiles('./data/Face/');
                // $names = getFileNames('./data/Face/');
                // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO face(name,url)
//     VALUES('Face " . $i . "','./data/Face/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                    // }

                    // $count = countFiles('./data/Hand lumi/');
                    // $names = getFileNames('./data/Hand lumi/');
                    // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO lumi(name,url)
//     VALUES('Hand lumi " . $i . "','./data/Hand lumi/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                        // }

                        // $count = countFiles('./data/Hand tip/');
                        // $names = getFileNames('./data/Hand tip/');
                        // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO tip(name,url)
//     VALUES('Hand tip " . $i . "','./data/Hand tip/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                            // }

                            // $count = countFiles('./data/Hour hand/');
                            // $names = getFileNames('./data/Hour hand/');
                            // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO hour(name,url)
//     VALUES('Hour Hand " . $i . "','./data/Hour hand/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                // }

                                // $count = countFiles('./data/Min hand/');
                                // $names = getFileNames('./data/Min hand/');
                                // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO minute(name,url)
//     VALUES('Minute Hand " . $i . "','./data/Min hand/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                    // }

                                    // $count = countFiles('./data/Skull/');
                                    // $names = getFileNames('./data/Skull/');
                                    // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO skull(name,url)
//     VALUES('Skull " . $i . "','./data/Skull/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                        // }

                                        // $count = countFiles('./watch7/Strap/');
                                        // $names = getFileNames('./watch7/Strap/');
                                        // // for ($i = 0; $i < $count; $i++) { // $j=106; // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO strap(name,url,watch_id)
//     VALUES('Strap " . $j . "','./data/Strap/" . $j . ".png',7);" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo $names[$i]."<br>";
                                            // $j++;
                                            // }
                                            // exit;

                                            // $count = countFiles('./watch6/winder/');
                                            // $names = getFileNames('./watch6/winder/');
                                            // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO winder(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Winder','./data/Winder/" . $names[$i] . "',1)" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo $names[$i]."<br>";
                                                // }

                                                // $k = 18;
                                                // for ($i = 2; $i < 19; $i++) { // echo 'UPDATE `winder` SET `id` = ' . $i . ' WHERE `winder`.`id` =' . $k . ";<br>" ; // $k++; // } // exit; // function uploadComponent($ext, $files,$path,$post) // { // global $mysqli; // $valid_extensions=array('png'); // $ext=strtolower(pathinfo($files, PATHINFO_EXTENSION)); // // checking file with same exists??? // if (in_array($files, getFileNames($path))) { // echo '{ "result" : "Error" }' ; // } else { // // check's valid format // if (in_array($ext, $valid_extensions) && !empty($post)) { // $com_name=pathinfo($files); // $watchId=$post; // // counting files in folder // // $i=countFiles("./data/com_name"); // // giving desired name to file // // $com_name=++$i . "." . $ext; // $com_name=strtolower($files); // $name=substr($com_name, 0, strpos($com_name, ".png" )); // $q="INSERT INTO bezel(name,url,watch_id)
//             VALUES('" . $name . "','./data/Bezel/" . $com_name . "','" . $watchId . "' )" ; // $res=mysqli_query($mysqli, $q); // //Move uploaded file to a nice directory // $targetPath=$path . basename($com_name); // $saved=move_uploaded_file($_FILES['Bezel']['tmp_name'], $targetPath); // if ($saved && $res) { // echo '{ "result" : "Uploaded", "status":"200" }' ; // } // } else { // echo '{ "result" : "Error" }' ; // } // } // }