<?php

$servername = "localhost";
$username = "sunicozx";
$password = "hello123"; 
$dbname = "drape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "ALTER TABLE order_details MODIFY order_status VARCHAR(10) NOT NULL DEFAULT 'Pending'";
if ($conn->query($sql) === TRUE) {
    echo "Column modified successfully";
} else {
    echo "Error modifying column: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $address = $_POST["address"];
    $region = $_POST["region"];
    $zipCode = $_POST["zip-code"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $other = $_POST["other"];
    $custId = 1;

    $checkCustomerSql = "SELECT 1 FROM customer WHERE cust_id = ?";
    $checkCustomerStmt = $conn->prepare($checkCustomerSql);
    $checkCustomerStmt->bind_param("i", $custId);
    $checkCustomerStmt->execute();
    $checkCustomerResult = $checkCustomerStmt->get_result();

    if ($checkCustomerResult->num_rows > 0) {
        $sql = "INSERT INTO order_details (cust_id, order_fname, order_lname, order_phone, order_address, order_region, order_zip, order_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $custId, $firstName, $lastName, $phone, $address, $region, $zipCode, $other);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Customer does not exist";
    }

    $checkCustomerStmt->close();
    $stmt->close();

    header("Location: checkout.php");
    exit;
} else {
    header("Location: checkout.php");
    exit;
}
$conn->close();
?>