<?php

$initialState = $_SERVER['REQUEST_METHOD'] == 'POST';


$default = "";

include("chat_controller.php");
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="./style.css" />
    <title>Justins Chat App</title>
</head>

<body className="bodyClass">

<img src="./02-800x800.png" class="mainImage"/>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="message" value=<?php echo ($default);  ?>>
        <input type="submit" name="" value="Submit" class="button">
        <br>
        <form action="<?php $_SERVER['chatapp.php'] ?>" method="POST">
            <input type="submit" name="clearHistory" value="Clear History" class="button" />
        </form>

    </form>
    <div class="chatBox" >
        <?php
        echo "<br>";
        $result = $history_of_messages;
        if ($result) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["messages"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>

</html>