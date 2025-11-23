<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>View Orders</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "roblesConnection.php";

                $roblessql = "SELECT * FROM roblesorders";
                $roblesres = mysqli_query($roblesConn,$roblessql);

                if(mysqli_num_rows($roblesres)>0){
                    while($roblesusers = mysqli_fetch_assoc($roblesres)){
                        echo "<tr>
                        <td><p>{$roblesusers['order_id']}</p></td>
                        <td><p>{$roblesusers['robles_BuyerName']}</p></td>
                        <td><p>{$roblesusers['robles_ProductName']}</p></td>
                        <td><p>{$roblesusers['robles_ProductPrice']}</p></td>
                        <td><p>{$roblesusers['robles_Quantity']}</p></td>
                        <td><p>{$roblesusers['robles_TotalPrice']}</p></td>
                        <td><p>{$roblesusers['robles_Account']}</p></td>
                        </tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='9'>No clients found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>

    <?php
    ?>
</body>
</html>