<?php

//By default we have no books in our cart
$nbBooksInCart=0;

//First we check if we have a cart in our session
if(isset($_SESSION['cart']))
{
    //We count how many books we have in our cart
    foreach($_SESSION['cart'] as $book)
    {
        $nbBooksInCart += $book['count'];
    }
}
?>
<div >
    <div>
    <a href="books.php">Books</a>
    <a href="cart.php">Cart</a>
    </div>
    <div>
    <a href="resetSession.php">Reset Session</a>
    <p>Number of books in cart : <?= $nbBooksInCart ?></p>
    </div>
</div>