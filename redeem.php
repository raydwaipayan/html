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
</head>
<body>
                <h4>Enter redemption code</h4>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                    <div class="input-field">
                        <input id="key" name="key" type="text" class="validate">
                        <label for="key">Redemption Code</label>
                    </div>
                    <div class="divider"></div>
                    <a href="#" >Cancel</a>
                    <button type="submit" >Redeem</button>
                </form>
</body>
