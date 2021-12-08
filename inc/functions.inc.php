<?php

// uploads image in $_FILES["fileToUpload"] to $target_dir = "../uploads/"

function upload_img(){
  $target_dir = "../uploads/";  
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {;
    } else {
        header("location: ../index.php?error=notAnImage");
        exit();;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    $name = $_FILES["fileToUpload"]["name"];
    // FILE NAME HANDLING PROBLEM
    header("location: ../index.php?error=fileExists%name=$name");
    exit();
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 50000000) {
      header("location: ../index.php?error=fileToLarge");
      exit();
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      header("location: ../index.php?error=wrongFormat");
      exit();
  }

  // if everything is ok, try to upload file
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  } else {
    // last check if upload went right
    header("location: ../index.php?error=errorOnUpload");
    exit();
  }
  return True;
}


// chech if python decoded correctly, if output is numbers they yes 
// otherwise it outputs "ERROR"
// pass filename to python script for decoding
// and save filename and decoded to database, image is already on disk
function decode_img($file_name){
  $output = shell_exec("python ../uploads/main.py ../uploads/$file_name 2>&1");
  if (strpos($output, 'ERROR')) {
    return False;
    };
  return (int)$output;
}



function find_in_db($img_decoded,$conn){
  $stmt = mysqli_stmt_init($conn);
  $sql_command_check = "SELECT * FROM imgs WHERE img_decoded = ?;";
  if (!mysqli_stmt_prepare($stmt, $sql_command_check)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  };
  mysqli_stmt_bind_param($stmt, "s", $img_decoded);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($resultData)){
    $img_info = $row["img_info"];
    $img_bin_type = $row["img_bin_type"];
    $img_infoAndBin_type = array($img_info,$img_bin_type);
    return $img_infoAndBin_type;

  }else{
    return False;
  };
};

  




// ----------------------------------------------------------------------------------------------
// ----------------------------------------PLAYGROUND-----------------------------------------------
// ----------------------------------------------------------------------------------------------
  // if (mysqli_stmt_prepare($stmt, $sql_command_check)) {
  //   mysqli_stmt_bind_param($stmt, "s", $img_decoded);
  //   mysqli_stmt_execute($stmt);
  //   $resultData = mysqli_stmt_get_result($stmt);
  //   if ($row = mysqli_fetch_assoc($resultData)){
  //     mysqli_stmt_close($stmt);
  //     return $img_infoAndBin_type ;
  //   };
  // }
  // else {
  //   mysqli_stmt_close($stmt);
  //   return False;
  //   header("location: ../index.php?error=proba");
  //   exit();
//   $sql_insert = "INSERT INTO imgs (img_name,img_decoded) VALUES (?,?);";
//   if (!mysqli_stmt_prepare($stmt, $sql_insert)) {
//     header("location: ../index.php?error=stmtfailed");
//     exit();
//   } else {
//     mysqli_stmt_bind_param($stmt, "ss", $name, $output);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
//   }
// };
//TODO WPISY W DB SIE POWTARZAJA - MECHANIZM ZNAJDYWANIA OUTPUTU W DB ZEBY NIE ROBIC DUPLIKATOW
//MECHANIZM DODAWANIA INFO I BIN_TYPE
// WYPISYWANIE INFO I BIN_TYPE POD SPODEM:

// find info and bin_type in db for decoded

// $sql_check = "SELECT `img_info`,`img_bin_type` FROM `imgs` WHERE `img_decoded` = ? ;";
// $stmt = mysqli_stmt_init($conn);
// if (!mysqli_stmt_prepare($stmt, $sql_check)) {
//   header("location: ../index.php?error=stmtfailed");
//   exit();
// }
// mysqli_stmt_bind_param($stmt, "s", $output);
// mysqli_stmt_execute($stmt);
// $resultData = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_assoc($resultData);
// print_r($row)



