<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form action="URLReplacer.php" method="post">
    <p>Text</p>
    <textarea name="inputString"></textarea>
    <section>
        <input type="submit" name="submit" value="Replace the url's"/>
    </section>
</form>
<?php
if(isset($_POST["submit"]))
{
    $text = $_POST["inputString"];
    $text = preg_replace("/<a.*?href(=\".*?\").*?>(.*?)<\/a>/", "<URL$1>$2</URL>", $text);
    echo htmlspecialchars($text);
}
?>
</body>
</html>