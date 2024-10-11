<?php
// Dein OpenAI API-Schlüssel
$api_key = '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';

// Die API-URL für die Bildgenerierung
$url = "https://api.openai.com/v1/images/generations";

// Die Daten für die API-Anfrage (hier wird ein Text-Prompt gesendet)
$data = [
    'prompt' => 'A futuristic cityscape at sunset with flying cars', // Beispiel Prompt
    'n' => 1, // Anzahl der Bilder
    'size' => '1024x1024' // Bildgröße
];

// Initialisiere cURL
$ch = curl_init($url);

// Setze die cURL Optionen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Führe die Anfrage aus
$response = curl_exec($ch);

// Schließe cURL
curl_close($ch);

// Dekodiere die JSON-Antwort
$response_data = json_decode($response, true);

// Überprüfe, ob das Bild erfolgreich generiert wurde
if(isset($response_data['data'][0]['url'])) {
    // Die URL des generierten Bildes
    $image_url = $response_data['data'][0]['url'];

    // Datei herunterladen und speichern
    $image_data = file_get_contents($image_url);
    $image_name = 'generated_image.png'; // Beispiel Dateiname
    file_put_contents($image_name, $image_data);

    echo "Bild erfolgreich heruntergeladen und gespeichert: " . $image_name;
} else {
    echo "Fehler bei der Bildgenerierung: " . $response_data['error']['message'];
}
?>
