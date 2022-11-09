<html>
<head>
<meta charset="UTF-8"/>
<title>
piłka nożna
</title>
<link rel="stylesheet" href="styl2.css"/>
</head>

<body>
	<div id="baner">
	<h3>Reprezentacja polski w piłce nożnej</h3>
	<img src="obraz.jpg" alt="reprezentacja"/>
	</div>
	
		<div id="lewy">
		<form method="post">
			<select name="pozycja">
				<option value="1">Bramkarze</option>
				<option value="2">Obrońcy</option>
				<option value="3">Pomocnicy</option>
				<option value="4">Napastnicy</option>
			</select>
			<input type="submit" value="Zobacz" name="wyslij"/>
		</form>
		<img src="zad2.png" alt="piłka"/>
		<p>Autor: 00000000000</p>
		</div>
		
			<div id="prawy">
			<ol>
				<?php
				if(isset($_POST['wyslij'])){
					$b = mysqli_connect("localhost","root","","egzamin");
					$pozycja = $_POST['pozycja'];
					$zap = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id='$pozycja'";
					$q = mysqli_query($b, $zap);
					while($row = mysqli_fetch_array($q)){
						echo"<p>";
						echo '<li>'.$row['imie'].' '.$row['nazwisko'].'</li>';
						echo"</p>";
					}
					mysqli_close($b);
				}
				?>
			
			</div>
			
				<div id="glowny">
				<h3>Liga mistrzów</h3>
				</div>
				
					<div id="liga">
						<?php
							$db = mysqli_connect("localhost","root","","egzamin");
							$zapytanie = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
							$q = mysqli_query($db, $zapytanie);
							while($row = mysqli_fetch_array($q)){
								echo '<div id="inf">';
								echo '<h2>'.$row['zespol'].'</h2>';
								echo '<h1>'.$row['punkty'].'</h1>';
								echo '<p> grupa: '.$row['grupa'].'</p>';
								echo '</div>';
							}
							mysqli_close($db);
						?>
					</div>
</body>
</html>