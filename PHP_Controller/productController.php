<?php

// Function for getting Products
function getProducts() {

    $conn = connectDB();

    $sql = "SELECT * FROM products;";
    $result = $conn->query($sql);

    $products = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}