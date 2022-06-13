<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="fragen-mini.css" />
		<title>Umfrage</title>
	</head>

	<body>

		<header>
			<h1>Fragen</h1>
			<button
				id="themeBtn"
				title="switch theme"
				onclick="switchTheme()"
			></button>
		</header>
		<form action="action.php" method=post>
		<main id="fragen">
			<section class="frage" id="section0">
				<div class="inhalt">
					<h1>Nutzername:</h1>
					<p>Wie heißt du?</p>

					<div class="antwort">
						<input class="w-full" type="text" name="user" id="userInput" />
					</div>
				</div>
				<div class="steuerung">
					<button
						type="button"
						class="ok w-full"
						onclick="scrollToArea(1)"
					>
						Starten
					</button>
				</div>
			</section>

			<section class="frage" id="section1">
				<div class="inhalt">
					<h1>Frage 1:</h1>
					<p>Warst du bereits in Italien?</p>

					<div class="antwort">
						<label class="switch">
							<input type="checkbox" value="0" name="frageitalien" id="italienInput" />
							<span class="slider"></span>
						</label>
					</div>
				</div>
				<div class="steuerung">
					<button type="button" class="back" onclick="scrollToArea(0)">
						Zurück
					</button>
					<button type="button" class="ok" onclick="scrollToArea(2)">Weiter</button>
				</div>
			</section>

			<section class="frage" id="section2">
				<div class="inhalt">
					<h1>Frage 2:</h1>
					<p>Wie viele verschieden Länder hast du bereits besucht?</p>

					<div class="antwort">
						<p>Gib eine Zahl ein</p>
						<input type="number" id="länderInput" name="länder" />
					</div>
				</div>
				<div class="steuerung">
					<button type="button" class="back" onclick="scrollToArea(1)">
						Zurück
					</button>
					<button type="button" class="ok" onclick="scrollToArea(3)">Weiter</button>
				</div>
			</section>

			<section class="frage" id="section3">
				<div class="inhalt">
					<h1>Frage 3:</h1>
					<p>
						Welche Verkehrsmittel hast du bisher benutzt, um an
						deinen Urlaubsort zu kommen?
					</p>

					<div class="antwort" id="verkehrsmittel">
							<div>
								<input
									type="checkbox"
									id="Bus"
									name="Bus"
									value="Bus"
								/>
								<label for="Bus">🚌 Bus</label>
							</div>

							<div>
								<input
									type="checkbox"
									id="Zug"
									name="Zug"
									value="Zug"
									
								/>
								<label for="Zug">🚂 Zug</label>
							</div>

							<div>
								<input
									type="checkbox"
									id="Flugzeug"
									name="Flugzeug"
									value="Flugzeug"
									
								/>
								<label for="Flugzeug">✈️ Flugzeug</label>
							</div>
							<div>
								<input
									type="checkbox"
									id="Auto"
									name="Auto"
									value="Auto"
								/>
								<label for="Auto">🚗 Auto</label>
							</div>
							<div>
								<input
									type="checkbox"
									id="Schiff"
									name="Schiff"
									value="Schiff"
								/>
								<label for="Schiff">🛥️ Schiff</label>
							</div>
					</div>
				</div>
				<div class="steuerung">
					<button type="button" class="back" onclick="scrollToArea(2)">
						Zurück
					</button>
					<button type="button" class="ok" onclick="scrollToArea(4)">Weiter</button>
				</div>
			</section>

			<section class="frage" id="section4">
				<div class="inhalt">
					<h1>Frage 4:</h1>
					<p>Wo machst du am liebsten Urlaub?</p>

					<div class="antwort" id="lieblingsziele">

							<div>
								<input
									type="radio"
									id="See"
									name="ziele"
									value="See"
								/>
								<label for="See">🏞️ See</label>
							</div>

							<div>
								<input
									type="radio"
									id="Meer"
									name="ziele"
									value="Meer"
								/>
								<label for="Meer">🏖️ Meer</label>
							</div>

							<div>
								<input
									type="radio"
									id="Berge"
									name="ziele"
									value="Berge"
								/>
								<label for="Berge">🏔️ Berge</label>
							</div>
							<div>
								<input
									type="radio"
									id="Land"
									name="ziele"
									value="Land"
								/>
								<label for="Land">🏘️ Land</label>
							</div>
							<div>
								<input
									type="radio"
									id="Stadt"
									name="ziele"
									value="Stadt"
								/>
								<label for="Stadt">🏙️ Stadt</label>
							</div>
					</div>
				</div>

				<div class="steuerung">
					<button type="button" class="back" onclick="scrollToArea(3)">
						Zurück
					</button>
					<button class="ok" onclick="scrollToArea(5)">Weiter</button>
				</div>
			</section>

			<section class="frage" id="section5">
				<div class="inhalt">
					<h1>Frage 5:</h1>
					<p>In welchem Land hat es dir bisher am besten gefallen?</p>

					<div class="antwort">
						<input
							type="text"
							id="lieblingsland"
							name="lieblingsland"
							class="w-full"
							placeholder="z.B. Italien, Österreich oder Spanien"
						/>
					</div>
				</div>
				
				<div class="steuerung">
					<button type="button" class="back" onclick="scrollToArea(4)">
						Zurück
					</button>
				
					<button type="button" class="ok" onclick="senden()">Abschicken</button>
				</div>
			</section>

		</form>	
		</main>
		<footer>
			<button class="nav-btn" id="active" onclick="scrollToArea(0)">
				Name
			</button>
			<button type="button" class="nav-btn" onclick="scrollToArea(1)">Frage 1</button>
			<button type="button" class="nav-btn" onclick="scrollToArea(2)">Frage 2</button>
			<button type="button" class="nav-btn" onclick="scrollToArea(3)">Frage 3</button>
			<button type="button" class="nav-btn" onclick="scrollToArea(4)">Frage 4</button>
			<button type="button" class="nav-btn" onclick="scrollToArea(5)">Frage 5</button>
		</footer>

		

		<script src="/theme.js"></script>
	<!--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
		<script type="text/javascript">
	        function keinEnterKey(evt) { 

				var evt = (evt) ? evt : ((event) ? event : null); 
				var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
				if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
			} 
		
			document.onkeypress = keinEnterKey; 


			const fragen = document.getElementById("fragen");
			const navBtns = document.getElementsByClassName("nav-btn");

			function scrollToArea(section) {
				let target = document.getElementById("section" + section);
				fragen.scrollLeft = target.offsetLeft - 16; //16 = padding von #fragen
				let i = 0;
				while (i < navBtns.length) {
					if (i == section) navBtns.item(i).id = "active";
					else navBtns.item(i).id = "";
					i++;
				}
			}

			function senden() {
				let user = document.getElementById("userInput").value;
				let frage1 = document.getElementById("italienInput").checked;
				let frage2 = document.getElementById("länderInput").value;
				let frage3 = getAntwort3();
				let frage4 = getAntwort4();
				let frage5 = document.getElementById("lieblingsland").value;

				console.log("🧑‍💻?", user);
				console.log("🍕?", frage1);
				console.log("🌍?", frage2);
				console.log("✈️?", frage3);
				console.log("📍?", frage4);
				console.log("❤️?", frage5);

		/*		$.ajax({
            type: 'post',
            url: 'action.php',
			data : { user , frage1, frage2, frage3, frage4, frage5 }
						}); */
			} 
            		
			

			const getAntwort3 = () => {
				let vehiclesField = document.getElementById("verkehrsmittel");
				let vehicles = vehiclesField.querySelectorAll("input");

				let selectedVehicles = [];
				vehicles.forEach((vehicle) => {
					if (vehicle.checked) selectedVehicles.push(vehicle.value);
				});

				return selectedVehicles;
			};

			const getAntwort4 = () => {
				let placesField = document.getElementById("lieblingsziele");
				let favPlace = placesField.querySelector('input[name="ziele"]:checked').value;

				return favPlace;
			};

		</script>

		<!-- Skript für Fontawesome Icons -->
		<script
			src="https://kit.fontawesome.com/2d1e021d85.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>