<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>View Clients</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Password</th>
                <th>Confirmed Password</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "roblesConnection.php";

                $roblessql = "SELECT * FROM roblesregistration WHERE robles_Type = 0";
                $roblesuserres = mysqli_query($roblesConn,$roblessql);

                if(mysqli_num_rows($roblesuserres)>0){
                    while($roblesusers = mysqli_fetch_assoc($roblesuserres)){
                        echo "<tr>
                        <td><p>{$roblesusers['id']}</p></td>
                        <td><p>{$roblesusers['fname']}</p></td>
                        <td><p>{$roblesusers['lname']}</p></td>
                        <td><p>{$roblesusers['email']}</p></td>
                        <td><p>{$roblesusers['uname']}</p></td>
                        <td><p>{$roblesusers['pass']}</p></td>
                        <td><p>{$roblesusers['cpass']}</p></td>
                        <td><p>Client</p></td>";

                    if ($roblesusers['robles_Status'] === '0') {
                        echo "<td><button class='roblesappbtn' onclick=\"window.location.href='roblesApproveClient.php?roblesid=" . $roblesusers['id'] . "'\">Approve</button></td>";
                    } else {
                        echo "<td><p>Approved</p></td>";
                    }

                    echo "</tr>";

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