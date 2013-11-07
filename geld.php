<html>
<head>
	<title>Leibniz Klicker</title>
</head>
<body>

<center>

<?php
$geld=0;
$geldpc=0.50;
$euro= "&#8364";
$steigungsfaktor=1.2; //20% pro kauf geht hoch- ändern geht global !

$flaschenanzahl=0;
$flaschenpreis=5;

$omaanzahl=0;
$omapreis=500;

$fabrikanzahl=0;
$fabrikpreis=5000;

$bankanzahl=0;
$bankpreis=12500;

$druckeranzahl=0;
$druckerpreis=25000;

$zeitmaschinenanzahl=0;
$zeitmaschinenpreis=500000;

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
	
$flaschenpc=$flaschenanzahl*0.25;
$omapc=$omaanzahl*1;
$fabrikpc=$fabrikanzahl*10;
$bankpc=$bankanzahl*25;
$druckerpc=$druckeranzahl*50;
$zeitmaschinenpc=$zeitmaschinenanzahl*100;
	
//GELD KLICKER
if (isset($_REQUEST['geld_y'])){

	$geld_y=$_REQUEST['geld_y'];
	$geld_x=$_REQUEST['geld_x'];
	
	if ($geld_y>0){
		//Anzahl pro Klick berechen
		$geldpc = $geldpc+$flaschenpc+$omapc+$fabrikpc+$bankpc+$druckerpc+$zeitmaschinenpc;
								
		//addieren
		$geld = $geld+$geldpc;
		setcookie("geldmenge", $geld, time()+3600);
		
	}
	
}

//FLASCHE KAUFEN
if (isset($_REQUEST['flasche_y'])){
	
	$flasche_y=$_REQUEST['flasche_y'];
	if ($flasche_y>0){
	
	//flasche adden
	if($geld>=$flaschenpreis){
		$geld=$geld-$flaschenpreis;
		$flaschenanzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("flaschenanzahl", $flaschenanzahl, time()+3600);
		
		//neuen Flaschen preis berechnen
		$flaschenpreis=$flaschenpreis*1.10;
		setcookie("flaschenpreis", $flaschenpreis, time()+3600);
		echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
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
		$omapreis=$omapreis*$steigungsfaktor;
		setcookie("omapreis", $omapreis, time()+3600);
		echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
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
		$fabrikpreis=$fabrikpreis*$steigungsfaktor;
		setcookie("fabrikpreis", $fabrikpreis, time()+3600);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//BANK KAUFEN
if (isset($_REQUEST['bank_y'])){

	$bank_y=$_REQUEST['bank_y'];
	if ($bank_y>0){
	
	//BANK adden
	if($geld>=$bankpreis){
		$geld=$geld-$bankpreis;
		$bankanzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("bankanzahl", $bankanzahl, time()+3600);
		
		//neuen Fabrik preis berechnen
		$bankpreis=$bankpreis*$steigungsfaktor;
		setcookie("bankpreis", $bankpreis, time()+3600);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//DRUCKER KAUFEN
if (isset($_REQUEST['drucker_y'])){

	$drucker_y=$_REQUEST['drucker_y'];
	if ($drucker_y>0){
	
	//drucker adden
	if($geld>=$druckerpreis){
		$geld=$geld-$druckerpreis;
		$druckeranzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("druckeranzahl", $druckeranzahl, time()+3600);
		
		//neuen Fabrik preis berechnen
		$druckerpreis=$druckerpreis*$steigungsfaktor;
		setcookie("druckerpreis", $druckerpreis, time()+3600);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//ZEITMASCHINE KAUFEN
if (isset($_REQUEST['zeitmaschine_y'])){

	$zeitmaschine_y=$_REQUEST['zeitmaschine_y'];
	if ($zeitmaschine_y>0){
	
	//BANK adden
	if($geld>=$zeitmaschinenpreis){
		$geld=$geld-$zeitmaschinenpreis;
		$zeitmaschinenanzahl++;
		setcookie("geldmenge", $geld, time()+3600);
		setcookie("zeitmaschinenanzahl", $zeitmaschinenanzahl, time()+3600);
		
		//neuen Fabrik preis berechnen
		$zeitmaschinenpreis=$zeitmaschinenpreis*$steigungsfaktor;
		setcookie("zeitmaschinenpreis", $zeitmaschinenpreis, time()+3600);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//RESET
if (isset($_REQUEST['reset_y'])){
$reset_y=$_REQUEST['reset_y'];

if ($reset_y>0){
	setcookie("geldmenge", 0, time()+3600);
	setcookie("flaschenanzahl", 0, time()+3600);
	setcookie("flaschenpreis", 5, time()+3600);
	setcookie("omaanzahl", 0, time()+3600);
	setcookie("omapreis", 500, time()+3600);
	setcookie("fabrikanzahl", 0, time()+3600);
	setcookie("fabrikpreis", 5000, time()+3600);
	setcookie("bankanzahl", 0, time()+3600);
	setcookie("bankpreis",12500 , time()+3600);
	setcookie("druckeranzahl", 0, time()+3600);
	setcookie("druckerpreis", 25000, time()+3600); 
	setcookie("zeitmaschinenanzahl", 0, time()+3600);
	setcookie("zeitmaschinenpreis", 50000, time()+3600); 
	//Seite neuladem,damit werte entgültig 0
	echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
}
}
//HTML

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
    <TD>".number_format(round($flaschenpreis,2),2,'.',',')." $euro </TD>
	<TD>".number_format(round($omapreis,2),2,'.',',')." $euro</TD>
    <TD>".number_format(round($fabrikpreis,2),2,'.',',')." $euro </TD>
    <TD>".number_format(round($bankpreis,2),2,'.',',')." $euro</TD>
    <TD>".number_format(round($druckerpreis,2),2,'.',',')." $euro </TD>
    <TD>".number_format(round($zeitmaschinenpreis,2),2,'.',',')." $euro </TD>
  </TR>

</TABLE>
	
</form>";

//GELDMÜNZE
echo "<form method='Post'>

	<input type='image' src='images/geld.png' width='200' length='200' name='geld' ><br>
	</form>";

//Ausgabe	
	$geldrund=round($geld,2);
	$geldrundkomma=number_format($geldrund, 2, '.', ',');
	echo "<b><FONT FACE='Arial Black'>".$geldrundkomma." $euro (".number_format($geldpc,2,'.',',')." $euro pro Klick)</FÒNT></b><br><br></center>"; 
	

	
?>



</body>
</html>