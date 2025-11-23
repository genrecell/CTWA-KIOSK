<?php
    session_start();

    include "roblesConnection.php";

    $roblesid = $_GET['roblesid'];

    $updatesql = "UPDATE roblesregistration SET robles_Status = '1' WHERE id = '$roblesid'";

    $res = mysqli_query($roblesConn, $updatesql);

    if($res){
        echo "<script>alert('Approved');</script>";

        sleep(3);

        header("location: roblesViewClients.php");
    }
    else{
        echo "<script>alert('Something went wrong please try again.');</script>";

        sleep(3);

        header("location: roblesViewClients.php");
    }
?>