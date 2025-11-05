<?php

//Komentar je nach Stimmung
function mood($text) {
  if (preg_match('/traurig|schlecht/i', $text)) {
    return "Das ist unschön, dass dein Tag nicht so gut war. Morgen wird besser!";
  } elseif (preg_match('/glücklich|fröhlich|schön/i', $text)) {
  return "Das klingt nach einem tollen Tag!";
  } else {
  return "Danke für die Antwort.";
  }
}

// Begrüssung
$greeting = readline("Hallo! Wie war dein Tag heute? ");

//Verzweigung
$answer = mood($greeting);
echo $answer . chr(10);

// Schleife von den Aufgaben
$tasks = [];
echo "Welche Aufgaben hast du heute gemacht? (Gib 'fertig' ein, zum Beenden)". chr(10);
while (true) {
    $singletask = readline("Aufgabe:");
    if ($singletask == "fertig") {
      break;
    }
    $tasks[] = $singletask;
}

// Eintrag speichern in .txt file
$date = date("dmy");
$filename = "journal_" . $date . ".txt";
$content = "Eintrag:" . chr(10) . $greeting . chr(10) . chr(10) . "Antwort:" . chr(10) . $answer . chr(10) . chr(10) . "Aufgaben:" . chr(10);
foreach ($tasks as $taskinfile) {
  $content .= "- $taskinfile" . chr(10);
}
file_put_contents($filename, $content);

echo "Dein Journal wurde gespeichert in: $filename" . chr(10);
