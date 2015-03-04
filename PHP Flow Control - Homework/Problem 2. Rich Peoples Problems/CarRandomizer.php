<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <form action="CarRandomizer.php" method="post">
        <label for="inputString">Enter cars</label>
        <input type="text" name="inputString">
        <input type="submit" value="Show result" name="submit"/>
    </form>
        <?php
        if(isset($_POST["submit"]))
        {
            $theInput = explode(',', $_POST["inputString"]);
            $colors = array("red", "green", "blue", "black", "purple", "cyan", "yellow", "skyblue", "brown");
            count($colors); ?>
            <br/>
            <table border='1'>
                <th>Car</th>
                <th>Color</th>
                <th>Count</th>
            <?php for($i = 0; $i < count($theInput); $i++) {
                $theInput[$i] = trim($theInput[$i]);
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($theInput[$i]) ;?></td>
                    <td><?php echo $colors[rand(0, count($colors) - 1)]; ?></td>
                    <td><?php echo rand(1, 5); ?></td>
                </tr>
                <?php }?>
            </table>
        <?php }?>
    </body>
</html>