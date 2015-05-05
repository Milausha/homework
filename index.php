<?php 
session_start();

      $connect = mysql_connect("localhost","root","") or die(mysql_error());
	  mysql_select_db("homework");
	
 if(isset($_POST['exit']))
	{
		$_SESSION['auth']=0;
		$_SESSION['auth2']=0;
		header("Location: registr.php");
		exit();
	}
	if(isset($_POST['back']))
	{
		header("Location: registr.php");
	}
 ?>
<html>
 <head>
  <title> Order </title>
 </head>
 <body bgcolor=Cornsilk>
  <form action="" method="post" name="form">
    Full Name:
     <input type= "text" name ="fullname"><br><br />
    Item:  
     <select name="Items">
      <option value="Item1"   > Item 1 -> 20  </option>
      <option value="Item2"    > Item 2 ->30  </option>
      <option value="Item3"    > Item 3 ->60  </option>
      </select><br><br />
    Quantity:
    <input type="number" name ="q" min="0"/><br><br/>
    <input type="submit" value ="Submit" name="submitButton"><br/>
	<p><textarea  rows="10" cols="45" name="commit"></textarea></p>
	<input type="submit" value ="back" name="back"><br><br
	 <input type="submit" value ="Exit" name="exit"><br><br/>
	</form>
	<pre>
	</body>
	</html>
	
	<?php  
	if(isset($_POST['submitButton']))
	{
		echo  "<br><b>Customer name: " .$_POST['fullname']."</b> ";
		echo  "<br><b>Quantity:".$_POST['q']." </b> ";
		$quan =$_POST['q'] ;
		if(!empty($_POST['Items']))
			echo  "<br><b>Item:".$_POST['Items']."</b> ";
		$price=array("Item1"=>20,"Item2"=>30,"Item3"=>60);
		echo  "<br><b>Result:".(int)$quan* (int)($price[$_POST["Items"]])."</b>";
		echo "<br><b>Comment:".$_POST['commit'] ."</b><br>";
		$array = array($_POST['fullname'],$_POST['q'],$_POST['Items'],(int)$quan* (int)($price[$_POST["Items"]]),$_POST['commit']);		
		$hand = fopen("file.csv", "a"); 
		  
               fputcsv($hand, $array,';');   		   
        
        fclose($hand);

		require 'connect.php';	
		$fullname = $_REQUEST['fullname'];
		$quantity = $_REQUEST['q'];
		$Items = $_REQUEST['Items'];
		$commit = $_REQUEST['commit'];
		$insert_sql = "INSERT INTO orders (Items,fullname,q,commit)" .
		//"VALUES('{$_POST['Items']}','{$_POST['fullname']}', '{$quan}', '{$_POST['commit']}');";
		"VALUES('{$Items}','{$fullname}', '{$quan}', '{$commit}');";
		mysql_query($insert_sql);
		}	
			
?>