<?php 
$title = "Products";
include_once "PHP_Structure/header.php";
require "PHP_Controller/productController.php";

    $products = getProducts();

?>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <a href="edit_product.php?productid=<?php echo $product['productid']; ?>">Bearbeiten</a> |
                    <a href="delete_product.php?delete=<?php echo $product['productid']; ?>">Löschen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
<?php
include_once "PHP_Structure/footer.php";
?>