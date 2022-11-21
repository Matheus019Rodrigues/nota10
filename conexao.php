<?php

try {
    $pdo = new PDO("mysql:dbname=agenda;host=localhost;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error001" . $e->getMessage();
} catch (Exception $e) {
    echo "Error002" . $e->getMessage();
}
