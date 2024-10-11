<?php
$data = [];
$csvFile = '../data/database.csv';
$date = date("d.m.Y");
$com = 0;

if (($handle = fopen($csvFile, 'r')) !== false) 
{
    // Zeilen der CSV-Datei lesen und in ein Array speichern
    while (($row = fgetcsv($handle, 1000, ',')) !== false) 
    {
        $data[] = $row; // Jede Zeile als Array an $data anhängen
    }
    fclose($handle); // Datei schließen
}

$name = $_GET['name'];
$action = $_GET['action'];

switch ($name) 
{
    case "Luis":
        $x = 1;
        break;
    case "Theo":
        $x = 2;
        break;
    case "Nico":
        $x = 3;
        break;
    default:
        $error = 1;
}

if ($action == "plus")
{
$zeilen = count($data);
for ($i = 1; $i < $zeilen; $i++)
{
    if ($data[$i][0] == $date) 
    {
        $data[$i][$x] = $data[$i][$x] + 1;
        $com = 1;
    }
}
if ($com != 1)
{
    $data[$zeilen + 1][0] = $date;
    $data[$zeilen + 1][1] = 0;
    $data[$zeilen + 1][2] = 0;
    $data[$zeilen + 1][3] = 0;
    $data[$zeilen + 1][$x] = 1;
}
$com = 0;
}

if ($action == "minus")
{
$zeilen = count($data);
for ($i = 1; $i < $zeilen; $i++)
{
    if ($data[$i][0] == $date) 
    {
        if ($data[$i][$x] != 0)
        {
        $data[$i][$x] = $data[$i][$x] - 1;
        }
    }
}
$com = 0;
}

file_put_contents($csvFile, "");

$handle = fopen($csvFile, 'a');

foreach ($data as $datensatz) {
    fputcsv($handle, $datensatz);
}

fclose($handle);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting</title>
</head>
<body>

<!-- JavaScript-Code für die automatische Weiterleitung -->
<script>
// Funktion für die automatische Weiterleitung nach einer Sekunde
function automatischeWeiterleitung() {
    // Die URL der anderen Webseite
    var zielWebseite = '../daily';

    // Warte 1000 Millisekunden (1 Sekunde) und leite dann weiter
    setTimeout(function() {
        window.location.href = zielWebseite;
    }, 500);
}

// Automatische Weiterleitung aufrufen
automatischeWeiterleitung();
</script>

</body>
</html>
