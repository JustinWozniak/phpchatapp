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




    <div class="container">
    
    	<div class="row">
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
				       		<p><a href="remove.php?name='.$result.'" role="button">Remove</a></p>
			       		</div>
		       		</div>
	       		</div>';
	       	}
	       }
	       ?>
    	</div>
    	
		

	      <div>
	      	<div>
	           <form action="upload.php" method="post" enctype="multipart/form-data">
				  <div>
				    <label for="file" class="uploadClass">Select a file to upload</label>
				    <input type="file" name="file">
				    <p class="uploadClass">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
				  </div>
				  <input type="submit" value="Upload">
				</form>
			</div>
	      </div>
    </div> <!-- /container -->




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