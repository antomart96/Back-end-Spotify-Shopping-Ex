<?php
session_start();
//pagination default value
$nbPage = 1;

//Fetch page number from GET parameter
if (isset($_GET['page'])) {
    $nbPage = $_GET['page'];
}

//If $nbpage is smaller than 1, set it to 1.
$nbPage = max(1, $nbPage);

//Connect to database.
$db = mysqli_connect('db', 'root', 'root', 'book_shop');

//Query to get all books
if ($db) {
    //Define the query we want to run
    //We want to access the authors names which are held in a seperate authors table
    $query = "SELECT *, books.id as b_id , authors.id as a_id FROM books
              INNER JOIN authors
              ON books.author_id = authors.id
              LIMIT 2
              OFFSET " . ($nbPage - 1) * 2;
    $countQuery = "SELECT COUNT(*) as total FROM books";

    //Run the query
    $result = mysqli_query($db, $query);
    $countResult = mysqli_query($db, $countQuery);
    //Result is an SQL result and not readable by PHP.

    //Fetch the result in a readable format
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $bookCount = mysqli_fetch_assoc($countResult)['total'];

    //Calculate the number of pages
    //ceil() function rounds the result of this division up to its closest integer
    $maxPages = ceil($bookCount / 2);
} else {
    echo "Not connected to the database <br>";
}

if (isset($_POST['addBtn'])) {
    if (!isset($_SESSION['cart'])) {
        //If the cart is empty, initialize it
        $_SESSION['cart'] = [];
    }

    //If it is add it to the cart
    //Check cart for book
    $isBookInCart = false;
    foreach ($_SESSION['cart'] as $key => $bookInCart) {
        //If we already have atleast one of the book in the cart
        if ($bookInCart['name'] == $_POST['book']) {
            //increase the counter

            //We can access the book by its key.
            //Normally we could just use $bookInCart['count']++;
            //But due to the $_SESSION variable being global server side variable
            //We need to access it directly using its key.
            $_SESSION['cart'][$key]['count']++;
            $isBookInCart = true;
        }
    }
    //If the book is not in the cart, add it
    if (!$isBookInCart) {
        $_SESSION['cart'][] = [
            'name' => $_POST['book'],
            'count' => 1,
            'price' => $_POST['price']
        ];
    }
    
}
require 'nav.php';
?>

<h1>Books : </h1>
<!-- Open php foreach to display all the books -->
<?php foreach ($books as $book) : ?>
    <div>
        <!-- This syntax functions as a php echo. Its a shortcut -->
        <h2><?= $book['title'] ?></h2>
        <p><?= $book['name'] ?></p>
        <p><?= $book['price'] ?>€</p>
        <form method="POST">
            <input type="hidden" name="book" value="<?= $book['title'] ?>">
            <input type="hidden" name="price" value="<?= $book['price'] ?>">
            <input type="submit" value="Add to cart" name="addBtn">
        </form>
    </div>
    <hr>
<?php endforeach; ?>

<!-- Define previous and next page buttons -->
<!-- ?page is a get parameter we can access through the $_GET variable -->
<?php if ($nbPage > 1) : ?> <!-- This php syntax allows to write conditions that affect html -->
    <a href="books.php?page=<?= $nbPage - 1 ?>">Previous</a>
<?php endif; ?>
<?php if ($nbPage < $maxPages) : ?>
    <a href="books.php?page=<?= $nbPage + 1 ?>">Next</a>
<?php endif; ?>