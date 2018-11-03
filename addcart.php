<?php
session_start();
 if(isset($_POST['submit'])){
 $user=array(
'item'=>$_POST['item'], //Username form field name
'size'=>$_POST['size'],
'quantity'=>$_POST['quantity'],
'price'=>$_POST['price']
);
$_SESSION['itemlist'][]=$user;
}
header("location: index.php");
