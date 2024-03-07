<?php
$title = "Shopping Cart";
include_once "PHP_Structure/header.php";
?>
<body>
    <header>
        <h1>
            <?php
                if(isset($_SESSION['user_data']) && !empty($_SESSION['user_data'])) {
                    $user = $_SESSION['user_data'];
                    echo $user['username'];
                }
                else {
                    echo "Guest";
                }
            ?>
            Shopping Cart
        </h1>
    </header>

    <nav> 
        <ul> 
            <li> 
                <a href="index.php">Home</a> 
            </li> 
            <li> 
                <a href="riccardomirabito03@gmail.com">Contact Us</a> 
            </li> 
            <li> 
                <a href="cart.php">Cart</a> 
            </li> 
        </ul> 
    </nav>
    
    <hr>

    <main>
        <section>
            <table>
                <tr>
                    <th>Product Name </th> 
                    <th>Quantity </th> 
                    <th>Price </th> 
                    <th>Total </th>
                </tr>

                <?php
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
                    {
                
                        //Create connection to DB
                        include './DB_Handle/connectDB.php';

                        $total = 0;

                        //Go trought the products in the cart and display in the talbe
                        foreach($_SESSION['cart'] as $product_id => $quantity)
                        {
                            //prepare statement
                            $sql = "SELECT * FROM products WHERE id_product = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $product_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // $sql = "SELECT * FROM products WHERE id_product = $product_id";
                            // $result = $conn -> query($sql);

                            if($result -> num_rows > 0)
                            {
                                $row = $result -> fetch_assoc();
                                $name = $row["product_name"];
                                $price = $row["price"];
                                $item_total = $quantity * $price;
                                $total += $item_total;


                                echo "<tr>";
                                echo "<td>$name</td>";
                                echo "<td>$quantity</td>";
                                echo "<td>$price</td>";
                                echo "<td>$item_total</td>";
                                echo "</tr>";
                            }
                        }
                        //Display total
                        echo "<tr>";
                        echo "<td colspan='3'> Total: </td>";
                        echo "<td> $total $</td>";
                        echo "</tr>";
                    }
                    else
                    {
                        echo "<tr><td colspan='4'>The Cart is empty.</td></tr>";
                    }

                ?>
            </table>
            <form action="checkout.php" method="post"> 
                <input type="submit" value="Checkout">
            </form>  
             <br>
            <form action="offers.php" method="post"> 
                 <input type="submit" value="Back to Products">
            </form>
            <br>
            <form action="offers.php" method="post"> 
                 <input type="submit" value="Back to Products">
            </form>  

        </section>
    </main>
<?php
include_once "PHP_Structure/footer.php";
?>