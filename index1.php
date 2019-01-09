<?php
('Content-Type: text/html; charset=iso-8859-1');
?>

<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Amber Studios</title>
</head>

	<body>	
		<div id="content">
			<div id="contentBorder">
				
					<div id="mainMeny">
					<div id="mainMeny">
						<a href="index1.php">Nytt inlägg</a>
						<a href="loggaUt.php">Logga ut</a>
					</div>
					</div>
					
					<?php
					//startar sessions och inkluderar vår datorbas och commonlibrary
					session_start();

					echo $_SESSION['session_id'];
		//Kollar connection och skickar till logginsidan.			
					include("common.library.php");
					if(! isset($_SESSION['session_id'])){
						header("location:testing.php");
					}
					
					else{
					if (isset($_POST['submit'])) {

					
					
					// tar hand om formulärdata
					$title = trim_string($_POST['title'] );
					$ingress = trim_string($_POST['ingress']);
					$user_id = $_SESSION['session_id'];
					
		//Vi skickar in vårt formulär till databasen.
					$query = "INSERT INTO Post SET title='$title', ingress='$ingress', user_id='$user_id'"; 
					
					$result= mysqli_query($dbcon, $query);
		//Om result inte stämmer så får du ett felmeddelande samt att sidan dör, lost connection.
					if (!$result) {
					$message  = 'Misslyckad query: ' . mysqli_error() . "\n";
					$message  .= 'Hela queryn: ' . $query;
					die($message);
					header("location:post.php");
		//När du publicerar skickas du till bloggisdan. 
					}
					
					else {
					echo "<p>Skrivningen med query '$query' till databasen lyckades!</p>";
					}
					}					
					}
					?>
					<?php $query = "SELECT title, ingress, user_id FROM Post ORDER BY title ASC";
					$result = mysql_query($query);
					while (list($title, $ingress, $user_id) = mysql_fetch_row($result)) {
					echo "<h2>$title</h2>";
					echo "<p>$type</p>";
					echo "<p>$pub_id</p>";
					} ?>
					<form method="post" action="posts.php">
					<p>Inlägg<br />
					<input type="text" name="title" size="30" /></p>
					<textarea name="ingress" cols="80" rows="30" placeholder="Skriv här"></textarea></p>
					<p><input type="submit" name="submit" value="Skicka!" /></p>
					<input type="hidden" name="submit" value="1" />
					
					
					</form>

			
            
					</div>
					</div>
              
		</div>
</body>
</html>
