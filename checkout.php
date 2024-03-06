<?php 
$title = "Checkout";
include_once "PHP_Structure/header.php";
?>

       <body>
              <nav>
                     <ul>
                            <li><a href="index.php">Home</a></li> 
                            <li><a href="offers.php">Products</a></li> 
                            <li><a href="riccardomirabito03@gmail.com">Contact Us</a></li> 
                            <li><a href="cart.php">Cart</a></li> 
                     </ul>
              </nav>
       <hr>

       <section> 
       <h1>Checkout</h1> 
       <form action="greetings.php" method="post">

              <h2>Billing Information</h2> 

              <label for="firstname">Name:</label> 
              <input type="text" id="firstname" name="firstname" required>

              <label for="lastname">Surname:</label> 
              <input type="text" id="lastname" name="lastname" required>

              <label for="email">Email:</label> 
              <input type="email" id="email" name="email" required> 

              <label for="address">Address:</label> 
              <input type="text" id="address" name="address" required> 

              <label for="city">City:</label> 
              <input type="text" id="city" name="city" required> 

              <label for="state">State:</label> 
              <input type="text" id="state" name="state" required> 

              <label for="zip">Zip Code:</label> 
              <input type="text" id="zip" name="zip" required> 


              <h2>Payment Information</h2> 

              <label for="cardholder">Name on Card:</label> 
              <input type="text" id="cardholder" name="cardholder" required> 

              <label for="cardnumber">Card Number:</label> 
              <input type="text" id="cardnumber" name="cardnumber" required  
                     pattern="\d{4}-?\d{4}-?\d{4}-?\d{4}" required=> 

              <label for="expmonth">Expiration Month:</label> 
              <input type="text" id="expmonth" name="expmonth" required> 

              <label for="expyear">Expiration Year:</label> 
              <input type="text" id="expyear" name="expyear" required> 

              <label for="cvv">CVV:</label> 
              <input type="text" id="cvv" name="cvv" required> 

              <input type="submit" value="Place Order"> 
       </form> 
       </section> 
<?php
include_once "PHP_Structure/footer.php";
?>