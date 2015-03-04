<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <form action="TextFilter.php" method="post">
        <p>Text</p>
        <textarea name="inputString"></textarea>
        <p>Ban list</p>
        <input type="text" name="banList"/>
        <section>
            <input type="submit" name="submit" value="Ban the words"/>
        </section>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            $text = $_POST["inputString"];
            $bannedWords = explode(",",$_POST["banList"]);
            for($i = 0; $i < count($bannedWords); $i++)
            {
                $bannedWords[$i] = trim($bannedWords[$i]);
                $text = str_replace($bannedWords[$i], str_repeat("*", strlen($bannedWords[$i])), $text);
            }
            echo htmlspecialchars($text);
        }
    ?>
    </body>
</html>