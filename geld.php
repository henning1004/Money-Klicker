<html>
<head>
	<title>Money Klicker</title>
</head>
<body>

<center>

<?php
$geld=0;
$euro= "&#8364";
$leer="&nbsp;";
$steigungsfaktor=1.2; //20% pro kauf geht hoch- ändern geht global !

$flaschenanzahl=0;
$flaschenpreis=2;

$omaanzahl=0;
$omapreis=250;

$fabrikanzahl=0;
$fabrikpreis=1000;

$bankanzahl=0;
$bankpreis=7500;

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
	
$flaschenpc=$flaschenanzahl*0.05;
$omapc=$omaanzahl*3;
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
		$geldpc = 0.01+$flaschenpc+$omapc+$fabrikpc+$bankpc+$druckerpc+$zeitmaschinenpc;
								
		//addieren
		$geld = $geld+$geldpc;
		setcookie("geldmenge", $geld, time()+60*60*24*30);//für 30 Tage
		
	}
	
}

//HTML TEIL

echo "</center>

<form method='Post'>
<FONT FACE='Comic Sans MS'>
<TABLE border='0'>
  <TR>
  
	<TD><input type='image' src='images/reset.jpg' width='75' length='75' name='reset' value='reset'>				 </TD>
	<TD>   </TD>
	<TD><input type='image' src='images/flasche.png' 		name='flasche'>	<br> </TD>
    <TD><input type='image' src='images/oma.png'	 		name='oma'>		<br> </TD>
    <TD><input type='image' src='images/fabrik.png'  		name='fabrik'>	<br> </TD>
	<TD><input type='image' src='images/bank.png'  	 		name='bank'>	<br> </TD>
	<TD><input type='image' src='images/drucker.png' 		name='drucker'>	<br> </TD>
	<TD><input type='image' src='images/zeitmaschine.png' 	name='zeitmaschine'>	<br> </TD>
  </TR>
  <TR>
	<TD>  $leer $leer $leer $leer $leer $leer $leer $leer $leer </TD>
	<TD>        </TD>
    <TD><center>".$flaschenanzahl.		" Flaschen(+".$flaschenpc.")</center>$leer $leer  </TD>
	<TD><center>".$omaanzahl.			" Omas(+".$omapc.")			</center>$leer $leer </TD>
	<TD><center>".$fabrikanzahl. 		" Fabriken(+".$fabrikpc.")	</center>$leer $leer </TD>
	<TD><center>".$bankanzahl.    		" Banken(+".$bankpc.")		</center>$leer $leer</TD>
	<TD><center>".$druckeranzahl. 		" Drucker(+".$druckerpc.")	</center>$leer $leer</TD>
	<TD><center>".$zeitmaschinenanzahl. " Zeitmaschinen(+".$zeitmaschinenpc.")</center>$leer $leer</TD>
  </TR>
   <TR>
	<TD>$leer $leer $leer $leer $leer $leer $leer $leer $leer $leer $leer $leer $leer $leer<b>Preis pro Einheit: </b></TD>
	<TD>$leer $leer $leer $leer $leer $leer $leer $leer $leer</TD>
    <TD><center>".number_format(round($flaschenpreis,2),2,'.',',')." $euro </center></TD>
	<TD><center>".number_format(round($omapreis,2),2,'.',',')." $euro</center></TD>
    <TD><center>".number_format(round($fabrikpreis,2),2,'.',',')." $euro</center> </TD>
    <TD><center>".number_format(round($bankpreis,2),2,'.',',')." $euro</center></TD>
    <TD><center>".number_format(round($druckerpreis,2),2,'.',',')." $euro </center></TD>
    <TD><center>".number_format(round($zeitmaschinenpreis,2),2,'.',',')." $euro </center></TD>
  </TR>

</TABLE>
	
</form></FONT>";





//FLASCHE KAUFEN
if (isset($_REQUEST['flasche_y'])){
	
	$flasche_y=$_REQUEST['flasche_y'];
	if ($flasche_y>0){
	
	//FLASCHE adden
	if($geld>=$flaschenpreis){
		$geld=$geld-$flaschenpreis;
		$flaschenanzahl++;
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("flaschenanzahl", $flaschenanzahl, time()+60*60*24*30);
		
		//neuen FLASCHEN preis berechnen
		$flaschenpreis=$flaschenpreis*1.10;
		setcookie("flaschenpreis", $flaschenpreis, time()+60*60*24*30);
		echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//OMA KAUFEN
if (isset($_REQUEST['oma_y'])){
	
	$oma_y=$_REQUEST['oma_y'];
	if ($oma_y>0){
	
	//OMA adden
	if($geld>=$omapreis){
		$geld=$geld-$omapreis;
		$omaanzahl++;
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("omaanzahl", $omaanzahl, time()+60*60*24*30);
		
		//neuen OMA preis berechnen
		$omapreis=$omapreis*$steigungsfaktor;
		setcookie("omapreis", $omapreis, time()+60*60*24*30);
		echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//FABRIK KAUFEN
if (isset($_REQUEST['fabrik_y'])){

	$fabrik_y=$_REQUEST['fabrik_y'];
	if ($fabrik_y>0){
	
	//FABRIK adden
	if($geld>=$fabrikpreis){
		$geld=$geld-$fabrikpreis;
		$fabrikanzahl++;
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("fabrikanzahl", $fabrikanzahl, time()+60*60*24*30);
		
		//neuen FABRIK preis berechnen
		$fabrikpreis=$fabrikpreis*$steigungsfaktor;
		setcookie("fabrikpreis", $fabrikpreis, time()+60*60*24*30);
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
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("bankanzahl", $bankanzahl, time()+60*60*24*30);
		
		//neuen BANK preis berechnen
		$bankpreis=$bankpreis*$steigungsfaktor;
		setcookie("bankpreis", $bankpreis, time()+60*60*24*30);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//DRUCKER KAUFEN
if (isset($_REQUEST['drucker_y'])){

	$drucker_y=$_REQUEST['drucker_y'];
	if ($drucker_y>0){
	
	//DRUCKER adden
	if($geld>=$druckerpreis){
		$geld=$geld-$druckerpreis;
		$druckeranzahl++;
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("druckeranzahl", $druckeranzahl,time()+60*60*24*30);
		
		//neuen DRUCKER preis berechnen
		$druckerpreis=$druckerpreis*$steigungsfaktor;
		setcookie("druckerpreis", $druckerpreis, time()+60*60*24*30);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}

//ZEITMASCHINE KAUFEN
if (isset($_REQUEST['zeitmaschine_y'])){

	$zeitmaschine_y=$_REQUEST['zeitmaschine_y'];
	if ($zeitmaschine_y>0){
	
	//ZEITMASCHINE adden
	if($geld>=$zeitmaschinenpreis){
		$geld=$geld-$zeitmaschinenpreis;
		$zeitmaschinenanzahl++;
		setcookie("geldmenge", $geld, time()+60*60*24*30);
		setcookie("zeitmaschinenanzahl", $zeitmaschinenanzahl, time()+60*60*24*30);
		
		//neuen ZEITMASCHINE preis berechnen
		$zeitmaschinenpreis=$zeitmaschinenpreis*$steigungsfaktor;
		setcookie("zeitmaschinenpreis", $zeitmaschinenpreis, time()+60*60*24*30);
			echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
	}
}
}


	
//RESET BUTTON
if (isset($_REQUEST['reset_y'])){
$reset_y=$_REQUEST['reset_y'];

if ($reset_y>0){
	setcookie("geldmenge", 0, time()+60);//für 60 sek, da wert sowieso resetet
	setcookie("flaschenanzahl", 0, time()+60);
	setcookie("flaschenpreis", 2, time()+60);
	setcookie("omaanzahl", 0, time()+60);
	setcookie("omapreis", 250, time()+60);
	setcookie("fabrikanzahl", 0, time()+60);
	setcookie("fabrikpreis", 1000, time()+60);
	setcookie("bankanzahl", 0, time()+60);
	setcookie("bankpreis",12500 , time()+60);
	setcookie("druckeranzahl", 0, time()+60);
	setcookie("druckerpreis", 25000, time()+60); 
	setcookie("zeitmaschinenanzahl", 0, time()+60);
	setcookie("zeitmaschinenpreis", 50000, time()+60); 
	//Seite neuladem,damit werte entgültig 0
	echo "<meta http-equiv='refresh' content='0; URL=geld.php'>";
}
}




$geldpc = 0.01+$flaschenpc+$omapc+$fabrikpc+$bankpc+$druckerpc+$zeitmaschinenpc;

//GELDMÜNZE
echo "<center><form method='Post'>";
	if($geldpc==0.01){
	echo"<input type='image' src='images/1c.png'  name='geld' ><br>";
	}
		elseif($geldpc<0.02){
		echo "<input type='image' src='images/1c.png' width='100' length='100' name='geld' ><br>";
	}
		elseif($geldpc<0.05){
		echo "<input type='image' src='images/2c.png'  width='100' length='100' name='geld' ><br>";
	}
		elseif($geldpc<0.10){
		echo "<input type='image' src='images/5c.png'  width='100' length='100' name='geld' ><br>";
	}
		elseif($geldpc<0.20){
		echo "<input type='image' src='images/10c.png'  width='100' length='100' name='geld' ><br>";
	}
		elseif($geldpc<0.50){
		echo "<input type='image' src='images/20c.png' width='100' length='100'  name='geld' ><br>";
	}
		elseif($geldpc<1){
		echo "<input type='image' src='images/50c.png' width='200' length='200' name='geld' ><br>";
	}
		elseif($geldpc<2){
		echo "<input type='image' src='images/geld.png' width='200' length='200' name='geld' ><br>";
	}
		elseif($geldpc<5){
		echo "<input type='image' src='images/2e.png' width='200' length='200' name='geld' ><br>";
	}	
		elseif($geldpc<10){
		echo "<input type='image' src='images/5e.png'  name='geld' ><br>";
	}
		elseif($geldpc<20){
		echo "<input type='image' src='images/10e.png' name='geld' ><br>";
	}
		elseif($geldpc<50){
		echo "<input type='image' src='images/20e.png'  name='geld' ><br>";
	}
		elseif($geldpc<100){
		echo "<input type='image' src='images/50e.png'  name='geld' ><br>";
	}
		elseif($geldpc<200){
		echo "<input type='image' src='images/100e.png'  name='geld' ><br>";
	}
		elseif($geldpc<500){
		echo "<input type='image' src='images/200e.png'  name='geld' ><br>";
	}
	else{
		echo "<input type='image' src='images/500e.png'  name='geld' ><br>";
	}
echo"</form></center>";

//Ausgabe	
	echo "<center><b><FONT FACE='Comic Sans MS'>".number_format(round($geld,2),2,'.',',')." $euro (".number_format($geldpc,2,'.',',')." $euro pro Klick)</FÒNT></b><br><br></center>"; 
	
?>



</body>
</html>