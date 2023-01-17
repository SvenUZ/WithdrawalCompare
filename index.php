<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fees";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_query_kraken = "SELECT Coin, Fees FROM kraken";
$result_kraken = mysqli_query($conn, $sql_query_kraken);

$sql_query_bitpanda = "SELECT Coin, Fee FROM bitpanda";
$result_bitpanda = mysqli_query($conn, $sql_query_bitpanda);
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        WithdrawalCompare
    </title>
    <style><?php include 'style.css'; ?></style>
</head>

<body>
    <h2>
        Kraken / Bitpanda
    </h2>
    <table style="float: left">
        <thead>
            <tr>
                <th>Coin</th>
                <th>Fees</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result_kraken) > 0){?>
                <?php while($row = mysqli_fetch_assoc($result_kraken)) { ?>
                    <tr>
                        <td><?php echo $row["Coin"] ?></td>
                        <td><?php echo $row["Fees"] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <table style="float: left">
        <thead>
            <tr>
                <th>Coin</th>
                <th>Fees</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result_bitpanda) > 0){?>
                <?php while($row = mysqli_fetch_assoc($result_bitpanda)) { ?>
                    <tr>
                        <td><?php echo $row["Coin"] ?></td>
                        <td><?php echo $row["Fee"] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>