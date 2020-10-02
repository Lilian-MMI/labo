<?php
include "bdd.php";

if (isset($_GET['request'])) {
    $request = $_GET['request'];
}

if ($request == 'adduser') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];

    try {
        $conn = connectDB();
        $q = $conn->prepare("INSERT INTO users (username, password, firstname) VALUES ((:username), (:password), (:firstname)");
        $q->bindParam(':username', $username);
        $q->bindParam(':password', $password);
        $q->bindParam(':firstname', $firstname);
        $q->execute();
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    exit;
}

if ($request == 'updateuser') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];

    try {
        $conn = connectDB();
        $q = $conn->prepare('UPDATE users SET username = (:username), password = (:password), firstname = (:firstname) WHERE usersame = (:username);');
        $q->bindParam(':username', $username);
        $q->bindParam(':password', $password);
        $q->bindParam(':firstname', $firstname);
        $q->execute();
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    exit;
}

if ($request == 'addcar') {
    $carName = $_POST['carName'];
    $garage = $_POST['garage'];

    try {
        $conn = connectDB();
        $q = $conn->prepare("INSERT INTO cars (carName, garage) VALUES ((:carName), (:garage)");
        $q->bindParam(':carName', $carName);
        $q->bindParam(':garage', $garage);
        $q->execute();
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    exit;
}

if ($request == 'updatecar') {
    $carName = $_POST['carName'];
    $garage = $_POST['garage'];
    $id = $_GET['id'];

    try {
        $conn = connectDB();
        $q = $conn->prepare('UPDATE cars SET carName = (:carName), garage = (:garage) WHERE id = (:id);');
        $q->bindParam(':carName', $carName);
        $q->bindParam(':garage', $garage);
        $q->bindParam(':id', $id);
        $q->execute();
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    exit;
}

if ($request == 'deletecar') {
    $carName = $_POST['carName'];

    try {
        $conn = connectDB();
        $q = $conn->prepare('DELETE from cars WHERE carName = (:carName);');
        $q->bindParam(':carName', $carName);
        $q->execute();
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    exit;
}
