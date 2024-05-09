<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database1234";

$conn = new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['update']))
{   
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $flavour = $_POST['flavour'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];



    $sql_query = "UPDATE entry_details SET  name='$name', quantity='$quantity', flavour='$flavour', email='$email', phone='$phone' ";
    if ($conn->query($sql_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>