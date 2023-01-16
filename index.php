<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fees";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_query = "SELECT Coin, Fees FROM kraken";
$result = mysqli_query($conn, $sql_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        WithdrawalCompare
    </title>
</head>

<body>
    <h2>
        Kraken
    </h2>
    <p>
        <?php
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo $r = $row["Coin"] . " | " . $row["Fees"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </p>
</body>

</html>