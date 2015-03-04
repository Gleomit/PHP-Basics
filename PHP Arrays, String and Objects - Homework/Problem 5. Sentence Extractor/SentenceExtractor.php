<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="SentenceExtractor.php" method="post">
            <p>Text</p>
            <textarea name="inputString"></textarea>
            <p>Sentence word</p>
            <input type="text" name="sentenceWord"/>
            <section>
                <input type="submit" name="submit" value="Extract the sentences"/>
            </section>
        </form>
    <?php
        if(isset($_POST["submit"]))
        {
            $text = $_POST["inputString"];
            $sentenceWord = $_POST["sentenceWord"];
            preg_match_all("/([\.\?\!]*.*?\b" . $sentenceWord . "\b.*?[\.\?\!])/", $text, $sentences);
            for($i = 0; $i < count($sentences[0]); $i++)
                echo $sentences[0][$i] . "<br>";
        }
    ?>
    </body>
</html>