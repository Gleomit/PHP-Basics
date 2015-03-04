<!DOCTYPE html>
<html>
    <head>
        <style>
            .red
            {
                color: red;
            }
            .blue
            {
                color: blue;
            }
        </style>
    </head>

    <body>
    <form action="TextColorer.php" method="post">
        <textarea name="inputString"></textarea>
        <section>
            <input type="submit" name="submit" value="Color text"/>
        </section>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            $characters = str_split($_POST["inputString"]);
            $characters = str_replace(" ", "", $characters);
            for($i = 0; $i < count($characters); $i++)
            {
                $temp = ord($characters[$i]);
                if($temp % 2 == 0)
                {
                    $characters[$i] = "<strong class=\"red\">" . chr($temp) .  "</strong>";
                }
                else if($temp % 2 != 0)
                {
                    $characters[$i] = "<strong class=\"blue\">" . chr($temp) .  "</strong>";
                }
            }
            echo join(" ",$characters);
        }
    ?>
    </body>
</html>