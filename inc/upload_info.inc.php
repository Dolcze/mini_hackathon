<?php
// send info to db
if (! $img_info = $_GET["img_info"]){
    header("location: ../input.php?error=emptyInputImg_info");
    exit();
}
if (! $img_bin_type = $_GET["bin_type"]){
    header("location: ../input.php?error=emptyInputImg_bin_type");
    exit();
}

include_once("db.inc.php");

$sql = "INSERT INTO imgs (img_info,img_bin_type) VALUES (?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../input.php?error=stmtfailed");
    exit();
  }
mysqli_stmt_bind_param($stmt, "ss", $img_info, $img_bin_type);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo "Successfull Download";
sleep(3);

header("location: ../input.php?error=none");
exit();

