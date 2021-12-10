<?php

if (isset($_GET["info"]) && isset($_GET["bin_type"])) {
    // pokaz informacje
    echo $_GET['info'];
    echo $_GET['bin_type'];
    echo $_GET['code'];
}else{
    // wyszedl jakis error
    echo "something went wrong error ALPHA";
};

?>