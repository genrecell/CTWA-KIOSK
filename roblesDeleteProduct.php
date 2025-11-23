<?php
    include "roblesConnection.php";
    session_start();

    $roblesprodid = $_GET['roblesprodid'];

    $sql = "DELETE FROM roblesproducts WHERE roblesprodid = '$roblesprodid'";

    if(mysqli_query($roblesConn, $sql)){
        header("location: roblesAdminProduct.php");
    }
?>