<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="AnnualExpenses.php" method="post">
            <label for="inputString">Enter  number of years:</label>
            <input type="text" name="inputString"/>
            <input type="submit" value="Show costs" name="submitBTN"/>
        </form>
        <?php
            date_default_timezone_set("Europe/Sofia");

            if(isset($_POST["submitBTN"]))
            {
                $years = $_POST["inputString"];
                $currentYear = getdate()["year"];
                ?>
                <table border="1">
                <tr>
                    <th>Year</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>November</th>
                    <th>December</th>
                    <th>Total:</th>
                </tr>
            <?php
                for($i = $currentYear; $i > $currentYear - $years;$i--)
                {
                    $total = 0; ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <?php
                    for($j = 0; $j <= 10; $j++) {
                        $randVal = rand(0, 999);
                        echo "<td>" . $randVal . "</td>";
                        $total += $randVal;
                    } ?>
                    <td><?php echo $total; ?></td>
                    </tr>
                <?php } ?>
                </table>
            <?php } ?>
    </body>
</html>

