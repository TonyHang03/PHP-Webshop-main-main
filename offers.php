<?php
    session_start();

    //check if button 'add_to_cart' is clicked
    if(isset($_POST['add_to_cart'])) {
        $product_id = $_POST['id_product'];
        $product_quantity = $_POST['product_quantity'];

        //Initialize cart session
        //If it dosen´t not exist then 
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
            header('location:cart.php');
        }

        //Add quantity and product to the cart
        $_SESSION['cart'][$product_id] = $product_quantity;
        header('location: cart.php');
    }
?>

            <!------------------------------------------ PHP END ---------------------------------------->
            <!-------------------------------------- ------------- ---------------------------------------->
            <!----------------------------------------- HTML START ---------------------------------------->

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Cambiare il carello !!!!!!! ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

<?php 
$title = "Offers";
include_once "PHP_Structure/header.php";
?>
<body>
    <header>
        <?php 
            echo "Welcome ";
            // Look if there is the User or the Guest  
            if(isset($_SESSION['user_data']))
            {
                $user = $_SESSION ['user_data']; 
                echo $user['username'];
            }
            else
            {
                echo "Guest";
            }

            // //Test to output user and pw
            // if(isset($username, $password)) 
            // {
            //     $_SESSION["user_data"] = $user($username);
            // }
            // else
            // {
            //     echo "Error !! ";
            // }
        ?> 
        <!-- Other way to display if it is User -->
        <!-- Welcome <?php $user = $_SESSION['user_data']; echo $user['username']; ?> ! -->
    </header>

    <nav> 
        <ul> 
            <li><a href="index.php">Home</a></li> 
            <li><a href="cart.php">Cart</a></li> 
            <li><a href="logout.php">Logout</a></li> 
        </ul> 
    </nav>
    <hr>
    <main>
        <section>
            <h2>Products</h2>
            <ul>
                <li>
                    <h3>Controller for PS</h3>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-judPmekc9UDzUQbukwgkMq6VuuC0bEVVNQ&usqp=CAU" alt="Product1">
                    <p>This Controller have :
                        <li>Scuf</li>
                        <li>Ergonomic Grip</li>
                    </p>
                    <p><span style="color:darkgreen;">200€</span></p>

                    <form method="post" action="offers.php"> 
                        <input type="hidden" name="id_product" value="1"> 
                        <label for="product1_quantity"> Quantity: </label> 
                        <input type="number" id="product1_quantity" name="product_quantity" value="" min="0" max="10"> 
                        <input type="submit" name="add_to_cart" value="Add to Cart"> 
                    </form>
                </li>
                <hr>
                <li>
                    <h3>Controller for Xbox</h3>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXLER9KCISFHchqlUBjWWBzAnkdOX3FhzQoIAGCCYUXWLZf_ZgEmByjE1ZpEia3vgv6Pg&usqp=CAU" alt="Product2">
                    <p>This Controller have :
                        <li>Scuf</li>
                        <li>Ergonomic Grip</li>
                    </p>
                    <p><span style="color:darkgreen;">200€</span></p>

                    <form method="post" action="offers.php"> 
                        <input type="hidden" name="id_product" value="2"> 
                        <label for="product2_quantity"> Quantity: </label> 
                        <input type="number" id="product2_quantity" name="product_quantity" value="" min="0" max="10"> 
                        <button type="submit" name="add_to_cart"> Add to Cart</button> 
                    </form>
                </li>
                <hr>
                <li>
                    <h3>Headset</h3>
                    <img src="https://rayconglobal.com/cdn/shop/files/H20_BLA_Carousel_IMG1_180x.png?v=1697827267" alt="Product3">
                    <p>Headsets have :
                        <li>Wirless</li>
                        <li>Micropfone incorporated</li>
                    </p>
                    <p><span style="color:darkgreen;">100€</span></p>

                    <form method="post" action="offers.php"> 
                        <input type="hidden" name="id_product" value="3"> 
                        <label for="product3_quantity"> Quantity: </label> 
                        <input type="number" id="product3_quantity" name="product_quantity" value="" min="0" max="10"> 
                        <button type="submit" name="add_to_cart"> Add to Cart</button> 
                    </form>
                </li>

                <!-- Add new <li> in the <ul> to create new Products !!!! -->
            </ul>
        </section>

    </main>
<?php
include_once "PHP_Structure/footer.php";
?>