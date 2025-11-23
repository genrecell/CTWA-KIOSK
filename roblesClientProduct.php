<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Available Products</h1>
    <br><br>
    <div class="roblescon">
        <?php
        session_start();
        include "roblesConnection.php";

        $sql = "SELECT * FROM roblesproducts";
        $ressql = mysqli_query($roblesConn, $sql);

        if(mysqli_num_rows($ressql)>0){
            while($roblesprod = mysqli_fetch_assoc($ressql)){
                echo '
                    <div class="roblescard">
                        <img src="data:image/jpeg;base64,' . base64_encode($roblesprod['robles_Image']) . '" width="200">
                        <h5><p>' . $roblesprod['robles_ProductName'] . '</p></h5>
                        <button class="roblesviewbtn" onclick="window.location.href=\'roblesBuyProduct.php?roblesprodid='. $roblesprod['roblesprodid'] .'\'">Buy</button>
                    </div>
                ';
            }
        }
    ?>
    </div>
</body>
</html>