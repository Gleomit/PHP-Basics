<?php
    $continents = ["Europe", "Asia", "North America", "South America", "Australia", "Africa"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Combo Box</title>
    </head>
    <body>
        <select name="continents" id="continents">
            <?php foreach($continents as $value)
            {
                echo "<option value=\"" . $value . "\">" . $value. "</option>";
            } ?>
        </select>
        <select name="countries" id="countries"></select>
        <script src="ComboBoxJS.js"></script>
    </body>
</html>