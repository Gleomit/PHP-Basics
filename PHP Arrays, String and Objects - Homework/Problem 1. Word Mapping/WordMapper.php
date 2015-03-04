<!DOCTYPE html>
<html>
<head>
    <style>
        table
        {
            background-color: lightgray;
        }
    </style>
</head>
<body>
<form action="WordMapper.php" method="post">
    <p>Text</p>
    <textarea name="inputString"></textarea>
    <section>
        <input type="submit" name="submit" value="Count words"/>
    </section>
</form>
<?php
if(isset($_POST["submit"]))
{
    preg_match_all("/\w+/", strtolower($_POST["inputString"]), $theWords);
    $result = array_count_values($theWords[0]);
    echo "<table border='1'>";
    foreach($result as $key => $value)
    {
        echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>