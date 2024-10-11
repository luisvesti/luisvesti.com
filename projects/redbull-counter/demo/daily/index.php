<?php
//#########################################

$redbulllimit = 5;
$com = 0;
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

    if ($data[$i][0] == $date) 
    {
        $daily[0] = $data[$i][1];
        $daily[1] = $data[$i][2];
        $daily[2] = $data[$i][3];
        $com = 1;
    }
    else
    {
        $daily[0] = 0;
        $daily[1] = 0;
        $daily[2] = 0;
    }
}

if ($com != 1)
{
    $data[$zeilen + 1][0] = $date;
    $data[$zeilen + 1][1] = 0;
    $data[$zeilen + 1][2] = 0;
    $data[$zeilen + 1][3] = 0;
}

//echo '<pre>';
//print_r($data);
//echo '</pre>';

if ($c == "light")
{
	$cc = "dark";
}

if ($c == "dark")
{
	$cc = "light";
}

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
        <th><img src="../ressources/lgt.png" id="lgt"></th>
		<th><img src="../ressources/redbull.png" id="rb"></th>
        <th><h1>Tägliche Ansicht</h1></th>
        <th><a href="../total"><button id="totalbutton"><h1>Ansicht wechseln</h1></button></a></th>
		<th><h2>
        <form method="get" action=".">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="c" value="<?php echo $cc?>">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="cbutton"><h1>Theme wechseln</h1></button>
        </form>
        </h2></th>
        <th><h1><?php echo $date;?></h1></th>
    </tr>
</table>
</div>

<div id="luis">
<table id="luistable" border="0">
    <tr>
        <th><h1>Luis</h1></th>
        <th><h2><?php echo $daily[0]; if($daily[0] == 1) {echo " Dose";} else {echo " Dosen";} ?></h2></th>
        <th><h2><?php echo $daily[0] * 80; ?>mg Koffein</h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Luis">
        <input type="hidden" name="action" value="plus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="plusbutton">+</button>
        </form>
        </h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Luis">
        <input type="hidden" name="action" value="minus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="minusbutton">-</button>
        </form>
        </h2></th>
    </tr>
</table>
<img src="../ressources/luis/dcb.png" id="luiscb">
<img src="../ressources/luis/tcp.png" id="luiscp" width=<?php if ($daily[0] < $redbulllimit) {echo $daily[0] * (100 / $redbulllimit);}else {echo "100";} ?>%>
</div>

<div id="theo">
<table id="luistable" border="0">
    <tr>
        <th><h1>Theo</h1></th>
        <th><h2><?php echo $daily[1]; if($daily[1] == 1) {echo " Dose";} else {echo " Dosen";}?></h2></th>
        <th><h2><?php echo $daily[1] * 80; ?>mg Koffein</h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Theo">
        <input type="hidden" name="action" value="plus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="plusbutton">+</button>
        </form>
        </h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Theo">
        <input type="hidden" name="action" value="minus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="minusbutton">-</button>
        </form>
        </h2></th>
    </tr>
</table>
<img src="../ressources/theo/dcb.png" id="theocb">
<img src="../ressources/theo/tcp.png" id="theocp" width=<?php if ($daily[1] < $redbulllimit) {echo $daily[1] * (100 / $redbulllimit);}else {echo "100";} ?>%>
</div>

<div id="nico">
<table id="luistable" border="0">
    <tr>
        <th><h1>Nico</h1></th>
        <th><h2><?php echo $daily[2]; if($daily[2] == 1) {echo " Dose";} else {echo " Dosen";}?></h2></th>
        <th><h2><?php echo $daily[2] * 80; ?>mg Koffein</h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Nico">
        <input type="hidden" name="action" value="plus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="plusbutton">+</button>
        </form>
        </h2></th>
        <th><h2>
        <form method="get" action="../data/edit.php">
        <!-- Versteckte Felder für die Daten -->
        <input type="hidden" name="name" value="Nico">
        <input type="hidden" name="action" value="minus">
        <!-- Button zum Senden des GET-Requests -->
        <button type="submit" id="minusbutton">-</button>
        </form>
        </h2></th>
    </tr>
</table>
<img src="../ressources/nico/dcb.png" id="nicocb">
<img src="../ressources/nico/tcp.png" id="nicocp" width=<?php if ($daily[2] < $redbulllimit) {echo $daily[2] * (100 / $redbulllimit);}else {echo "100";} ?>%>
</div>
<div id="cp">
<h6>© Copyright by Luis Vesti (2023-2024). All rights reserved. luisvesti.com</h6>
</div>

</body>

</html>