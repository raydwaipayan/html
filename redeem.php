<?php
session_start();
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$key=$key_error="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["key"]))){
      $key_err = "Please enter a key";
  }
  else{
    $key = trim($_POST["key"]);
  }

    // Validate email
    if(empty(trim($_POST["key"]))){
        $key_err = "Please enter a key.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id,key FROM authenticate WHERE key = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_key);

            // Set parameters
            $param_key = trim($_POST["key"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                  
		$message = "Congrats! You are the lucky user!!";
		echo "<script type='text/javascript'>alert('$message');</script>";
                } else{
                     $message = "wrong code";
			echo "<script type='text/javascript'>alert('$message');</script>";
                }
            } else{
                echo "Oops! Something went wrong in email. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
  }
?>


  
  <!DOCTYPE html>
  <html lang="en">
   <head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="css/materialize.css">
<script src="js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col s12 m6 l4 offset-m3 offset-l4">
		<div class="card white">
		<div class="card-content">
         	<span class="card-title">Enter redemption code</span>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                    <div class="input-field">
			<i class="material-icons prefix">card_giftcard</i>
                        <input id="key" name="key" type="text" class="validate">
                        <label for="key">Redemption Code</label>
                    </div>
                    <div class="divider"></div>
                    <a class="btn-floating btn-large waves-effect waves-light red" href="#" ><i class="material-icons">close</i></a>
                    <button class="btn waves-effect waves-light" type="submit" >Redeem</button>
                </form>
		</div>
		</div>
		</div>
		</div>
	</div>
</body>
</html>
