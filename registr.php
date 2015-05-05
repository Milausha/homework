<?php  
session_start();
 
 if(isset($_POST['go']))
	{
		$data = fopen ( 'registr.csv', 'r' );
			$b=false;
			for($i=0; $info = fgetcsv ($data, 1000, ";"); $i++)
			{
				list($mail, $name, $pass, $pol,$right) = $info;
				if($_POST['mail']==$info[0]&& $_POST['password']==$info[2])
				{
					$b=true;
					$_SESSION['auth2']=array(
					'mail'		=> $info[0],
  					'name'		=> $info[1],
  					'password'	=> $info[2],
					'pol'		=> $info[3],
					'right'		=> $info[4],
					);
				}				
			}
			fclose ( $data );
	}
 if(isset($_POST['exit']))
	{
		header("Location: registr.php");
		$_SESSION['auth']=0;
		$_SESSION['auth2']=0;
		exit();
	} 
	
    if(isset($_POST['toOrder']))
	{
		if(empty($_SESSION['auth2']))
		{
			?>
			<h1>you aren't registred</h1>
			<?php
			}
			else
			{
				header("Location:/index.php");			
			}	
	}
	
	if(isset($_POST['submitButton']))
	{
		$data = fopen ( 'registr.csv', 'r' );
		$b=true;
		for($i=0; $info = fgetcsv ($data, 1000, ";"); $i++)
		{
			list($mail, $name, $pass, $pol,$right) = $info;
			if($_POST['mail']==$info[0])
				$b=false;
		}
		fclose ( $data );
		if (preg_match('/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/',$_POST['mail']))
		{
			if($b==true)
			{
				$array = array($_POST['mail'],$_POST['name'],$_POST['password'],$_POST["pol"],'user');
				$hand = fopen("registr.csv", "a");
				fputcsv($hand, $array,';');
				echo $_POST['name']."you are registered";
				fclose($hand);
				$_SESSION['auth'] = array(
  					'mail'		=> $array['mail'],
  					'name'		=> $array['name'],
  					'password'	=> $array['password'],
					'pol'		=> $array['pol'],
					'right'		=> $array["user"],
  				);
				
		require 'connect.php';	
		$mail = $_REQUEST['mail'];
		$name = $_REQUEST['name'];
		$password = $_REQUEST['password'];
		$pol = $_REQUEST['pol'];
		$right = $_REQUEST["user"];
		
		$insert_sql = "INSERT INTO registr (mail,name,password,pol,right)" .
		//"VALUES('{$_POST['Items']}','{$_POST['fullname']}', '{$quan}', '{$_POST['commit']}');";
		"VALUES('{$mail}','{$name}', '{$password}', '{$_POST['pol']}', '{$_POST["user"]}');";
		mysql_query($insert_sql);
				
			}
			else
			echo "this login already exists "."</b> ";
		}
		else 
			echo "incorrect e-mail";		
	}
		
	if(isset($_POST['table']))
	{
		if(!empty($_SESSION['auth2'])&&($_SESSION['auth2']['right']=='admin'))
			header("Location:/table.php");
		else 
			echo "you aren't admin ";
	}
	
	if(isset($_POST['tableofpass']))
	{
		if(!empty($_SESSION['auth2'])&&($_SESSION['auth2']['right']=='admin'))
			header("Location:/tableofpasswords.php");
		else 
			echo "you aren't admin ";
	}	
	if (isset($_GET['exit']))
     session_destroy();
 echo !empty($_SESSION['auth'])||!empty($_SESSION['auth2'])?$_SESSION['auth2']['name']:" guest";
?>
<html>
 <head>
  <title> Registration </title>
 </head>
 <body bgcolor=Cornsilk>
 <form action="registr.php" method="post" name="form">
 
    e-mail:
     <input type= "text" name ="mail"><br><br />
	 password:
     <input type= "password" name ="password"><br><br />
	 Name:
     <input type= "text" name ="name"><br><br />
	 pol:
	 <select name="pol">
      <option value="M" > M  </option>
      <option value="W" > W  </option>
	  </select><br><br />
	  <input type="submit" value ="      Submit          " name="submitButton"><br><br/>
	  <input type="submit" value ="    To order         " name="toOrder"><br><br/>
	  <input type="submit" value ="  Table of orders    " name="table"><br><br/>
	  <input type="submit" value ="Table of passwords" name="tableofpass"><br><br/>
	  <input type="submit" value ="go" name="go"><br><br>
	  <input type="submit" value ="Exit" name="exit"><br><br/>
	  <pre>
	
</form>
</body>
</html>