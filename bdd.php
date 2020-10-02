<?php

function connectDB()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "root";
    $db_name = "backend_api";

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function getUser($username)
{
    try {
        $conn = connectDB();
        $q = $conn->prepare('SELECT * FROM users WHERE username = (:username) LIMIT 1;');
        $q->bindParam(':nom', $username);
        $q->execute();
        $result = $q->fetch();
        $conn = null;
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getCar($carName)
{
    try {
        $conn = connectDB();
        $q = $conn->prepare('SELECT * FROM cars WHERE carName = (:carName) LIMIT 1;');
        $q->bindParam(':carName', $carName);
        $q->execute();
        $result = $q->fetch();
        $conn = null;
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getAllCars($username)
{
    try {
        $conn = connectDB();
        $q = $conn->prepare('SELECT * FROM cars WHERE username = (:username);');
        $q->bindParam(':username', $username);
        $q->execute();
        $result = $q->fetch();
        $conn = null;
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
