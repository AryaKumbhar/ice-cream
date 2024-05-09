<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database1234";


$conn = new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM entry_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='2'>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Flavour</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["name"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["flavour"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>
                    <form action='update.php' method='post'>
                        <input type='text' name='name' value='".$row["name"]."'>
                        <input type='submit' name='update' value='Update'>
                        <input type='text' name='quantity' value='".$row["quantity"]."'>
                        <input type='submit' name='update' value='Update'>
                        <input type='text' name='flavour' value='".$row["flavour"]."'>
                        <input type='submit' name='update' value='Update'>
                        <input type='text' name='email' value='".$row["email"]."'>
                        <input type='submit' name='update' value='Update'>
                        <input type='text' name='phone' value='".$row["phone"]."'>
                        <input type='submit' name='update' value='Update'>
                    </form>
                    <form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='".$row["id"]."'>
                        <input type='submit' name='delete' value='Delete'>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>