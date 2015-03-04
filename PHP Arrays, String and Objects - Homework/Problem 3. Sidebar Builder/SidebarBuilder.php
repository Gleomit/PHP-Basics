<!DOCTYPE html>
<html>
    <head>
        <style>
            .sidebar
            {
                padding: 10px 10px;
                border-radius: 15px;
                margin: 10px 0;
                width: 150px;
                background-color: skyblue;
            }
            ul
            {
                list-style-type: circle;
            }
            ul li
            {
                text-decoration: underline;
            }
            h2
            {

                border-bottom: 1px solid black;
            }

        </style>
    </head>
    <body>
        <form action="SidebarBuilder.php" method="post">
            <section>
                <label for="categories">Categories</label>
                <input type="text" name="categories"/>
            </section>
            <section>
                <label for="tags">Tags</label>
                <input type="text" name="tags"/>
            </section>
            <section>
                <label for="months">Months</label>
                <input type="text" name="months"/>
            </section>
            <input type="submit" name="submit" value="Generate"/>
        </form>
    <?php
        if(isset($_POST["submit"]))
        {
            $categories = explode(",", $_POST["categories"]);
            $tags = explode(",", $_POST["tags"]);
            $months = explode(",", $_POST["months"]);

            echo "<aside class=\"sidebar\"><h2>Categories</h2>";
            echo "<ul>";
            for($i = 0; $i < count($categories); $i++)
            {
                $categories[$i] = trim($categories[$i]);
                echo "<li>" . htmlspecialchars($categories[$i]) . "</li>";
            }
            echo "</ul>";
            echo "</aside>";

            echo "<aside class=\"sidebar\"><h2>Tags</h2>";
            echo "<ul>";
            for($i = 0; $i < count($tags); $i++)
            {
                $tags[$i] = trim($tags[$i]);
                echo "<li>" . htmlspecialchars($tags[$i]) . "</li>";
            }
            echo "</ul>";
            echo "</aside>";

            echo "<aside class=\"sidebar\"><h2>Months</h2>";
            echo "<ul>";
            for($i = 0; $i < count($months); $i++)
            {
                $months[$i] = trim($months[$i]);
                echo "<li>" . htmlspecialchars($months[$i]) . "</li>";
            }
            echo "</ul>";
            echo "</aside>";
        }
    ?>
    </body>
</html>