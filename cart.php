<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_POST['submit'])){
$item_array=array(
  'item'=>$_POST['item'],
  'size'=>$_POST['size'],
  'quantity'=>$_POST['quantity'],
  'price'=>$_POST['price']
);
$_SESSION['item_list'][]=$item_array;
}
if(isset($POST['view']))
{
  if(!empty($_SESSION['item_list'])){?>
  <table class="table" cellspacing="0" border="1">
  <tr>
   <th>Serial</th>
  <th>Item</th>
  <th>Size</th>
  <th>Quantity</th>
  <th>Price</th>
   </tr>
 <?php for($i = 0 ; $i < count($_SESSION['item_list']) ; $i++) {?>
  <tr>
  <td><?php echo $i;?></td>
  <td><?php echo $_SESSION['item_list'][$i]['item'];?></td>
  <td><?php echo $_SESSION['item_list'][$i]['size'];?></td>
  <td><?php echo $_SESSION['item_list'][$i]['quantity'];?></td>
  <td><?php echo $_SESSION['item_list'][$i]['price'];?></td>
  </tr>
 <?php }  ?>
 </table>
 <?php
}
}
?>
