<?
 $price=array('Pizza'=>200,'Burger'=>60,'Noodles'=>80,'Macaroni'=>120,'Juice'=>50,'Manchurian'=>111,'Cheese_Sandwich'=>30,'Cold_Coffee'=>20,'Special_Thali'=>200,'Butter_Milk'=>50);
 $total=0;
 foreach($price as $x=>$xv)
 {
 $q="q_".$x;
 $a="a_".$x;
 $$q=0;
 $$a=0;
 }
?>
<html>
 <head>
 <title>Bill</title>
 <style>
 table{
 border: 5px solid #505160;
 padding:2px;
 }
 th{
 background-color:#598234;
 }
 td{
 background-color:#AEBD38;
 padding:4px 20px 4px 20px;
 }
 body{
 background-color:#68829E;
 color:white;
 }
 input[type="number"]{
 width:50;
 }
 input[type="submit"]{
 color:white;
 background-color:#598234;
 border:0;
 margin-left:30px;
 font-size:25px;
 }
 span{
 background-color:white;
 }
 </style>
 </head>
 <body>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
 <table>
 <tr><th>S.No.</th><th>Item</th><th>Price</th><th>Quantity</th><th>Total 
Amount</th></tr>
 <?php
 $i=1;
 foreach($price as $x=>$xv)
 {
 $q="q_".$x;
 $a="a_".$x;
 if(isset($_POST[$q]))
 {
 $$q=$_POST[$q];
 $$a=$xv*$$q;
 $total+=$$a;
 }
echo "<tr><td>".$i++."</td><td>".$x."</td><td>".$xv."</td><td><input 
type=\"number\" name=\"".$q."\" value=".$$q." min=0 max=10></td><td>".$$a."</td></tr>";
 }
 ?>
 <tr>
 <td rowspan=2 colspan=3>
 <input type="submit" value="Calculate">
 </td>
<td>Subtotal</td>
<th>
 <?php echo $total;?>
 </th>
 </tr>
 <tr>
 <td>Amt Due</td>
<th>
 <?php
 if($total>=1000)
 echo $total*0.9;
 else
 echo $total;
 ?>
 </th>
 </tr>
 </table><b>
 <?php
 if($total>=1000)
 echo "<span style=\"color:green;\">Discount of 10% is applied 
successfully</span>";
 else
 echo "<span style=\"color:maroon;\">No Discount Applied</span>";
 ?></b>
 </form>
 </body>
</html>