<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="walking-duck.gif" type="image/gif" >
	<link rel="stylesheet" href="/styles/dashboard.css" />
	<title>Umfrage</title>
</head>

<body>

	<!-- Hintergrund von CodePen (codepen.io/pehaa/pen/yLVeLNg); Änderungen für Dark Theme-->
	<div class="landscape">
		<div class="sky">
			<div id="bg"></div>
			<div id="light">
				<div class="sun"></div>
				<div class="moon"></div>
			</div>
		</div>
		<div class="cloud"></div>
		<div class="cloud cloud-1"></div>
		<div class="water">
			<div id="bg"></div>
		</div>
		<div class="splash"></div>
		<div class="splash delay-1"></div>
		<div class="splash delay-2"></div>
		<div class="splash splash-4 delay-2"></div>
		<div class="splash splash-4 delay-3"></div>
		<div class="splash splash-4 delay-4"></div>
		<div class="splash splash-stone delay-3"></div>
		<div class="splash splash-stone splash-4"></div>
		<div class="splash splash-stone splash-5"></div>
		<div class="lotus lotus-1"></div>
		<div class="lotus lotus-2"></div>
		<div class="lotus lotus-3"></div>
		<div class="front">
			<div class="stone"></div>
			<div class="grass"></div>
			<div class="grass grass-1"></div>
			<div class="grass grass-2"></div>
			<div class="reed"></div>
			<div class="reed reed-1"></div>
		</div>
	</div>

	<!-- Ab hier Seiteninhalt -->
	<section>
		<header>
			<h1>Ergebnisse</h1>
			<button id="themeBtn" title="switch theme" onclick="switchTheme()"></button>
		</header>
		<main>
			<div id="database" style="display: none;">
				<div class="flex-between">
					<h1>Datenbank</h1>
					<button class="red transparent" onclick="toggleDB()">
						<i class="fa-solid fa-xmark"></i>
					</button>

				</div>

				<table class="width-full">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Frage 1</th>
						<th>Frage 2</th>
						<th>Frage 3</th>
						<th>Frage 4</th>
						<th>Frage 5</th>
					</tr>

					<?php
					$servername = "sql.t2.cit116.xyz";
					$username = "dev-urlaub";
					$password = "webdev2022";
					$dbname = "dev-urlaub";

					$db = mysqli_connect($servername, $username, $password, $dbname);
					if (!$db) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT id, user, frage1, frage2, frage3, frage4, frage5 FROM `urlaub-table`";
					$result = mysqli_query($db, $sql);

					$count = 0;
					$fr1_italien = 0;

					$fr2_min = 999;
					$fr2_sum = 0;
					$fr2_max = 0;

					$fr3_bus = $fr3_zug = $fr3_flugzeug = $fr3_auto = $fr3_schiff = 0;

					$fr4_see = $fr4_meer = $fr4_berge = $fr4_stadt = $fr4_land = 0;

					$fr5_arr = [];

					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while ($row = mysqli_fetch_assoc($result)) {
							$count++;

							$fr1_italien = $fr1_italien + $row["frage1"];

							$fr2_min = min($fr2_min, $row["frage2"]);
							$fr2_sum = $fr2_sum + $row["frage2"];
							$fr2_max = max($fr2_max, $row["frage2"]);

							$verkehrsmittel = explode(",", $row["frage3"]);
							if (in_array("Bus", $verkehrsmittel)) $fr3_bus++;
							if (in_array("Zug", $verkehrsmittel)) $fr3_zug++;
							if (in_array("Flugzeug", $verkehrsmittel)) $fr3_flugzeug++;
							if (in_array("Auto", $verkehrsmittel)) $fr3_auto++;
							if (in_array("Schiff", $verkehrsmittel)) $fr3_schiff++;

							switch ($row["frage4"]) {
								case "See":
									$fr4_see++;
									break;
								case "Meer":
									$fr4_meer++;
									break;
								case "Berge":
									$fr4_berge++;
									break;
								case "Stadt":
									$fr4_stadt++;
									break;
								case "Land":
									$fr4_land++;
									break;
								default:
									break;
							}


							$fr5_ort = $row["frage5"];
							@$fr5_arr += [$fr5_ort => $fr5_arr[$fr5_ort]++];



							echo "<tr><td>" . $row["id"] . "</td><td>" . $row["user"] . "</td><td>" . $row["frage1"] . "</td><td>" . $row["frage2"] . "</td><td>" . $row["frage3"] . "</td><td>" . $row["frage4"] . "</td><td>" . $row["frage5"] . "</td></tr>";
						}
					} else {
						echo "0 results";
					}

					mysqli_close($db);

					//INSERT INTO `urlaub-table` (`id`, `user`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`) VALUES (NULL, 'Bernd', '1', '7', 'Bus,Flugzeug,Auto,Zug', 'Meer', 'Malta');
					?>
				</table>
			</div>
			<ul id="dashboard">
				<li id="fr1">
					<h2>Frage 1:</h2>
					<p>Warst Du bereits in Italien?</p>
					<div class="result">
						<div class="flex-between">
							<p>Ja: <span class="bold green"><?= $fr1_italien ?></span></p>
							<p>Nein: <span class="bold red"><?= $count - $fr1_italien ?></span></p>
						</div>
						<progress class="width-full" value="<?= $fr1_italien ?>" max="<?= $count ?>"></progress>
					</div>
				</li>

				<li id="fr2">
					<h2>Frage 2:</h2>
					<p>
						Wie viele verschiedene Länder hast Du bereits
						besucht?
					</p>
					<div class="result">
						<p>Jeder Teilnehmer hat mindestens <span class="bold blue"><?= $fr2_min ?></span> und durchschnittlich
							<span class="bold green"><?= number_format($fr2_sum / $count, 0) ?></span> Länder besucht.
						</p>
						<p>Die Maximalanzahl besuchter Länder beträgt <span class="bold orange"><?= $fr2_max ?></span>.</p>
					</div>
				</li>

				<li id="fr3">
					<h2>Frage 3:</h2>
					<p>
						Welche Verkehrsmittel hast Du bisher benutzt, um an
						deinen Urlaubsort zu kommen?
					</p>
					<div class="result">
						<table class="width-full">
							<tr>
								<th>Verkehrsmittel</th>
								<th>Anzahl</th>
							</tr>
							<tr>
								<td>Bus</td>
								<td><?= $fr3_bus ?></td>
							</tr>
							<tr>
								<td>Zug</td>
								<td><?= $fr3_zug ?></td>
							</tr>
							<tr>
								<td>Flugzeug</td>
								<td><?= $fr3_flugzeug ?></td>
							</tr>
							<tr>
								<td>Auto</td>
								<td><?= $fr3_auto ?></td>
							</tr>
							<tr>
								<td>Schiff</td>
								<td><?= $fr3_schiff ?></td>
							</tr>
						</table>
					</div>
				</li>

				<li id="fr4">
					<h2>Frage 4:</h2>
					<p>Wo machst Du am liebsten Urlaub?</p>
					<div class="result flex-between">
						<table class="width-full">
							<tr>
								<th>Ort</th>
								<th>Anzahl</th>
							</tr>
							<tr class="violet">
								<td>See</td>
								<td><?= $fr4_see ?></td>
							</tr>
							<tr class="blue">
								<td>Meer</td>
								<td><?= $fr4_meer ?></td>
							</tr>
							<tr class="green">
								<td>Berge</td>
								<td><?= $fr4_berge ?></td>
							</tr>
							<tr class="orange">
								<td>Land</td>
								<td><?= $fr4_land ?></td>
							</tr>
							<tr class="red">
								<td>Stadt</td>
								<td><?= $fr4_stadt ?></td>
							</tr>
						</table>
						<div id="pie-chart"></div>
						<?php
						$fr4_see_deg = ($fr4_see / $count) * 360;
						$fr4_meer_deg = $fr4_see_deg + ($fr4_meer / $count) * 360;
						$fr4_berge_deg = $fr4_meer_deg + ($fr4_berge / $count) * 360;
						$fr4_land_deg = $fr4_berge_deg + ($fr4_land / $count) * 360;
						$fr4_stadt_deg = $fr4_land_deg + ($fr4_stadt / $count) * 360;
						?>
						<style>
							#pie-chart {
								height: 200px;
								aspect-ratio: 1;
								border-radius: 50%;
								background-image: conic-gradient(var(--violet) 0 <?= $fr4_see_deg ?>deg,
										var(--blue) 0 <?= $fr4_meer_deg ?>deg,
										var(--green) 0 <?= $fr4_berge_deg ?>deg,
										var(--orange) 0 <?= $fr4_land_deg ?>deg,
										var(--red) 0 <?= $fr4_stadt_deg ?>deg);
							}
						</style>
					</div>
				</li>

				<li id="fr5">
					<h2>Frage 5:</h2>
					<p>In welchem Land hat es Dir bisher am besten gefallen?</p>
					<div class="result">
						<ul>
							<?php
							foreach ($fr5_arr as $key => $value) {
								echo "<li>$key ($value)</li>";
							}

							?>
						</ul>
					</div>
				</li>
			</ul>
		</main>
		<footer>
			<button id="db" onclick="toggleDB()">
				<i class="fa-solid fa-database"></i> DB
			</button>
			<a href="/fragen.html">
				An Umfrage teilnehmen
				<i class="fa-solid fa-play"></i>
			</a>
			<button onclick="toggleInfo()">
				<i class="fa-solid fa-circle-info"></i> Info
			</button>
		</footer>
	</section>
	<section id="info" style="display: none;">
		<div class="modal">
			<div class="flex-between">
				<h1>Informationen</h1>
				<button class="red transparent" onclick="toggleInfo()">
					<i class="fa-solid fa-xmark"></i>
				</button>
			</div>
			<p>Diese Umfrage wurde im Rahmen des zweiten Testats für Web-Development 1 von Adrian Riedel und Christopher Förster erstellt.
				Unter <a href="https://t2.cit116.xyz" target="_blank" rel="noopener noreferrer">t2.cit116.xyz</a> ist eine funktionierende Onlineversion aufrufbar.
				Die Dateien dieser Umfrage sind ebenfalls auf <a href="https://github.com/riedadr/testat2" target="_blank" rel="noopener noreferrer">GitHub</a> verfügbar.
			</p>
			<h2>Hinweise</h2>
			<p>Um mögliche Anzeigefehler zu vermeiden, deaktivieren Sie bitte den Dark Reader für diese Seite, falls Sie diese Erweiterung nutzen.</p>
			<ul>
				<li>Icons von <a href="https://fontawesome.com/" target="_blank" rel="noopener noreferrer">Fontawesome</a></li>
				<li>Favicon von <a href="https://tenor.com/view/pato-juan-gif-23189651" target="_blank" rel="noopener noreferrer">tenor</a></li>
				<li>Hintergrund von <a href="https://codepen.io/pehaa/pen/yLVeLNg" target="_blank" rel="noopener noreferrer">codepen.io</a>; übernommen wurden Sonne, Wolken und Pflanzen. Himmel und Meer wurden für dark/light Mode überarbeitet.</li>


			</ul>

			<a id="start-btn" href="/fragen.html">
				An Umfrage teilnehmen
				<i class="fa-solid fa-play"></i>
			</a>
		</div>
	</section>
	<script type="text/javascript">
		if (!localStorage.visited) toggleInfo();
		localStorage.visited = true;

		function toggleDB() {
			const db = document.getElementById("database");
			let toggle = db.style.display === "none" ? "block" : "none";
			db.style.display = toggle;
		}

		function toggleInfo() {
			const info = document.getElementById("info");
			let toggle = info.style.display === "none" ? "block" : "none";
			info.style.display = toggle;
		}
	</script>

	<script src="theme.js"></script>

	<!-- Skript für Fontawesome Icons -->
	<script src="https://kit.fontawesome.com/2d1e021d85.js" crossorigin="anonymous"></script>
</body>

</html>
