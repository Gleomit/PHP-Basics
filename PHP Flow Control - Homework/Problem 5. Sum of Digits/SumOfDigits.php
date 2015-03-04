<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form method="get">
    <label for="inputString">Input string</label>
    <input type="text" name="inputString">
    <input type="submit" value="Submit" name="SubmitBtn"/>
</form>
<?php
if(isset($_GET["SubmitBtn"]))
{
    $theInput = explode(',', $_GET["inputString"]);
    echo "<br/><table border='1'>";
    for($i = 0; $i < count($theInput); $i++)
    {
        $theInput[$i] = trim($theInput[$i]);
        $secondData = '';
        if(preg_match_all("/[^0-9]+/",$theInput[$i]) > 0)
            $secondData = "I cannot sum that";
        else
        {
            $theDigits = str_split($theInput[$i]);
            $sumDigits = 0;
            for($j = 0; $j < count($theDigits); $j++)
                $sumDigits += $theDigits[$j];
            $secondData = $sumDigits;
        }
        echo "<tr><td>" . htmlspecialchars($theInput[$i]) . "</td><td>" . htmlspecialchars($secondData) . "</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>