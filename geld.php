<html>
<head>
	<title>Leibniz Klicker</title>
</head>
<body>

<center>

<?php
$geld=0;
$geldpc=0.25;

$flaschenanzahl=0;
$flaschenpreis=1.5;

$omaanzahl=0;
$omapreis=200;

$fabrikanzahl=0;
$fabrikpreis=2500;

$bankanzahl=0;
$bankpreis=10000;

$druckeranzahl=0;
$druckerpreis=25000;

$zeitmaschinenanzahl=0;
$zeitmaschinenpreis=100000;

	//abfrage geldmenge
	if(isset($_COOKIE["geldmenge"])){
		$geld = $_COOKIE["geldmenge"];
	}

//FLASCHE
	//abfrage flaschenanzahl
	if(isset($_COOKIE["flaschenanzahl"])){
		$flaschenanzahl = $_COOKIE["flaschenanzahl"];
	}
	
	//abfrage flaschenpreis
	if(isset($_COOKIE["flaschenpreis"])){
		$flaschenpreis = $_COOKIE["flaschenpreis"];
	}

//OMA
	//abfrage omaanzahl
	if(isset($_COOKIE["omaanzahl"])){
		$omaanzahl = $_COOKIE["omaanzahl"];
	}
	
	//abfrage omapreis
	if(isset($_COOKIE["omapreis"])){
		$omapreis = $_COOKIE["omapreis"];
	}

//FABRIK
	//abfrage fabrikanzahl
	if(isset($_COOKIE["fabrikanzahl"])){
		$fabrikanzahl = $_COOKIE["fabrikanzahl"];
	}
	
	//abfrage fabrikpreis
	if(isset($_COOKIE["fabrikpreis"])){
		$fabrikpreis = $_COOKIE["fabrikpreis"];
	}
	
//BANK
	//abfrage bankanzahl
	if(isset($_COOKIE["bankanzahl"])){
		$bankanzahl = $_COOKIE["bankanzahl"];
	}
	
	//abfrage bankpreis
	if(isset($_COOKIE["bankpreis"])){
		$bankpreis = $_COOKIE["bankpreis"];
	}
	
//DRUCKER
	//abfrage druckeranzahl
	if(isset($_COOKIE["druckeranzahl"])){
		$druckeranzahl = $_COOKIE["druckeranzahl"];
	}
	
	//abfrage druckerpreis
	if(isset($_COOKIE["druckerpreis"])){
		$druckerpreis = $_COOKIE["druckerpreis"];
	}
	
//ZEITMASCHINE
	//abfrage zeitmaschinenanzahl
	if(isset($_COOKIE["zeitmaschinenanzahl"])){
		$zeitmaschinenanzahl = $_COOKIE["zeitmaschinenanzahl"];
	}
	
	//abfrage zeitmaschinenpreis
	if(isset($_COOKIE["zeitmaschinenpreis"])){
		$zeitmaschinenpreis = $_COOKIE["zeitmaschinenpreis"];
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
	
	<TD><input type='image' src='images/flasche.png' 		name='flasche'>	<br> </TD>
    <TD><input type='image' src='images/oma.png'	 		name='oma'>		<br> </TD>
    <TD><input type='image' src='images/fabrik.png'  		name='fabrik'>	<br> </TD>
	<TD><input type='image' src='images/bank.png'  	 		name='bank'>	<br> </TD>
	<TD><input type='image' src='images/drucker.png' 		name='drucker'>	<br> </TD>
	<TD><input type='image' src='images/zeitmaschine.png' 	name='zeitmaschine'>	<br> </TD>
  </TR>
  <TR>
	<TD></TD>
    <TD>".$flaschenanzahl.		" Flaschen 		(+".$flaschenpc.")  </TD>
	<TD>".$omaanzahl.			" Omas 	   		(+".$omapc.")     </TD>
	<TD>".$fabrikanzahl. 		" Fabriken		(+".$fabrikpc.")  </TD>
	<TD>".$bankanzahl.    		" Banken 		(+".$bankpc.")  </TD>
	<TD>".$druckeranzahl. 		" Drucker 		(+".$druckerpc.")  </TD>
	<TD>".$zeitmaschinenanzahl. " Zeitmaschinen (+".$zeitmaschinenpc.")  </TD>
  </TR>
   <TR>
	<TD><b>Preis pro Einheit: </b></TD>
    <TD>".$flaschenpreis." $euro </TD>
	<TD>".$omapreis." $euro</TD>
    <TD>".$fabrikpreis." $euro </TD>
    <TD>".$bankpreis." $euro</TD>
    <TD>".$druckerpreis." $euro </TD>
    <TD>".$zeitmaschinenpreis." $euro </TD>
  </TR>

</TABLE>
	
</form>";

//GELDMÜNZE
echo "<form method='Post'>

	<input type='image' src='images/geld.png' width='200' length='200' name='geld' ><br>
	</form>";

//Ausgabe
	echo "<b><FONT FACE='Arial Black'>$geld $euro ($geldpc $euro pro Klick)</FÒNT></b><br><br></center>"; 
	
	
	
?>



</body>
</html>