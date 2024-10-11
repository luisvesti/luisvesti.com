<?php
// Überprüfen, ob Daten über GET gesendet wurden
if (isset($_GET['name']) && isset($_GET['action'])) 
{
    // Daten aus dem $_GET-Array abrufen
    $name = $_GET['name'];
    $action = $_GET['action'];
} 
else 
{
    echo "Fehler erkannt!";
}

$date = date("d.m.Y");
$csvFile = '../data/database.csv';
$data = []; // Hier speichern wir die Daten aus der CSV-Datei
$namenumber = 0;

if (($handle = fopen($csvFile, 'r')) !== false) {
    // Zeilen der CSV-Datei lesen und in ein Array speichern
    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        $data[] = $row; // Jede Zeile als Array an $data anhängen
    }
    fclose($handle); // Datei schließen
}

if ($name == 'Luis')
{$namenumber = 1;}
if ($name == 'Theo')
{$namenumber = 2;}
if ($name == 'Nico')
{$namenumber = 3;}

for ($i = 1; $i < $zeilen; $i++)
{
    $total[0] = $total[0] + $data[$i][1];
    $total[1] = $total[1] + $data[$i][2];
    $total[2] = $total[2] + $data[$i][3];

    if ($data[$i][0] = "14.12.2023") 
    {
        $daily[0] = $data[$i][1];
        $daily[1] = $data[$i][2];
        $daily[2] = $data[$i][3];
    }
    else
    {
        $daily[0] = 0;
        $daily[1] = 0;
        $daily[2] = 0;
    }
}



$csvFile = 'deine_datei.csv';

// Die CSV-Datei öffnen oder erstellen und den vorherigen Inhalt löschen
file_put_contents($csvFile, '');

// Die CSV-Datei zum Schreiben öffnen
$handle = fopen($csvFile, 'w');

// Daten in die CSV-Datei schreiben
foreach ($newData as $data) {
    fputcsv($handle, $data);
}

// Die CSV-Datei schließen
fclose($handle);

?>