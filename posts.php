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
						<a href="index1.php">Nytt inlägg</a>
						<a href="loggaUt.php">Logga ut</a>
					</div>
					
					
					<?php
		//Startar session och includerar common library.
					session_start();
					include_once("common.library.php");
					if (isset ($_POST['title'])){
						$title = trim_string($_POST['title'] );
						$ingress = trim_string($_POST['ingress']);
						$user_id = $_SESSION['session_id'];
						$query = "INSERT INTO Post SET title='$title', ingress='$ingress', user_id='$user_id'"; 
						$result= mysqli_query($dbcon, $query);
		//Tittar om uppgifterna stämmer med hjälp av trimstring och om de stämmer överens med databasen formulär för att sedan hämta ut dessa. 
					}
					
					
		//Hämtar inlägg och sorterar dem i fallande ordning.
					$query = "SELECT p_id,title, ingress FROM Post ORDER BY p_id DESC";
					$result = mysqli_query($dbcon, $query);
		//Om result inte stämmer så får du ett felmeddelande samt att sidan dör, lost connection. 			
					if (!$result) {
					$message  = 'Misslyckad query: ' . mysqli_error() . "\n";
					$message  .= 'Hela queryn: ' . $query;
					die($message);
					}
		//Skapar en whileloop för att sedan kunna ta bort datan. Vi hämtar result, och skapar sedan en href länk som kopplar oss till vår tabort
					while($row = mysqli_fetch_assoc($result)) {
						$tabortHref = "tabort.php?p_id=" . $row['p_id'];
						echo "<h2>" . $row["title"] . "</h2>";
						echo "<p>" . $row["ingress"] . "</p>";
						
						echo "<a href='$tabortHref'>" . $row['p_id'] . "</a>";
		// Vi echoar ut en titelnamnet och brödtexten för inlägger för att sedan kunna ta bort dessa.				
					}
					
					?>
					
					
					
					<div id="footer">
					<p id="name">Copyright: Tim Sjöblom Amber Studios</p>
					</div>
					</div>
		</div>
</body>
</html>
