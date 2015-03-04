<!DOCTYPE html>
<html>
    <head>
        <title>Awesome Calendar</title>
        <link rel="stylesheet" href="calendar.css"/>
    </head>
    <body>
        <?php
        $WEEK_DAYS = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $MONTHS = array("Януари","Февруари","Март","Април","Май","Юни","Юли","Август","Септември","Октомври","Ноември","Декември");
        date_default_timezone_set("Europe/Sofia");
        $year = getdate()["year"];
        function createPart($givenYear, $givenMonth)
        {
            $stringToReturn = "";
            $currentData = 1;
            $daysInTheCurrentMonth = cal_days_in_month(CAL_GREGORIAN,$givenMonth,$givenYear);
            $stringToReturn .= "<td class=\"mainCells\"><table class=\"subTable\">";
            $stringToReturn .= "<tr><th colspan=\"7\">" . $GLOBALS["MONTHS"][$givenMonth - 1] . "</th></tr>";
            $stringToReturn .= "<tr><td>По</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пе</td><td>Сб</td><td class='red'>Не</td></tr>";
            for($day = 1; $day <= $daysInTheCurrentMonth; $day++)
            {
                $theFullDate = getdate(strtotime($givenYear . "-" . $givenMonth . "-" . $day));
                if($currentData == 1)
                    $stringToReturn .= "<tr>";
                $stringToReturn .= "<td>";
                if($theFullDate["weekday"] == $GLOBALS["WEEK_DAYS"][$currentData - 1])
                {
                    $stringToReturn .= $day;
                }
                else
                    $day--;
                $stringToReturn .= "</td>";
                $currentData++;
                if($currentData > 7)
                {
                    $stringToReturn .= "</tr>";
                    $currentData = 1;
                }
            }
            $stringToReturn .= "</table></td>";
            return $stringToReturn;
        }
        ?>
        <table class="maintable">
            <tr><th colspan="4"><h1 class="mainTitle"><?php echo $year?></h1></th></tr>
            <tr>
                <?php
                echo createPart($year, 1);
                echo createPart($year, 2);
                echo createPart($year, 3);
                echo createPart($year, 4);
                ?>
            </tr>
            <tr>
                <?php
                echo createPart($year, 5);
                echo createPart($year, 6);
                echo createPart($year, 7);
                echo createPart($year, 8);
                ?>
            </tr>
            <tr>
                <?php
                echo createPart($year, 9);
                echo createPart($year, 10);
                echo createPart($year, 11);
                echo createPart($year, 12);
                ?>
            </tr>
        </table>
    </body>
</html>