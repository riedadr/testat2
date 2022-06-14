//get theme from localStorage or set default Theme
const body = document.querySelector("body");
const themeBtn = document.getElementById("themeBtn");
body.className = localStorage.theme ? localStorage.theme : "light";
if (themeBtn) styleBtn();

function switchTheme() {
	let newTheme = body.className === "dark" ? "light" : "dark";

	localStorage.theme = newTheme;
	body.className = newTheme;

	if (themeBtn) styleBtn();
}

function styleBtn() {
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
