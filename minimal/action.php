<?php 
//Ziehe alle Werte, sofern nichts eingegeben/angetickt trage 0 bzw. NULL ein
//(P) Check nochmal wo bzw. wann Null besser geeignet ist.
//(P2) Abfragen ggf. anfaellig für sql-injection und Sicherheit der db tendiert gegen 0
$user = $_POST ['user'];
$frage1 = (isset($_POST['frageitalien']) ? $_POST['frageitalien'] : 0);
$frage2 = (isset($_POST['länder']) ? $_POST['länder'] : 0);

$frage3bus = (isset($_POST['Bus']) ? $_POST['Bus'] : 0);
$frage3zug = (isset($_POST['Zug']) ? $_POST['Zug'] : 0);
$frage3flugzeug = (isset($_POST['Flugzeug']) ? $_POST['Flugzeug'] : 0);
$frage3auto = (isset($_POST['Auto']) ? $_POST['Auto'] : 0);
$frage3schiff = (isset($_POST['Schiff']) ? $_POST['Schiff'] : 0);

$frage4 = (isset($_POST['ziele']) ? $_POST['ziele'] : 0);
$frage5 = (isset($_POST['lieblingsland']) ? $_POST['lieblingsland'] : NULL);

error_reporting(E_ALL); //Error Reporting: E_ALL oder 0= Disable. All für Debugging
$dbconn = new mysqli('localhost', 'dev-urlaub', 'webdev', 'devurlaub');
print_r ($dbconn->connect_error); //Prüfe DB Verbindung
 if ($dbconn->connect_errno) {
    die('Zugriff auf Datenbank nicht moeglich');
}

$checkuser= "SELECT user FROM urlaub WHERE user='{$user}' ";
$ergebnis = mysqli_query($dbconn, $checkuser);

if(mysqli_num_rows($ergebnis) >=1)
   {
    echo"EY!!! Du hast schon abgestimmt! :O";
   }

 else {
//Führe Eintragung in DB durch und prüfe ob erfolgreich  
$db = "
INSERT INTO urlaub (user,frage1,frage2,frage3,frage4,frage5) 
VALUES('{$user}','{$frage1}','{$frage2}','{$frage3bus}','{$frage4}','{$frage5}')
";

if ($dbconn->query($db) === TRUE) {
    echo "Eintrag erstellt";
  } else {
    echo "Error: " . $db . "<br>" . $dbconn->error;
  }
  
$dbconn->close();
}
            ?>