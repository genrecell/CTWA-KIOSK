<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Add Product</h1>
    <br><br>
    <div class="roblescon">
        <div class="roblescard">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan='2'><input type="file" name="img" style="padding: 5px; font-size: 15px;"></td>
                        </tr>
                        <tr>
                            <td><p>Product Name: </p></td>
                            <td><input type="text" name="roblesprodname" required></td>
                        </tr>
                        <tr>
                            <td><p>Unit: </p></td>
                            <td><input type="text" name="roblesunit" required></td>
                        </tr>
                        <tr>
                            <td><p>Price per Unit: </p></td>
                            <td><input type="text" name="roblespriceunit" required></td>
                        </tr>
                        <tr>
                            <td><button class="roblesviewbtn" name="roblesaddbtn" type="submit" style="background-color: green">Add</button></td>
                            <td><button class="roblesviewbtn" style="background-color: blue" onclick="window.location.href='roblesAdminProduct.php'">Cancel</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>

    <?php
        session_start();
        include "roblesConnection.php";

        if (isset($_POST['roblesaddbtn']) && isset($_FILES['img'])) {
            $roblesprodname = $_POST['roblesprodname'];
            $roblesunit = $_POST['roblesunit'];
            $roblespriceunit = $_POST['roblespriceunit'];
            $roblesimage = file_get_contents($_FILES['img']['tmp_name']);

            $stmt = $roblesConn->prepare("INSERT INTO roblesproducts (robles_ProductName, robles_Unit, robles_PriceperUnit, robles_Image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssb", $roblesprodname, $roblesunit, $roblespriceunit, $null);

            $null = NULL;
            $stmt->send_long_data(3, $roblesimage);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Added successfully');
                        setTimeout(() => { window.location.href = 'roblesAddProduct.php'; }, 3000);
                    </script>";
            }
            $stmt->close();
        }

    ?>
</body>
</html>