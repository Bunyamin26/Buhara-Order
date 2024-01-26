<?php

$conn = new mysqli('mysql97.unoeuro.com', 'bunyaminerman_dk', 'txDb6BGnaf9g3rAwkc5m', 'bunyaminerman_dk_db_food');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// Fetch data from the Foodoftheday table
$sql = "SELECT id, name, price, picture FROM Foodoftheday";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="bestil">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="order">';
        echo '<img id="picture" src="data:image/jpeg;base64,'.base64_encode($row["picture"]).'" alt="">';
        echo '<div class="price">';
        echo '<h3 id="foodname">'.$row["name"].'</h3>';
        echo '<h4 id="foodprice">'.$row["price"].'</h4>';
        echo '</div>';

        echo '<div class="orderdetails">';
        echo '<label for="">Navn</label>';
        echo '<input id="name" class="input input-alt" placeholder="Indtast venligst dit navn..." type="text">';
        echo '<label for="">Antal</label>';
        echo '<input id="antal" class="input input-alt" placeholder="Vælg venligst antal" type="tel">';
        echo '<label for="">Kommentar til din order</label>';
        echo '<textarea class="input input-alt" name="comment" id="comment" cols="30" rows="10" placeholder="Indtast venligst din kommentar..."></textarea>';
        echo '</div>';

        echo '</div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="menukort">

    </div>
    <form action="">

        <div class="bestil">

           

        </div>
    </form>

</body>

</html>