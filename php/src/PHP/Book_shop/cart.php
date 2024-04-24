<?
session_start();

if(isset($_POST['btn']))
{
    if($_POST['quantity'] <= 0)
    {
        header('Location: removeBook.php?name='.$_POST['bookName']);
    }
    foreach($_SESSION['cart'] as $key => $bookInCart)
    {
        if($bookInCart['name'] == $_POST['bookName']){
            $_SESSION['cart'][$key]['count'] = $_POST['quantity'];
        }
    }
    
}

$totalPrice = 0;

if (isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $bookInCart)
    {
        $totalPrice += $bookInCart['price'] * $bookInCart['count'];
    }
}



require 'nav.php';
?>

<h1>Cart</h1>
<?php if($totalPrice == 0) : ?>
    <p>Your cart is empty</p>
<? endif; ?>

<?php if(isset($_SESSION['cart'])) : ?>
    <?php if(count($_SESSION['cart']) > 0) : ?>
        <a href="remove-cart.php">Empty cart</a>
    <?php endif; ?>
    <?php foreach($_SESSION['cart'] as $bookInCart): ?>
        <p><?=$bookInCart['name'] ?></p>
        <p><?=$bookInCart['price']?> €</p>
        <form method="POST">
            <input type="number" value="<?=$bookInCart['count']?>" name="quantity">
            <input type="hidden" name="bookName" value="<?=$bookInCart['name']?>">
            <input type="submit" value="Change quantity" name="btn">
        </form>
        <a href="removeBook.php?name=<?=$bookInCart['name']?>">Remove item</a>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>
<h2>Your total is <?= $totalPrice ?>€</h2>