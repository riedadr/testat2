<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB-Test</title>
</head>

<body>
    <h1>DB-Test</h1>
    <p>g</p>
    <?php
    $servername = "sql.t2.cit116.xyz";
    $username = "dev-urlaub";
    $password = "webdev2022";
    $dbname = "dev-urlaub";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, user, frage1, frage2, frage3, frage4, frage5 FROM 'urlaub-table'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "entry: " . $row["id"] . " | " . $row["user"] . " | " . $row["frage1"] . " | " . $row["frage2"] . " | " . $row["frage3"] . " | " . $row["frage4"] . " | " . $row["frage5"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
</body>

</html>