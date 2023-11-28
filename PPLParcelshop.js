// Funkce pro otevření modálního okna
function openModal() {
	var modalOverlay = document.querySelector(".modal-overlay");
	var modalBox = document.querySelector(".modal-box");
	modalOverlay.style.display = "block";
	modalBox.style.display = "block";
	// Vložení odkazů na CSS a JS soubory pro mapu
	var link = document.createElement("link");
	link.rel = "stylesheet";
	link.href = "https://www.ppl.cz/sources/map/main.css";
	var script = document.createElement("script");
	script.src = "https://www.ppl.cz/sources/map/main.js";
	document.head.appendChild(link);
	document.head.appendChild(script);
}

// Přidání posluchače události na tlačítko pro otevření modálního okna
var modalButton = document.querySelector("#radio_9");
modalButton.addEventListener("click", openModal);
// Přidání posluchače události na tlačítko "Vybrat toto místo"
var selectButton = document.querySelector(".send");
selectButton.addEventListener("click", function () {
	var selectedPlace = document.querySelector(".control-panel__box .mb-3:first-child").textContent;
	var selectedAdress = document.querySelector(".control-panel__box .mb-2 .d-inline-block").textContent;
	var pplType = document.querySelector(".typeOfBox");
	var pplID = document.querySelector(".boxID");
	var pplAdress = document.querySelector(".boxAdress");
	pplType.value = 'PPL';
	pplID.value = selectedPlace;
	pplAdress.value = selectedAdress;
	// Zde můžete provést další akce s vybraným místem



	// Zavření modálního okna
	var modalOverlay = document.querySelector(".modal-overlay");
	var modalBox = document.querySelector(".modal-box");
	modalOverlay.style.display = "none";
	modalBox.style.display = "none";
});
// Přidání posluchače události na tlačítko pro zavření modálního okna
var closeButton = document.querySelector("#close-modal-button");
closeButton.addEventListener("click", function () {
	var modalOverlay = document.querySelector(".modal-overlay");
	var modalBox = document.querySelector(".modal-box");
	modalOverlay.style.display = "none";
	modalBox.style.display = "none";
});