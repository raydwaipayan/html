<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name=$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["name"]))){
      $email_err = "Please enter a name.";
  }
  else{
    $name = trim($_POST["name"]);
  }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM customers WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong in email. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO customers(name, email, password) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);

            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name=$name;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong in inserting. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
   header("location: login.php");
}
?>

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <!--Navigation Bar-->
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li><i class="material-icons">explore</i></li>
                    </ul>
                    <ul class="right">
                        <li><a href="items.html"><i class="material-icons">view_module</i></a></li>
                        <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">account_circle
                                    arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">Sign out</a></li>
    </ul>

    <main>

        <div class="parallax-container">
            <div class="parallax"><img src="images/sample1.jpg"></div>
            <div class="container">
                <div class="row">
                    <div class="col s12 l7 m6"><span class="flow-text">This div is 7-columns wide on pushed to the
                            right by 5-columns.</span></div>
                    <div class="col s12 l5 m6" style="padding-top:40px; padding-bottom:40px">
                        <div class="card white darken-1">
                            <div class="card-content teal-text">
                                <span class="card-title">Sign Up</span>
                                <div class="row">
                                    <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>" method="post"
                                        class="col s12">
                                        <div class="row">
                                            <div class="input-field col s12 <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                                <i class="material-icons prefix">account_box</i>
                                                <input id="name" name="name" class="validate" value="<?php echo $name; ?>"
                                                    type="text">
                                                <label for="name">Name</label>
                                                <span class="help-block">
                                                    <?php echo $name_err; ?></span>
                                            </div>
                                            <div class="input-field col s12 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                                <i class="material-icons prefix">email</i>
                                                <input placeholder="someone@example.com" id="email" type="text" class="validate"
                                                    value="<?php echo $email; ?>">
                                                <label for="email">Email</label>
                                                <span class="help-block">
                                                    <?php echo $email_err; ?></span>
                                            </div>
                                            <div class="input-field col s12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <i class="material-icons prefix">vpn_key</i>
                                                <input id="password" type="password" class="validate" value="<?php echo $password; ?>">
                                                <label for="password">Password</label>
                                                <span class="help-block">
                                                    <?php echo $password_err; ?></span>
                                            </div>
                                            <div class="input-field col s12 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                <i class="material-icons prefix">vpn_key</i>
                                                <input id="password" type="password" class="validate" value="<?php echo $confirm_password; ?>">
                                                <label for="password">Confirm Password</label>
                                                <span class="help-block">
                                                    <?php echo $confirm_password_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col s3 offset-s2">
                                            <button class="btn waves-effect waves-light" type="submit" value="Submit">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                        <div class="col s3 offset-s2">
                                            <button class="btn waves-effect waves-light" type="reset" value="Reset">Reset
                                                <i class="material-icons right">close</i>
                                            </button>
                                        </div>
                                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section white">
            <div class="row container">
                <h2 class="header">Parallax</h2>
                <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or
                    image in this case, is moved at a different speed than the foreground content while scrolling.</p>
            </div>
        </div>
        <div class="container">

        </div>
    </main>


    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                        content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="script.js"></script>
    <script src="js/materialize.min.js"></script>
</body>

</html>
