<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
    </head>
<body>
    <h1>Edit Product</h1>
    <br><br>
    <div class="roblescon">
        <?php
        session_start();
        include "roblesConnection.php";
        
        $roblesprodid = $_GET['roblesprodid'];

        $sql = "SELECT * FROM roblesproducts WHERE id = '$roblesprodid'";
        $ressql = mysqli_query($roblesConn, $sql);

        if(mysqli_num_rows($ressql)===1){
            $roblesprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="roblescard">
                        <img src="data:image/jpeg;base64,' . base64_encode($roblesprod['robles_Image']) . '" width="200">
                        <div>
                            <form action="roblesUpdateProduct.php?roblesprodid='. $roblesprod['id'] .'" method="post">
                                <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="roblesprodname" value="'. $roblesprod['robles_ProductName'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="roblesunit" value="'. $roblesprod['robles_Unit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="roblespriceunit" value="'. $roblesprod['robles_PriceperUnit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><button class="roblesviewbtn" name="roblesupdatebtn" type="submit" style="background-color: green">Update</button></td>
                                    <td><button class="roblesviewbtn" style="background-color: blue" onclick="window.location.href=\'roblesAdminProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>