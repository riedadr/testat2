<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/fragen.css">
  <title>Document</title>
</head>

<body id="action">


  <div class="msg">
    <?php
    //Ziehe alle Werte, sofern nichts eingegeben/angetickt trage 0 bzw. NULL ein
    //(P) Check nochmal wo bzw. wann Null besser geeignet ist.
    //(P2) Abfragen ggf. anfaellig für sql-injection und Sicherheit der db tendiert gegen 0
    $user = (isset($_POST['user']) && strlen($_POST['user']) > 0 ? $_POST['user'] : 'Anon'.time());
    $frage1 = (isset($_POST['frageitalien']) ? 1 : 0);
    $frage2 = (isset($_POST['länder']) && $_POST['länder'] >= 1  ? $_POST['länder'] : 1);

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
    print_r($dbconn->connect_error); //Prüfe DB Verbindung
    if ($dbconn->connect_errno) {
      die('Zugriff auf Datenbank nicht moeglich');
    }

    $checkuser = "SELECT 'user' FROM `urlaub-table` WHERE user = '{$user}' ";
    $ergebnis = mysqli_query($dbconn, $checkuser);

    if (mysqli_num_rows($ergebnis) >= 1) {
      header( "refresh:5;url=fragen.php" );
      echo "Sie haben bereits abgestimmt!";
    } else {
      //Führe Eintragung in DB durch und prüfe ob erfolgreich  
      $db = "INSERT INTO `urlaub-table` (user,frage1,frage2,frage3,frage4,frage5) VALUES('{$user}','{$frage1}','{$frage2}','{$frage3}','{$frage4}','{$frage5}');";

      if ($dbconn->query($db) === TRUE) {
        header("refresh:5;url=index.php");
        echo "Vielen Dank für die Teilnahme!";
      } else {
        echo "Error: " . $db . "<br>" . $dbconn->error;
      }

      $dbconn->close();
    }
    ?>
    <p>Sie werden in <span id="timer">5</span> Sekunden weitergeleitet.</p>
    <div class="steuerung">
					<a href="/fragen.php" class="back">
						Zurück
					</a>
					<a href="/index.php" class="ok">Übersicht</a>
				</div>
    </div>

    <script type="text/javascript">
      let timer = document.getElementById("timer");
      let seconds = 5;

      setInterval(() => {
        countDown();
      }, 1000);
      
      function countDown() {
        seconds--;
        //falback bei PHP-Fehler
        if (seconds <= -1) window.location.href = "/";
        timer.innerText  = seconds;

      }
    </script>
    <script src="/theme.js"></script>

</body>

</html>