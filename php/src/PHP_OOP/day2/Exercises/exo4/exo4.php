<?php
/*
    We're going to make the code for a simple online store with different types of products

    part 1 :
        Create an interface called Discountable. This interface should have a method calculateDiscount() that calculates the discount amount for a product.

    part 2 :
        Create an abstract class called Product. It should have the following abstract methods and attributes:
            protected description
            __construct()
            getPrice() to get the price of the product.
            getDescription() to get the description of the product.
    part 3 :
        Create two classes that extend the Product abstract class:
            a. RegularProduct: This class should represent a regular product with a regular price.
            b. PremiumProduct: This class should represent a premium product with a higher price than the regular price.

    part 4 :
        Implement the abstract methods in each of the Product subclasses to return the appropriate price and description for each product. Also set the constructor to handle the new price attributes.

    part 5 :
        Implement the Discountable interface in the PremiumProduct class and calculate a fixed discount of 10% on premium products.
        
    part 6 :
        Create instances of RegularProduct and PremiumProduct and demonstrate getting their prices, descriptions, and applying discounts if applicable.
*/
require_once "RegularProduct.php";
require_once "PremiumProduct.php";


$rPrice = new RegularProduct(500, "ps4");
$pPrice = new PremiumProduct(550, "ps5");



$rPrice->getPrice();
$rPrice->getDescription();

$pPrice->getPrice();
$pPrice->getDescription();
$pPrice->calculateDiscount();