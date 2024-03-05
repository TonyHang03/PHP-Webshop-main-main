<?php 
$title= "Greetings";
include_once "PHP_Structure/header.php";
?>
<body>
    <div class="container">
        <?php 
            // Start the session 
            session_start(); 
        
            // Retrieve the customer name from the session variable 
            if (isset($_SESSION['user_data']))
            { 
                $user = $_SESSION['user_data']; 
                $customerName = $user['firstname']; 
            }
            else
            { 
                $customerName = "Customer"; 
            } 
        
            // Display the thank you message 
            echo "<h1>Thank You, $customerName!</h1>"; 
            echo "<p>Your order has been received and will be delivered soon.</p>"; 

            echo "<div>
                    <p><a href='offers.php'>Back to Home</p>
                 </div>";
        ?> 
    </div>
<?php
include_once "PHP_Structure/footer.php";
?>