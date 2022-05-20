//get theme from localStorage or set default Theme
const body = document.querySelector("body");
body.className = localStorage.theme ? localStorage.theme : "light";
styleBtn();

function switchTheme() {
	let newTheme = body.className === "dark" ? "light" : "dark";

	localStorage.theme = newTheme;
	body.className = newTheme;

	styleBtn();
}

function styleBtn() {
	const themeBtn = document.getElementById("themeBtn");
	let theme = localStorage.theme;

	if (theme === "dark") {
		themeBtn.innerHTML = `<i class="fa-solid fa-sun"></i>`;
		themeBtn.style.color = "#eab308";
		themeBtn.style.borderColor = "#eab308";
	} else {
		themeBtn.innerHTML = `<i class="fa-solid fa-moon"></i>`;
		themeBtn.style.color = "#3b82f6";
		themeBtn.style.borderColor = "#3b82f6";
	}
}
