<?php

$conn = new mysqli('mysql97.unoeuro.com', 'bunyaminerman_dk', 'txDb6BGnaf9g3rAwkc5m', 'bunyaminerman_dk_db_food');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mad = $_POST["mad"];
    $price = $_POST["price"];
    $randomID = rand(1000, 9999);


    // Update the database with the selected ingredients
    $sql = "INSERT INTO yemek (foodname, foodprice,ID) VALUES (?, ?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $mad, $price, $randomID);

    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error updating order: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Random ID</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your other CSS links here if needed -->
</head>
<body>

<div class="order">
    <h1>Husk dit nummer!</h1>
    <p>Your random ID is: <strong><?php echo $randomID; ?></strong></p>
</div>

</body>
</html>
