<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
	<style>
		.slider {
			width: 300px;
		}
	</style>
    	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">    

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
    <label for="id_kwota">Kwota kredytu: </label>
    <input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) print($kwota); ?>" /><br />
    <label for="id_lata">Okres kredytu (w latach): </label>
    <input id="id_lata" type="range" name="lata" class="slider" min="1" max="30" value="<?php if (isset($lata)) print($lata); else print(1); ?>" oninput="updateLata(this.value)" /> <span id="lataValue"><?php if (isset($lata)) print($lata); else print(1); ?></span><br />
    <label for="id_oprocentowanie">Oprocentowanie (w %): </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if (isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
    <div style="width:90%; margin: 2em auto;">    
    <input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary"/>
    </div>
</form>
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<script>
	function updateLata(val) {
		document.getElementById('lataValue').innerHTML = val;
	}
</script>

<?php
// wyświetlenie listy błędów, jeśli istnieją
if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
        foreach ($messages as $msg) {
            echo '<li>'.$msg.'</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($rata)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$rata.' zł'; ?>
</div>
</div>
<?php } ?>

</body>
</html>