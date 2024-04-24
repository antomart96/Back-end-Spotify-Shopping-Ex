<?php
/*
    Create a Simple SQL Database:

    Create a new database named user_db.
    Inside the database, create a table named users with the following columns:
        - id (auto-incrementing integer, primary key)
        - name (varchar)
        - email (varchar)
        - age (integer)

    Create a Users class which will represent one entity within the db

    Create a PHP class named UsersTable to handle interactions with the users table in the database.
    The UserTable class should have the following methods:
    The values of these gets should be returned as arrays of Users.
    getAllUsers(): Get all users from the database.
    getUserById($id): Get a user by their ID.
    addUser($name, $email, $age): Add a new user to the database.
    updateUser($id, $name, $email, $age): Update an existing user in the database.
    deleteUser($id): Delete a user from the database by their ID.
    Create API Endpoints:

    Implement the following API endpoints using PHP to interact with the User class in a client.php:
    In the client.php using the $_SERVER['REQUEST_METHOD'] implement the handling of each possible
    https request (GET, POST, UPDATE, DELETE)
    Each of these http requests should call its corresponding method from the usersTable class.

    Test your result using insomnia or postman
