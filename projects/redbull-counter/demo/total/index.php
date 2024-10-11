<?php
//#########################################

$redbulllimit = 40;
$c = $_GET['c'];

if ($c == "")
{
	$c = "dark";
}

//#########################################

$date = date("d.m.Y");

$csvFile = '../data/database.csv'; // Pfad zur CSV-Datei
$total = [];
$daily = [];
$total[0] = 0;
$total[1] = 0;
$total[2] = 0;
$daily[0] = 0;
$daily[1] = 0;
$daily[2] = 0;



$data = []; // Hier speichern wir die Daten aus der CSV-Datei

if (($handle = fopen($csvFile, 'r')) !== false) {
    // Zeilen der CSV-Datei lesen und in ein Array speichern
    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        $data[] = $row; // Jede Zeile als Array an $data anhängen
    }
    fclose($handle); // Datei schließen
}

$zeilen = count($data);
for ($i = 1; $i < $zeilen; $i++)
{
    $total[0] = $total[0] + $data[$i][1];
    $total[1] = $total[1] + $data[$i][2];
    $total[2] = $total[2] + $data[$i][3];

    if ($data[$i][0] = $date) 
    {
        $daily[0] = $data[$i][1];
        $daily[1] = $data[$i][2];
        $daily[2] = $data[$i][3];
    }
}

$base = max($total[0], $total[1], $total[2],);

if ($c == "light")
{
	$cc = "dark";
}

if ($c == "dark")
{
	$cc = "light";
}

/*$ra = rand(1, 10);
if ($ra == 4)
{$c = "gay";}

if ($c == "gay")
{$cc= "gay";}*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>RedBull Counter</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $c?>.css">
</head>
<body>
<div id="title">
    <table id="titletable" border="0">
    <tr>
        <th><img src="../ressources/<?php if ($c =="gay") {echo "lgbtq.png";} else {echo "lgt.png";}?>" id="lgt"></th>
		<th><img src="../ressources/<?php if ($c =="gay") {echo "gaybull.png";} else {echo "redbull.png";}?>" id="rb"></th>
        <th><h1>Totale Ansicht</h1></th>
        <th><a href="../daily"><button id="totalbutton"><h1>Ansicht wechseln</h1></button></a></th>
		<th><h2>
        <form method="get" action=".">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="c" value="<?php echo $cc?>">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="cbutton"><h1>Theme wechseln</h1></button>
        </form>
        </h2></th>
    </tr>
</table>
</div>

<div id="luis">
<table id="luistable" border="0">
    <tr>
        <th><h1>Luis</h1></th>
        <th><h2><?php echo $total[0]; if($total[0] == 1) {echo " Dose";} else {echo " Dosen";}?></h2></th>
        <th><h2><?php echo $total[0] * 0.25; ?>l RedBull</h2></th>
		<th><h2><?php echo $total[0] * 10; ?>g Zucker</h2></th>
		<th><h2><?php if ($total[0] < $redbulllimit) {echo round(($total[0] / 48) * 100) ;}else {echo "100";} ?>% / 48</h2></th>
		<th><h2>CHF <?php echo $total[0] * 1.50; ?></h2></th>
	</tr>
</table>
<img src="../ressources/luis/tcb.png" id="luiscb">
<img src="../ressources/luis/<?php if ($c =="gay") {echo "gay.png";} else {echo "tcp.png";}?>" id="luiscp" width=<?php if ($total[0] < $redbulllimit) {echo ($total[0] / $base) * 100 ;}else {echo "100";} ?>%>
</div>

<div id="theo">
<table id="luistable" border="0">
    <tr>
        <th><h1>Theo</h1></th>
        <th><h2><?php echo $total[1]; if($total[1] == 1) {echo " Dose";} else {echo " Dosen";}?></h2></th>
        <th><h2><?php echo $total[1] * 0.25; ?>l RedBull</h2></th>
		<th><h2><?php echo $total[1] * 10; ?>g Zucker</h2></th>
		<th><h2><?php if ($total[1] < $redbulllimit) {echo round (($total[1] / 48) * 100) ;}else {echo "100";} ?>% / 48</h2></th>
		<th><h2>CHF <?php echo $total[1] * 1.50; ?></h2></th>
	</tr>
</table>
<img src="../ressources/theo/tcb.png" id="theocb">
<img src="../ressources/theo/<?php if ($c =="gay") {echo "gay.png";} else {echo "tcp.png";}?>" id="theocp" width=<?php if ($total[1] < $redbulllimit) {echo ($total[1] / $base) * 100 ;}else {echo "100";} ?>%>
</div>

<div id="nico">
<table id="luistable" border="0">
    <tr>
        <th><h1>Nico</h1></th>
        <th><h2><?php echo $total[2]; if($total[2] == 1) {echo " Dose";} else {echo " Dosen";}?></h2></th>
        <th><h2><?php echo $total[2] * 0.25; ?>l RedBull</h2></th>
		<th><h2><?php echo $total[2] * 10; ?>g Zucker</h2></th>
		<th><h2><?php if ($total[2] < $redbulllimit) {echo round (($total[2] / 48) * 100) ;}else {echo "100";} ?>% / 48</h2></th>
		<th><h2>CHF <?php echo $total[2] * 1.50; ?></h2></th>
	</tr>
</table>
<img src="../ressources/nico/tcb.png" id="nicocb">
<img src="../ressources/nico/<?php if ($c =="gay") {echo "gay.png";} else {echo "tcp.png";}?>" id="nicocp" width=<?php if ($total[2] < $redbulllimit) {echo ($total[2] / $base) * 100 ;}else {echo "100";} ?>%>
</div>

<div id="sum">
<table id="luistable" border="0">
    <tr>
        <th><h1>Summe</h1></th>
        <th><h2><?php echo $total[1] + $total[2] + $total[0]; ?> / 48 Dosen</h2></th>
		<th><h2><?php echo ($total[1] + $total[2] + $total[0]) * 0.25; ?>l RedBull</h2></th>
    </tr>
</table>
<img src="../ressources/ncb.png" id="nicocb">
<img src="../ressources/<?php if ($c =="gay") {echo "gay.png";} else {echo "ncp.png";}?>" id="nicocp" width=<?php echo ($total[1] + $total[2] + $total[0]) /48 * 100 ; ?>%>
</div>
<div id="cp">
<h6>© Copyright by Luis Vesti (2023-2024). All rights reserved. luisvesti.com</h6>
</div>


</body>

</html>