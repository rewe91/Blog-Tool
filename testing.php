<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Inlogg</title>
</head>

	<body>	
<?php
				
				session_start();
		
				include("common.library.php");
//Startar en session och inkluderar vårt common library, det är även i common library vi connectar till databasen.
				if(! isset($_SESSION['session_id'])){
					
//Vi kollar om användarens username finns i datorbasen och om dennes lösenord är korrekt.
//Vi Tvättar även datan här med hjälp av addcslashes¨					
					if(isset($_POST['username'])){	
						$username = $_POST['username'];
						$pswd = addslashes ($_POST['password']);
						
						$query= "SELECT user_id FROM user WHERE first_name = '$username' AND pass=md5('$pswd')";
		//kollar om username samt lösenord stämmer överens med en användare i databasen.
						$result= mysqli_query($dbcon,$query);
						
						echo ("count= " . mysqli_num_rows($result));
						if(mysqli_num_rows($result) == 1) {	
						echo"yolo";
		//Går igenom all data som hämtas, om resultatet blir 1 så loggas du in och skickas vidare till bloggformuläret.
							$row = mysqli_fetch_assoc($result);
							
							echo $row['user_id'];
							$_SESSION['session_id'] = $row['user_id'];
							header("location:index1.php");
							
							//INLOGGNING LYCKADES
				
						}
		
						else {
							echo"fail";
							//om inloggningen inte lyckas skickas ett fel medellande fail
						}
						
					}
					
					else { 
						//form är tomt
					}
					
				}	
				else{
					header("location:index1.php");
		//Om du redan är inloggad skickas du vidare till index1.
				}	
?>
		<div id="content">
			<div id="contentBorder"></div>
					<form method="post" action="testing.php">
						Username<br />
						<input type="text" name="username" size="30" />
						Password<br />
						<input type="text" name="password" placeholder"borås$hotmail.com">
						<br/>
						<p><input type="submit" name="submit" value="Skicka!" />
						</form>
				
				
				<div id="footer">
						<p id="name">Copyright: Tim Sjöblom Amber Studios</p>
						</div>
					</div>
		</div>
</body>
</html>