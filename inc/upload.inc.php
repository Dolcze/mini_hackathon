<?php

if ($_FILES["fileToUpload"]["size"] != 0){
    require_once "functions.inc.php";
    require_once "db.inc.php";
    $file_name = $_FILES["fileToUpload"]["name"];
} else {
    header("location: ../index.php?error=noImg");
    exit();
};


if ( upload_img() ){
} else {
    header("location: ../index.php?error=imgUploadError");
    exit();
};


$img_decoded =  decode_img($file_name);
if ($img_decoded) {

}else{
    header("location: ../index.php?error=decodeError");
    exit();
};

if ($db_output = find_in_db($img_decoded,$conn)){
    //HERE SHOW OUTPUT FROM DB 0=info 1=bin_type
    $img_info ="<p>$db_output[0]</p>";
    $img_bin_type = "<p>$db_output[1]</p>";

    header("location: ../output.php?info=$img_info&bin_type=$img_bin_type");
    exit();
    
}else{ 
    echo "$db_output";
    //no output form db = no known informations
    echo "Nie mam żadnych informacji na temat tego kodu. Czy chiałbyś je uzupełnić?";
    // HERE CODE FOR INPUTING $img_info and $img_bin_type BY THE USER
};




