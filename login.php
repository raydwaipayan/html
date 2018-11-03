<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM customers WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4 offset-m3 offset-l4">
                <div class="card white darken-1">
                    <div class="card-content teal-text">
                        <span class="card-title">Sign in to Instruo</span>
                        <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="input-field col s12 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                    <i class="material-icons prefix">email</i>
                                    <input placeholder="someone@example.com" name="email" id="email" type="text" class="validate"
                                        value="<?php echo $email; ?>">
                                    <label for="email">email</label>
                                    <span class="help-block">
                                        <?php echo $email_err; ?></span>
                                </div>
                                <div class="input-field col s12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="password" type="password" name="password" class="validate" value="<?php echo $password; ?>">
                                    <label for="password">Password</label>
                                    <span class="help-block">
                                        <?php echo $password_err; ?></span>
                                </div>
                            </div>
				<div class="row">
                            <div class="col s4 offset-s4">
                                <button class="btn waves-effect waves-light" type="submit" value="Login">Login</button>
                            </div></div>
				<div class="divider"></div>
                            <p>Don't have an account? <a href="register.php">Signup Now</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
