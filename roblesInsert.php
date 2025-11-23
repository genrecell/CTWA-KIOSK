<?php
    session_start();

    include "roblesConnection.php";

    if(isset($_POST['roblesSignUp'])){
        $roblesfname = $_POST['fname'];
        $robleslname = $_POST['lname'];
        $roblesemail = $_POST['email'];
        $roblesuname = $_POST['uname'];
        $roblespass = $_POST['pass'];
        $roblescpass = $_POST['cpass'];
        $_SESSION['roblesres'] = 0;

        if($roblespass === $roblescpass){
            $sql = "INSERT INTO roblesregistration (fname,lname,email,uname,pass,cpass,robles_Type,robles_Status) VALUES ('$roblesfname','$robleslname','$roblesemail','$roblesuname','$roblespass','$roblescpass', 0, 0)";

            $regsql = mysqli_query($roblesConn, $sql);

            $_SESSION['roblesfname'] = $roblesfname;
            $_SESSION['roblesres'] = 1;

            header("location: roblesRegisteroutput.php");

        }
        else{
            $_SESSION['roblesres'] = 0;

            header("location: roblesRegisteroutput.php");
        }
    }
?>