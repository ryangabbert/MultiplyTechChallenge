
<?php
// Open connection to database
require_once 'connector.php';

// $sql = "INSERT INTO Contacts (ContactID, FirstName, LastName, UpgradeEligible, Email)
// VALUES ('1', 'Test', 'Customer', 'Yes', 'john@example.com')";
// $sql = "INSERT INTO Contacts (ContactID, FirstName, LastName, UpgradeEligible, Email)
// VALUES ('2', 'Two', 'Client', 'No', 'tom@example.com')";
// $sql = "INSERT INTO Models (ModelID, ModelName, ModelSpecs, Upgrade)
// VALUES ('1', 'Model1', 'Upgraded', 'No')";
// $sql = "INSERT INTO Models (ModelID, ModelName, ModelSpecs, Upgrade)
// VALUES ('2', 'Model2', 'Upgraded', 'No')";
// $sql = "INSERT INTO Models (ModelID, ModelName, ModelSpecs, Upgrade)
// VALUES ('3', 'Model3', 'Standard', 'No')";
// $sql = "INSERT INTO Models (ModelID, ModelName, ModelSpecs, Upgrade)
// VALUES ('4', 'Model4', 'Standard', 'yes')";
// $sql = "INSERT INTO Slots (SlotID, Date, Time)
// VALUES ('1', '11/11/2018', '1:00 PM')";
// $sql = "INSERT INTO Slots (SlotID, Date, Time)
// VALUES ('2', '11/11/2018', '2:00 PM')";

// $result = mysqli_query($conn, $sql);

if (mysqli_multi_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT ContactID, FirstName, LastName, UpgradeEligible, Email FROM Contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "contact info: " . $row["ContactID"]. "" . $row["FirstName"]. " " . $row["LastName"]. " " . $row["UpgradeEligible"].  " " . $row["Email"]. "<br>";
    }
} else {
    echo "0 results";
}
// Close connection to database
require_once 'disconnector.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
 <p>Please fill in this form and send us.</p>
    <form action="process-form.php" method="post">
        <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName">
        </p>
        <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail">
        </p>
        <p>
            <label for="inputSubject">Subject:</label>
            <input type="text" name="subject" id="inputSubject">
        </p>
        <p>
            <label for="inputComment">Message:<sup>*</sup></label>
            <textarea name="message" id="inputComment" rows="5" cols="30"></textarea>
        </p>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
 -->
