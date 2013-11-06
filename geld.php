<html>
<head>
	<title>Leibniz Klicker</title>
</head>
<body>

<center>

<?php


$geld=0;
$geldpc=0.25;

$omaanzahl=0;
$omapreis=50;

$fabrikanzahl=0;
$fabrikpreis=2500;

	//abfrage geldmenge
	if(isset($_COOKIE["geldmenge"])){
		$geld = $_COOKIE["geldmenge"];
	}
	
	//abfrage omaanzahl
	if(isset($_COOKIE["omaanzahl"])){
		$omaanzahl = $_COOKIE["omaanzahl"];
	}
	
	//abfrage omapreis
	if(isset($_COOKIE["omapreis"])){
		$omapreis = $_COOKIE["omapreis"];
	}
	
	//abfrage fabrikanzahl
	if(isset($_COOKIE["fabrikanzahl"])){
		$fabrikanzahl = $_COOKIE["fabrikanzahl"];
	}
	
	//abfrage fabrikpreis
	if(isset($_COOKIE["fabrikpreis"])){
		$fabrikpreis = $_COOKIE["fabrikpreis"];
	}
	
	
//COOKIE KLICKER
if (isset($_REQUEST['geld_y'])){

	$geld_y=$_REQUEST['geld_y'];
	$geld_x=$_REQUEST['geld_x'];
	
	if ($geld_y>0){
		//Anzahl pro Klick berechen
		$geldpc = 0.25+($omaanzahl*1)+($fabrikanzahl*10);	
		//addieren
		$geld = $geld+$geldpc;
		setcookie("geldmenge", $geld, time()+3600);
	}
	
}

//OMA KAUFEN
if (isset($_REQUEST['oma_y'])){
	
	$oma_y=$_REQUEST['oma_y'];
	if ($oma_y>0){
	
	//oma adden
	if($geld>=$omapreis){
		$geld=$geld-$omapreis;
		$omaanzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("omaanzahl", $omaanzahl, time()+3600);
		
		//neuen oma preis berechnen
		$omapreis=($omaanzahl*$omaanzahl*$omaanzahl*10)+50;
		setcookie("omapreis", $omapreis, time()+3600);
	}
}
	//Anzahl pro Klick berechen
	$geldpc = 0.25+($omaanzahl*1)+($fabrikanzahl*10);
}

//FABRIK KAUFEN
if (isset($_REQUEST['fabrik_y'])){

	$fabrik_y=$_REQUEST['fabrik_y'];
	if ($fabrik_y>0){
	
	//Fabrik adden
	if($geld>=$fabrikpreis){
		$geld=$geld-$fabrikpreis;
		$fabrikanzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("fabrikanzahl", $fabrikanzahl, time()+3600);
		
		//neuen Fabrik preis berechnen
		$fabrikpreis=($fabrikanzahl*$fabrikanzahl*$fabrikanzahl*25)+2500;
		setcookie("fabrikpreis", $fabrikpreis, time()+3600);
	}
}
	//Anzahl pro Klick berechen
	$geldpc = 0.25+($omaanzahl*1)+($fabrikanzahl*10);	
}


	//RESET
if (isset($_REQUEST['reset'])){
	setcookie("geldmenge", 0, time()+3600);
	setcookie("omaanzahl", 0, time()+3600);
	setcookie("omapreis", 50, time()+3600);
	setcookie("fabrikanzahl", 0, time()+3600);
	setcookie("fabrikpreis", 2500, time()+3600);
	//Seite neuladem,damit werte entgültig 0
	echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
}

//HTML
$omapc=$omaanzahl*1;
$fabrikpc=$fabrikanzahl*10;
$euro= "&#8364";
echo "

<form method='Post'>
	
<TABLE border='0'>
  <TR>
	<TD><input type='image' src='images/reset.jpg' width='75' length='75' name='reset' value='reset'>				 </TD>
    <TD><input type='image' src='images/oma.png' name='oma'  width='100' lenght='90' value='Oma kaufen'><br>		 </TD>
    <TD><input type='image' src='images/fabrik.jpg' width='100' lenght='90' name='fabrik' value='Fabrik kaufen'><br> </TD>

    <TD><input type='image' src='images/fabrik.jpg' width='100' lenght='90' name='fabrik' value='Fabrik kaufen'><br> </TD>
	<TD><input type='image' src='images/fabrik.jpg' width='100' lenght='90' name='fabrik' value='Fabrik kaufen'><br> </TD>
	<TD><input type='image' src='images/fabrik.jpg' width='100' lenght='90' name='fabrik' value='Fabrik kaufen'><br> </TD>
	<TD><input type='image' src='images/fabrik.jpg' width='100' lenght='90' name='fabrik' value='Fabrik kaufen'><br> </TD>
  </TR>
  <TR>
	<TD></TD>
    <TD>".$omaanzahl.	"Omas 	   (+".$omapc.")     </TD>
    <TD>".$fabrikanzahl." Fabriken (+".$fabrikpc.")  </TD>
	<TD>".$fabrikanzahl." Fabriken (+".$fabrikpc.")  </TD>
	<TD>".$fabrikanzahl." Fabriken (+".$fabrikpc.")  </TD>
	<TD>".$fabrikanzahl." Fabriken (+".$fabrikpc.")  </TD>
	<TD>".$fabrikanzahl." Fabriken (+".$fabrikpc.")  </TD>
  </TR>
   <TR>
	<TD><b>Preis pro Einheit: </b></TD>
    <TD>".$omapreis." $euro</TD>
    <TD>".$fabrikpreis." $euro </TD>
    <TD>".$fabrikpreis." $euro </TD>
    <TD>".$fabrikpreis." $euro</TD>
    <TD>".$fabrikpreis." $euro </TD>
    <TD>".$fabrikpreis." $euro </TD>
  </TR>

</TABLE>
	
</form>";

//GELDMÜNZE
echo "<form method='Post'>

	<input type='image' src='images/geld.png' width='200' length='200' name='geld' ><br>
	</form>";

//Ausgabe
	echo "$geld Euro. ($geldpc Euro pro Klick)<br><br>"; 
	
	echo "$omaanzahl Omas.(+" .($omaanzahl*1) . ")<br>";
	echo "$omapreis Euro pro weitere Oma.<br><br>";
	
	echo "$fabrikanzahl Fabriken.(+" .($fabrikanzahl*10) . ")<br>";
	echo "$fabrikpreis Euro pro weitere Fabrik.<br><br></center>";
	
	
?>



</body>
</html>