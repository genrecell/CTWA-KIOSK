<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cruzStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Admin Product</h1>
    <br><br>
    <div class="cruzcon">
        <?php
        session_start();
        include "roblesConnection.php";
        
        $roblesprodid = $_GET['roblesprodid'];

        $sql = "SELECT * FROM roblesproducts WHERE roblesprodid = '$roblesprodid'";
        $ressql = mysqli_query($roblesConn, $sql);

        if(mysqli_num_rows($ressql)===1){
            $roblesprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="roblescard">
                        <img src="data:image/jpeg;base64,' . base64_encode($roblesprod['robles_Image']) . '" width="200">
                        <div>
                            <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="roblesprodname" value="'. $roblesprod['robles_ProductName'] .'"disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="roblesunit" value="'. $roblesprod['robles_Unit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="roblespriceunit" value="'. $roblesprod['robles_PriceperUnit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><button class="roblesviewbtn" style="background-color: green" onclick="window.location.href=\'roblesEditProduct.php?roblesprodid='. $roblesprod['roblesprodid'] .'\'">Edit</button></td>
                                    <td><button class="roblesviewbtn" onclick="window.location.href=\'roblesDeleteProduct.php?roblesprodid='. $roblesprod['roblesprodid'] .'\'">Delete</button></td>
                                </tr>
                                <tr>
                                    <td><button class="roblesviewbtn" style="background-color: blue" onclick="window.location.href=\'roblesAdminProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>