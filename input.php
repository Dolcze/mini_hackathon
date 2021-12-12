<?php
include_once("header.php");

session_start();
if (! isset($_SESSION["img_decoded"])) {
    die("You need to enter properly");
}

$img_decoded = $_SESSION["img_decoded"];

echo "<p> Podaj informacje na temat $img_decoded</p>";
?>


<form action="inc/upload_info.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" accept="text" name="img_info" id="img_info">

    <input type="radio" id="mieszane" name="bin_type" value="0">
    <label for="mieszane">Mieszane</label><br>

    <input type="radio" id="plastik_metal" name="bin_type" value="1">
    <label for="plastik_metal">plastik_metal</label><br>

    <input type="radio" id="papier" name="bin_type" value="2">
    <label for="papier">papier</label>

    <input type="radio" id="szkło" name="bin_type" value="3">
    <label for="szkło">szkło</label>


    <input type="submit" name="submit" value="submit">

</form>

<?php
include_once("footer.php");
?>