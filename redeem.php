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
element {

    --newtab-search-icon: url(blob:null/f51c32d7-231b-4beb-9373-e0c7628fc1a1);

}
body {

    background-color: var(--newtab-background-color);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Ubuntu', 'Helvetica Neue', sans-serif;
    font-size: 16px;
    overflow-y: scroll;

}
body, #root {

    min-height: 100vh;

}
body {

    --newtab-background-color: #F9F9FA;
    --newtab-border-primary-color: #B1B1B3;
    --newtab-border-secondary-color: #D7D7DB;
    --newtab-button-primary-color: #0060DF;
    --newtab-button-secondary-color: inherit;
    --newtab-element-active-color: rgba(215, 215, 219, 0.6);
    --newtab-element-hover-color: #EDEDF0;
    --newtab-icon-primary-color: rgba(12, 12, 13, 0.8);
    --newtab-icon-secondary-color: rgba(12, 12, 13, 0.6);
    --newtab-icon-tertiary-color: #D7D7DB;
    --newtab-inner-box-shadow-color: rgba(0, 0, 0, 0.1);
    --newtab-link-primary-color: #0060DF;
    --newtab-link-secondary-color: #008EA4;
    --newtab-text-conditional-color: #4A4A4F;
    --newtab-text-primary-color: #0C0C0D;
    --newtab-text-secondary-color: #737373;
    --newtab-textbox-background-color: #FFF;
    --newtab-textbox-border: rgba(12, 12, 13, 0.2);
    --newtab-textbox-focus-color: #0060DF;
    --newtab-textbox-focus-boxshadow: 0 0 0 1px #0060DF, 0 0 0 4px rgba(0, 96, 223, 0.3);
    --newtab-contextmenu-background-color: #F9F9FA;
    --newtab-contextmenu-button-color: #FFF;
    --newtab-modal-color: #FFF;
    --newtab-overlay-color: rgba(237, 237, 240, 0.8);
    --newtab-section-header-text-color: #737373;
    --newtab-section-navigation-text-color: #737373;
    --newtab-section-active-contextmenu-color: #0C0C0D;
    --newtab-search-border-color: transparent;
    --newtab-search-dropdown-color: #FFF;
    --newtab-search-dropdown-header-color: #F9F9FA;
    --newtab-search-header-background-color: rgba(249, 249, 250, 0.95);
    --newtab-search-icon-color: rgba(12, 12, 13, 0.4);
    --newtab-topsites-background-color: #FFF;
    --newtab-topsites-icon-shadow: inset 0 0 0 1px var(--newtab-inner-box-shadow-color);
    --newtab-topsites-label-color: inherit;
    --newtab-card-active-outline-color: #D7D7DB;
    --newtab-card-background-color: #FFF;
    --newtab-card-hairline-color: rgba(0, 0, 0, 0.1);
    --newtab-card-shadow: 0 1px 4px 0 rgba(12, 12, 13, 0.1);
    --newtab-snippets-background-color: #FFF;
    --newtab-snippets-hairline-color: transparent;

}
body {

    margin: 0;

}
*, ::before, ::after {

    box-sizing: inherit;

}
background-color: rgb(249, 249, 250);
box-sizing: border-box;
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Ubuntu", "Helvetica Neue", sans-serif;
font-size: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
min-height: 322px;
overflow-y: scroll;

  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="css/materialize.css">
<script src="js/materialize.min.js"></script>
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
                    <a href="#" >Cancel</a>
                    <button type="submit" >Redeem</button>
                </form>
		</div>
		</div>
		</div>
		</div>
	</div>
</body>
