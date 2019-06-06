<?php
// Starts the session
function makeConnection()
{

  // variables for mysql
  $servername = "localhost";
  $username = "u910989898_root";
  $password = "Thedrunkfox67";
  $dbname = "u910989898_chata";

  // Create connection  ***$CONN VARIABLE IS USED ALL THROUGH THE PROGRAMM RIGHT NOW
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    // echo "YOU HAVE CONNECTED THROUGH CONNECT FUNCTION";
  }

  return $conn;
}

function history_Clear($conn)
{

  $sql = "TRUNCATE TABLE chatapp";
  echo($sql);
  if ($conn->multi_query($sql) === true) {
    // echo "removed all messages from database";
  }
  return $conn;
}

function history_Show($conn)
{
  $sql = "SELECT `messages` FROM chatapp ORDER by Id DESC";
  $result = $conn->query($sql);
  return $result;
}



function history_AddLine($message, $conn)
{

  $sql = "INSERT INTO chatapp (messages)
    VALUES (\"$message.<br>\");";
  // echo($sql);
  if ($conn->query($sql) === true) {
    $last_id = $conn->insert_id;
    // echo "New record created successfully.";
    // echo "<br>";
    // echo "Last inserted ID is: " . $last_id;
    // echo "<br>";
    // echo "last value was " . $message;
    // echo($sql);
  }
  return $conn;
}

function stopSession($conn)
{
  $conn->close();
  // echo 'you have closed the connection';
}
