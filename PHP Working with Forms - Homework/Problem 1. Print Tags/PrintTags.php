<!DOCTYPE html>
<html>
    <head>
        <title>Print Tags</title>
    </head>
    <body>
        <form method="post">
        <label for="theField">Enter Tags: </label><br/><br/>
        <input type="text" name="theField">
        <input type="submit" placeholder="Submit" name="submit">
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                $temp = explode(',', $_POST["theField"]);
                for($i = 0;$i < count($temp);$i++)
                    echo $i . " : " . htmlspecialchars(trim($temp[$i])) . "<br/>";
            }
        ?>
    </body>
</html>