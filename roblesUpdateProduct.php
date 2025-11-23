<?php
    session_start();

    include "roblesConnection.php";

    if(isset($_POST['roblesupdatebtn'])){
        $roblesprodid = $_GET['roblesprodid'];
        $roblesprodname = $_POST['roblesprodname'];
        $roblesunit = $_POST['roblesunit'];
        $roblespriceunit = $_POST['roblespriceunit'];
        $query = "UPDATE roblesproducts SET robles_ProductName='$roblesprodname', robles_Unit='$roblesunit', robles_PriceperUnit='$roblespriceunit' WHERE id='$roblesprodid'";

        if(mysqli_query($roblesConn, $query)){
            header("location: roblesViewProduct.php?roblesprodid={$roblesprodid}");
        }
    }

?>