<?php

include("chat_model.php");

$conn = makeConnection();

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $conn = history_AddLine($message, $conn);
} 

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['clearHistory'])) {
    history_Clear($conn);
}

// echo("<pre>");
// print_r($conn);
// echo("</pre>");



$history_of_messages = history_Show($conn);
stopSession($conn);
