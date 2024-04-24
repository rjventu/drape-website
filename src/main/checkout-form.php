<?php

session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "drape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    $custId = $_SESSION["custId"];
    $order_status = "Pending";

    $checkCustomerSql = "SELECT 1 FROM customer WHERE cust_id = ?";
    $checkCustomerStmt = $conn->prepare($checkCustomerSql);
    $checkCustomerStmt->bind_param("i", $custId);
    $checkCustomerStmt->execute();
    $checkCustomerResult = $checkCustomerStmt->get_result();

    if ($checkCustomerResult->num_rows > 0) {
        $sql = "INSERT INTO order_details (cust_id, order_status, order_fname, order_lname, order_phone, order_address, order_region, order_zip, order_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssss", $custId, $order_status, $firstName, $lastName, $phone, $address, $region, $zipCode, $other);

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
    $conn->close();
    exit;
} else {
    header("Location: checkout.php");
    $conn->close();
    exit;
}

