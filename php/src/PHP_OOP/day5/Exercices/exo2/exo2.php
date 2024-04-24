<?php

/* EXERCISE 2

Part 1:

We have a database "forum" with a table called "users" that contains 
the following columns:
id (integer)
username (string)
email (string)
password (string)

Insert a few users inside the base to give you a data sample.

1. Create a PHP class called "User" that will represent a user 
from the database. The class should have properties for each 
column in the "users" table (id & password will be private).
You will make getters for the two private properties.

2. Create a static method in the User class called "getAll" 
that retrieves all the users from the database using PDO and 
fetch them inside the User class.

3. Create a new PHP file called "users.php" that 
will display all the users in a table.

4. In the "users.php" file, use the "User::getAll()" method 
to retrieve all the users from the database and display them in the page.


---


Part 2:

In the same database, create a table called "posts" that 
contains the following columns:
id (integer)
title (string)
content (longtext)
user_id (integer)(reference to 'users' table)

1. Create a PHP class called "Post" that will represent 
a post from the database. The class should have properties 
for each column in the "posts" table.
'id' and 'user_id' should only be accessible through their respective getter methods.

2. Create a static method in the Post class called "createPost" 
that inserts a new post into the database using PDO.
The method should take the title, content of the post and user_id
as arguments.

3. In the "createPost" method, use exceptions to handle any 
errors that may occur during the insertion of the new post.
For example, if one of the arguments is missing, throw an 
exception with the appropriate error message.

4. Create a new PHP file called "new-post.php" that will 
display a form for creating a new post.

5. In the "new-post.php" file, use the "Post::createPost" 
method to insert a new post into the database when the 
form is submitted. If any errors occur during the insertion,
catch the exceptions and display the error message to the user.

BONUS. In the "new-post.php" file, display all the posts 
that currently are inside the "posts" table under the 
insertion form. For this you will need to create a new 
static method called "getPosts" inside the "Post" class.
This new method should fetch all the posts from the 
database and return them as JSON content.

BONUS 2. Now add a createPost method to the User class. This method should reference "Post:createPost"
but use the id of the user object which the method is called from.
Then make the necessary changes in the new-post.php file to use this new method instead of "Post::createPost".

*/
