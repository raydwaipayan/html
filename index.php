<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
                        <li class="active"><a href="items.html"><i class="material-icons">view_module</i></a></li>
                        <li><a href="checkout.html"><i class="material-icons">shopping_cart</i></a></li>
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
            <p class="heading flow-text">T-shirt Gallery</p>
            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts1.jpg">
                            <a data-target="modal1" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts2.jpg">
                            <a data-target="modal2" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts2.jpg">
                            <a data-target="modal3" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts2.jpg">
                            <a data-target="modal4" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts2.jpg">
                            <a data-target="modal5" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/ts2.jpg">
                            <a data-target="modal6" class="btn-floating btn-large modal-trigger halfway-fab waves-effect waves-light teal"><i
                                    class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am
                                convenient
                                because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO Winner T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form action="#">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" checked />
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select>
                                            <option value="1" selected>1</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" />
                                            <span>I want my name on back of T-shirt</span>
                                        </label>
                                    </div>
                                    <div class="col s3">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal2" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
            
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form method="POST" action="addcart.php">
		            <input name="item" value="ts02" readonly/>
                            <input name="price" value="300" readonly/>

                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="size" type="radio" value="S"/>
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="size" type="radio" value="M"/>
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="size" type="radio" checked value="L"/>
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="size" type="radio" value="XL"/>
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select name="quantity" required>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3 offset-s9">
                                        <button class="btn waves-effect waves-light" type="submit" name="submit">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal3" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO Winner T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form action="#">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" checked />
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" />
                                            <span>I want my name on back of T-shirt</span>
                                        </label>
                                    </div>
                                    <div class="col s3">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal4" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO Winner T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form action="#">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" checked />
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" />
                                            <span>I want my name on back of T-shirt</span>
                                        </label>
                                    </div>
                                    <div class="col s3">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal5" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO Winner T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form action="#">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" checked />
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" />
                                            <span>I want my name on back of T-shirt</span>
                                        </label>
                                    </div>
                                    <div class="col s3">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal6" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4">
                            <h5>INSTRUO Winner T-shirt</h5>
                            <div class="divider"></div>
                            <p>Seller: XYZ</p>
                            <h4>₹300</h4>
                        </div>
                        <div class="col s12 m8">
                            <h5>T-shirt Size chooser</h5>
                            <div class="divider"></div>
                            <form action="#">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>M</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" checked />
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="col s2">
                                        <label>
                                            <input name="group1" type="radio" />
                                            <span>XL</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s2 offset-s1">
                                        <select>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Quantity</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" />
                                            <span>I want my name on back of T-shirt</span>
                                        </label>
                                    </div>
                                    <div class="col s3">
                                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Add item">Buy
                                            <i class="material-icons right">check</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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


