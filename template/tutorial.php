<!---->
<!---->
<!--TENTO soubor slouží jako sklad kódů a tutoriál jak jej nahrát :) NEVKLÁDAT CELÝ POUZE JEHO ČÁSTI PODLE NÁVODU NÍŽ-->
<!---->
<!---->
<!--MODAL okna pro PPL Parcelshop-->
<!--Vložit do Formuláře s RADIO inputy které po kliku otevíraji modal okno a výsledek se následně vloží do výsledkových inputů -->
<!-- v MARF Eshop projektu v souboru "/stranky/stranka_platba-a-prevzeti.php"-->
<!---->
<!---->
<!---->
<!---->
<!--PARCELSHOP PPL-->
<!---->
<!---->
<!-- Modal overlay -->
<div class="modal-overlay"></div>

<!-- Modal box -->
<div class="modal-box">
	<button id="close-modal-button">x</button>
	<div id="ppl-parcelshop-map"></div>
	<div class="wraper">
		<div class="control-panel__scroll-panel-controls d-flex justify-content-center">
			<button class="send" type="button">Vybrat toto místo</button>
		</div>
	</div>
</div>

<!---->
<!---->
<!---->
<!---->
<!--Inputy pro výsledky-->
<!---->
<!---->
<!---->
<!---->
<input class="typeOfBox" name="typeOfBox" value="" type="hidden">
<input class="boxID" name="boxID" value="" type="hidden">
<input class="boxAdress" name="boxAdress" value="" type="hidden">



<!--

Data dále načítat do $_SESSIONS na základě projektu do kterého je vkládano.

Příklad:

Pro ESHOP MARF vkládame následující podmínku do souboru "/stranky/akce/platba-a-prevzeti.php"

-->

<?php
if (isset($_POST["typeOfBox"]) && $_POST['typeOfBox'] == "PPL") {
	$Parcelshop = isset($_POST['boxID']) ? $_POST['boxID'] : null;
	$ParcelshopAdresa = isset($_POST['boxAdress']) ? $_POST['boxAdress'] : null;
} else {
	$Parcelshop = null;
	$ParcelshopAdresa = null;
}
?>

<!---->
<!---->
<!-- Data se poté vkládájí do $_SESSIONS -->
<!---->
<!---->

<?php
//NAJÍT! tohle bývá již navedeno, zkontrolujeme a jdeme dál
$_SESSION["OBJEDNAVKA_UDAJE"]["Parcelshop"] = $Parcelshop;
$_SESSION["OBJEDNAVKA_UDAJE"]["ParcelshopAdresa"] = $ParcelshopAdresa;
?>
<!---->
<!---->
<!-- Najít podmínku "if ($Postovne !== null) {}" a vložit následující hlídání zda je input naplněn -->
<!-- else odkomentovat - zakomentováno jen aby podmínka neházela v tomto souboru chybu -->
<!---->
<!---->
<?php
/* else */ if ($Postovne == POSTOVNE_PARCELSHOP || $Postovne == POSTOVNE_PARCELSHOP_SK) {
				if (is_null($Parcelshop) || is_null($ParcelshopAdresa)) {
					$stav .= $jazyk->vratPreklad('Bylo zvoleno poštovné PPL Parcelshop, ale nezvolili jste výdejní místo.') . '<br>';
				}
}
?>
<!---->
<!---->
<!-- Uprávíme SQL dotaz do následující podoby -->
<!-- else odkomentovat - zakomentováno jen aby podmínka neházela v tomto souboru chybu -->
<!-- SQL dotaz již pravděpodobně v projektu je takže najít a zkontrolovat zda sedí -->
<?php
/* else */ if ($Postovne == POSTOVNE_PARCELSHOP || $Postovne == POSTOVNE_PARCELSHOP_SK) {
	$sql = "UPDATE objednavky SET ";
	$sql .= "obj_parcelshop = '" . gpc_addslashes($Parcelshop) . "', ";
	$sql .= "obj_parcelshop_adresa = '" . gpc_addslashes($ParcelshopAdresa) . "', ";
	$sql .= "obj_heureka_point = null, ";
	$sql .= "obj_heureka_point_typ_dopravy_id = null, ";
	$sql .= "obj_heureka_point_adresa = null, ";
	$sql .= "obj_balikovna = null, ";
	$sql .= "obj_balikovna_adresa = null, ";
	$sql .= "obj_vydejni_misto = '' ";
	$sql .= "where id_objednavka = " . gpc_addslashes($objednavkaId);
	$conn->query($sql);
}
?>

<!-- Zkontrolujeme databázi zda se data naplnily -->
<!-- Tabulka "objednavky" sloupce "obj_parcelshop" a "obj_parcelshop_adresa"-->

<!-- HOTOVO :) -->