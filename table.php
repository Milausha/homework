<?php
	if(isset($_POST['back']))
	{
		header("Location: registr.php");
	}
 ?>
<html>
 <head>
  <title> Table of orders </title>
 </head>
 <body>
 <form action="table.php" method="post" name="form">
 <input type="submit" value ="back" name="back"><br><br>
 </form>
  </body>
 <?php
 		$data = File("file.csv");
		if(!empty($data))
		{
			echo "<b><h2><left>Orders</b></h2></left>";
			echo "<left><table bgcolor=Lightgrey border=2><tr>";
			$dat_arr = explode(";", $data[0]);
			echo "<tr ><td bgcolor=Cornsilk align=center  ><font size=2>Name</td><td bgcolor=Cornsilk align=center ><font size=2>Quantity</td><td bgcolor=Cornsilk align=center ><font size=2>Item</td><td  bgcolor=Cornsilk align=center ><font size=2>Result</td><td  bgcolor=Cornsilk align=center ><font size=2>Comment</td></tr> \n";
			for ($p=0;$p<count($dat_arr);$p++) 
			{
				echo "<td bgcolor=Cornsilk><left><b>$dat_arr[$p]";
			}
			echo "</tr>";
			for ($i=1;$i<count($data);$i++) 
			{
				$data_array = explode(";", $data[$i]);
				echo "<tr>";
				for ($f=0;$f<count($data_array);$f++) 
				{ 
			      echo "<td bgcolor=Cornsilk><left><b>$data_array[$f]";
			    }
				echo "</tr>";
			}
			echo "</table></left>";
		}
		else 
			echo "file $data  does not exist";		
?>

</html>