<?php

$initialState = $_SERVER['REQUEST_METHOD'] == 'POST';


// $default = "";

include("chat_controller.php");
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="./style.css" />
    <title>Justins Chat App</title>
</head>

<body class="bodyClass">

<img src="./02-800x800.png" class="mainImage"/>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="message" placeholder="My Message For The Wall.....">
        <input type="submit" name="" value="Submit Message" class="button">
        <br>
        <!-- <form action="<?php $_SERVER['chatapp.php'] ?>" method="POST">
            <input type="submit" name="clearHistory" value="Clear Chat History" class="clearButton" />
        </form> -->

    </form>

    <div>
	      	<div>
	           <form action="upload.php" method="post" enctype="multipart/form-data">
				  <div>
				    <!-- <label for="file" class="uploadClass">Select a file to upload</label> -->
				    <input type="file" name="file" class="button">
				    <!-- <p class="uploadClass">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p> -->
				  </div>
				  <input type="submit" value="Upload File" class="button">
				</form>
			</div>
	      </div>
    </div> <!-- /container -->




    <div>
    
    
    	
		




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
	

	<div>
	       <?php 
	       	//scan "uploads" folder and display them accordingly
	       $folder = "uploads";
	       $results = scandir('uploads');
	       foreach ($results as $result) {
	       	if ($result === '.' or $result === '..') continue;
	       
	       	if (is_file($folder . '/' . $result)) {
	       		echo '
	       		<div>
		       		<div>
			       		<img src="'.$folder . '/' . $result.'" alt="..." class="thumbnail">
				       		<div>
				       		<p class="delete"><a href="remove.php?name='.$result.'" role="button">Delete Image</a></p>
			       		</div>
		       		</div>
	       		</div>';
	       	}
	       }
	       ?>
    	</div>
</body>

</html>