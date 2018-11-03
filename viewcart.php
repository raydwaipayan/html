<?php
session_start();
if(!empty($_SESSION['itemlist'])){?>
 <table class="table" cellspacing="0" border="1">
 <tr>
  <th>Serial</th>
 <th>Item</th>
 <th>Size</th>
 <th>Quantity</th>
 <th>Price</th>
  </tr>
<?php for($i = 0 ; $i < count($_SESSION['itemlist']) ; $i++) {?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $_SESSION['itemlist'][$i]['item'];?></td>
<td><?php echo $_SESSION['itemlist'][$i]['size'];?></td>
<td><?php echo $_SESSION['itemlist'][$i]['quantity'];?></td>
<td><?php echo $_SESSION['itemlist'][$i]['price'];?></td>
 </tr>
<?php }  ?>
</table>
<a href="index.php?remove=remove">Empty User</a>
 <?php }else{
  echo "You have no User in SESSION";
 }?>
