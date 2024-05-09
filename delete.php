<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database1234";

$conn = new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM entry_details WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "ID is missing.";
    }
}

$conn->close();
?>
