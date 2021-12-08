<?php

if (isset($_GET["info"]) && isset($_GET["bin_type"])) {
    echo $_GET['info'];
    echo $_GET['bin_type'];
}else{
    echo "bida";
};

?>