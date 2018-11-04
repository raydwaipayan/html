<?php
session_start();
if(!empty($_SESSION['itemlist'])){?>


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
                        <li class="active"><a href="#"><i class="material-icons">shopping_cart</i></a></li>
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
        <div class="container">
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Item</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php for($i = 0 ; $i < count($_SESSION['itemlist']) ; $i++) {?>
                    <tr>
                        <td>
                            <?php echo $i;?>
                        </td>
                        <td>
                            <?php echo $_SESSION['itemlist'][$i]['item'];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['itemlist'][$i]['size'];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['itemlist'][$i]['quantity'];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['itemlist'][$i]['price'];?>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>

            <a href="index.php?remove=remove">Empty Cart</a>
            <?php }else{
  echo "You have no User in SESSION";
 }?>
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