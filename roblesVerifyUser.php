<?php
    session_start();

    include "roblesConnection.php";

    if(isset($_POST['roblesLogIn'])){
        $roblesuname = $_POST['uname'];
        $roblespass = $_POST['pass'];

        $roblesverifysql =  "SELECT * FROM roblesregistration WHERE uname = '$roblesuname'";

        $roblesverify = mysqli_query($roblesConn,$roblesverifysql);

        if(mysqli_num_rows($roblesverify)===1)
        {
            $roblesuser = mysqli_fetch_assoc($roblesverify);

            $roblesvpass = $roblesuser['pass'];
            $roblesusername = $roblesuser['uname'];
            $roblestype = $roblesuser['robles_Type'];
            $roblesstatus = $roblesuser['robles_Status'];
            $roblesfname = $roblesuser['fname'];
            
            if ($roblespass === $roblesvpass) {

                switch($roblestype){
                    case '0':
                        if($roblesstatus === '1'){

                            $_SESSION['roblesusername']=$roblesusername;
                            echo "<script>
                                alert('Successful Log in. Welcome, Client {$roblesfname}.');

                                parent.frames['nav_column'].location.href = 'roblesClientNav.php';
                                parent.frames['mid_column'].location.href = 'roblesClientProduct.php';
                            </script>";
                        }
                        else{
                            header("Location: roblesLogin.php?message=Your account is still not approved by the admin.");
                            exit(); 
                        }
                        break;
                    case '1':
                        $_SESSION['roblesusername']=$roblesusername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Admin {$roblesfname}.');

                            parent.frames['nav_column'].location.href = 'roblesAdminNav.php';
                            parent.frames['mid_column'].location.href = 'roblesAdminProduct.php';
                        </script>";
                        break;
                    default:
                        header("Location: roblesGuestProduct.php");
                }
                exit();
            }
            else{
                header("Location: roblesLogin.php?message=Incorrect Password");
                exit();
            }
        }
        else{
            header("Location: roblesLogin.php?message=User does not exist");
            exit();
        }
    }
?>