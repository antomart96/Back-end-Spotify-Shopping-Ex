<?php
session_start();
if(isset($_SESSION['cart']))
{
    if(isset($_GET['name'])){
        foreach($_SESSION['cart'] as $key => $bookInCart)
        {
            if($bookInCart['name'] == $_GET['name']){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}
header('Location: cart.php');