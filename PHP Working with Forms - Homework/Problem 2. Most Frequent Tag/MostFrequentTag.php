<!DOCTYPE html>
<html>
    <head>
        <title>Most Frequent Tag</title>
    </head>
    <body>
        <form method="post">
            <label for="theField">Enter Tags: </label><br/><br/>
            <input type="text" name="theField">
            <input type="submit" placeholder="Submit" name="submit">
        </form><br/>
        <?php
            if(isset($_POST["submit"]))
            {
                $theTags = explode(',', $_POST["theField"]);
                $theTagsWithCount = [];
                for($i = 0; $i < count($theTags); $i++)
                {
                    if( $theTagsWithCount[$theTags[$i]])
                        $theTagsWithCount[$theTags[$i]] += 1;
                    else
                        $theTagsWithCount[$theTags[$i]] = 1;
                }
                arsort($theTagsWithCount);
                foreach($theTagsWithCount as $key => $value)
                {
                    echo htmlspecialchars($key) . ' : ' . htmlspecialchars($value) . ' times<br/>';
                }
                reset($theTagsWithCount);
                echo "<br/>Most Frequent Tag is: " . htmlspecialchars(key($theTagsWithCount));
            }
        ?>
    </body>
</html>