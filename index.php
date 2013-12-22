<!doctype html>
<meta charset="utf-8">
<title>Otázky proti spamu</title>

<h1>Otázky proti spamu</h1>

<?php 
function zjednodusit($text) {
	$text = trim($text);
	$text = iconv("utf-8", "us-ascii//TRANSLIT", $text);
	$text = strtolower($text);
	$text = preg_replace('~[^a-z0-9_ ]+~', '', $text);

	return $text;
}

$otazky = array(
	"Kolik je pět krát pět" => 25,
	"Jste robot?" => "ne",
	"Jaký den následuje po pondělí" => "úterý"
	);

if (isset($_POST["otazka"])) {
	if (zjednodusit($otazky[$_POST["otazka"]]) == zjednodusit($_POST["odpoved"])) {
		echo "Nejste robot!";
	}
	else {
		echo "Jste robot!";
	}
}

$nahoda = array_rand($otazky);
?>

<form action="?" method="post">
	<p><label>Jméno<br><input type="text" name="jmeno"></label></p>
	<p><label>E-mail<br><input type="email" name="email"></label></p>
	<input type="hidden" name="otazka" value="<?=$nahoda?>">
	<p><label><?=$nahoda?><br><input type="text" name="odpoved"></label></p>
	<input type="submit">
</form>
