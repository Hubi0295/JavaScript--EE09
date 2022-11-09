<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="styl3.css"/>
<title>Twoje BMI</title>
</head>
<body>
<div id="logo">
<img src="wzor.png" alt="wzor.png"/>
</div>
<div id="baner">
<h1>wzór BMI</h1>
</div>
<div id="glowny">
<table>
<tr>
<th>Interpretacja BMI</th><th>Wartość minimalna</th><th>Wartość maksymalna</th>
<?php
	$db= mysqli_connect("localhost", "root", "","egzamin");
	$zapytanie="SELECT informacja, wart_min, wart_max FROM bmi;";
	$query=mysqli_query($db, $zapytanie);
	while($r=mysqli_fetch_array($query)){
	echo"<tr>","<td>".$r['informacja'].  "</td>","<td>".$r['wart_min'] . "</td>","<td>".$r['wart_max'].  "</td>",  "</tr>";
	}
	mysqli_close($db);
?>
</table>
</div>
<div id="lewy">
<h2>Podaj wagę i wzrost</h2>
<form method="POST">
<label>Waga: <input type="number" min="1" name="waga"/></label>
<label>Wzrost w cm: <input type="number" min="1" name="wzrost"/></label>
<input type="submit" value="Oblicz i zapamietaj wynik" name="wyslij"/>
</form>
<?php
 if(isset($_POST['wyslij'])){
$waga= $_POST['waga'];
$wzrost= $_POST['wzrost'];
$wyslij= $_POST['wyslij'];
	 $db= mysqli_connect("localhost", "root", "", "egzamin");
	 $wynik= ($waga/($wzrost*$wzrost))*10000;
	 echo"Twoja waga: ".$waga." Twój wzrost: ".$wzrost."</br>", "BMI wynosi: ".$wynik;
	 $data= date('Y-m-d');
	 if($wynik<=18){
		 $a="1";
	 }
	 else if($wynik>=19 AND $wynik<=25){
		 $a="2";
	 }
	 else if($wynik>=26 AND $wynik<=30){
		 $a="3";
	 }
	 else{
		 $a="4";
	 }
	 $zapytanie="Insert into wynik values('','$a','$data','$wynik')";
	 $query= mysqli_query($db, $zapytanie);
	 if($query){
		 echo"Wysłano";
	 }
	 else{
		 echo"Nie wysłano";
	 }
	 mysqli_close($db);
 }

?>
</div>
<div id="prawy">
<img src="rys1.png" alt="cwiczenia"/>
</div>
<div id="stopka">
Autor: 000000000  <a href="kweredny.txt">Zobacz kwerendy</a>
</div>
</body>
</html>