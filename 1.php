<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database1234";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_POST['save'])) {  
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $flavour = $_POST['flavour'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql_query = "INSERT INTO entry_details (name, quantity, flavour, email, phone)
                  VALUES ('$name', '$quantity', '$flavour', '$email', '$phone')";

    if (mysqli_query($conn, $sql_query)) {
        echo "New Details Entry inserted successfully !";
    } else {
        echo "Error: " . $sql_query . "" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
