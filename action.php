<?php 
//Ziehe alle Werte, sofern nichts eingegeben/angetickt trage 0 bzw. NULL ein
//(P) Check nochmal wo bzw. wann Null besser geeignet ist.
//(P2) Abfragen ggf. anfaellig für sql-injection und Sicherheit der db tendiert gegen 0
$user = (isset($_POST['user']) ? $_POST['user'] : 'Bernd');
$frage1 = (isset($_POST['frageitalien']) ? $_POST['frageitalien'] : 0);
$frage2 = (isset($_POST['länder']) ? $_POST['länder'] : 0);

$frage3array = array();
if (isset($_POST['Bus'])) array_push($frage3array, $_POST['Bus']);
if (isset($_POST['Zug'])) array_push($frage3array, $_POST['Zug']);
if (isset($_POST['Flugzeug'])) array_push($frage3array, $_POST['Flugzeug']);
if (isset($_POST['Auto'])) array_push($frage3array, $_POST['Auto']);
if (isset($_POST['Schiff'])) array_push($frage3array, $_POST['Schiff']);
$frage3 = implode(",", $frage3array);

$frage4 = (isset($_POST['ziele']) ? $_POST['ziele'] : 0);
$frage5 = (isset($_POST['lieblingsland']) ? $_POST['lieblingsland'] : NULL);

error_reporting(E_ALL); //Error Reporting: E_ALL oder 0= Disable. All für Debugging
$dbconn = new mysqli('sql.t2.cit116.xyz', 'dev-urlaub', 'webdev2022', 'dev-urlaub');
print_r ($dbconn->connect_error); //Prüfe DB Verbindung
 if ($dbconn->connect_errno) {
    die('Zugriff auf Datenbank nicht moeglich');
}

$checkuser= "SELECT 'user' FROM `urlaub-table` WHERE user = '{$user}' ";
$ergebnis = mysqli_query($dbconn, $checkuser);

if(mysqli_num_rows($ergebnis) >=1)
   {
    header( "refresh:3;url=fragen_mini.php" );
    echo"Sie haben bereits abgestimmt! Umleitung in 3 Sekunden";
   }

 else {
//Führe Eintragung in DB durch und prüfe ob erfolgreich  
$db = "
INSERT INTO `urlaub-table` (user,frage1,frage2,frage3,frage4,frage5) 
VALUES('{$user}','{$frage1}','{$frage2}','{$frage3}','{$frage4}','{$frage5}')
";

if ($dbconn->query($db) === TRUE) {
   header( "refresh:3;url=index.php" );
    echo "Vielen Dank für die Teilnahme!";
  } else {
    echo "Error: " . $db . "<br>" . $dbconn->error;
  }
  
$dbconn->close();
}
