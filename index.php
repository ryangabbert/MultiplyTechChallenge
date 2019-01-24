
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mailing Addresses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv_UqEqxjXpGsPe8MQDn8tMLm9qcgHdUo&libraries=places"></script>
    <style>
        #body {
            position: relative;
            left: 25em;
            border: 1px solid #000090;
            background-color: #f0f0ff;
            width: 25em;
        }
     </style>
</head>
<body id="body">
    <h3>List of Addresses:</h3>
<?php
require_once 'connector.php';

$stmt = $conn->prepare("INSERT INTO MyAddresses (mailingaddress, street, city, state, zip, country) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $mailingAddress, $street, $city, $state, $zip, $country);

$mailingAddress = $_POST['mailingaddress'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$stmt->execute();



$stmt->close();

$sql = "SELECT mailingaddress, street, city, state, zip, country FROM MyAddresses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["mailingaddress"] . $row["street"]. "   " . $row["city"].  "   " . $row["state"].  "   " . $row["zip"].  "   " . $row["country"]."<br>" . "<br>";
    }
} else {
    echo "0 results";
}
?>
</table>
</body>
</html>
<?php

