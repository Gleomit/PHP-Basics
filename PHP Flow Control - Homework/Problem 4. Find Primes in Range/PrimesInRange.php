<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <form action="PrimesInRange.php" method="get">
        <label for="start">Start Index</label>
        <input type="text" name="start">
        <label for="end">End</label>
        <input type="text" name="end"/>
        <input type="submit" value="Submit" name="SubmitBtn"/>
    </form>
    <?php
    if(isset($_GET["SubmitBtn"]))
    {
        $start = $_GET["start"];
        $end = $_GET["end"];
        if(strlen($start) > 0 && strlen($end) > 0
            && preg_match_all('/[^0-9]+/', $start) <= 0
            && preg_match_all('/[^0-9]+/', $end) <= 0)
        {
            if (isPrime($start))
                echo "<br/><strong>" . $start . "</strong>";
            for ($i = $start + 1; $i <= $end; $i++)
            {
                if (isPrime($i))
                    echo ", <strong>" . $i . "</strong>";
                else
                    echo ", " . $i;
            }
        }
        else
            echo "<br><h1>Invalid data entered</h1>";
    }
    function isPrime($number)
    {
        for($i = 2; $i < $number; $i++) {
            if ($number % $i == 0)
                return false;
        }
        return true;
    }
    ?>
    </body>
</html>