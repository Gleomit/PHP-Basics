<?php
    date_default_timezone_set("Europe/Sofia");
    $month = getdate()["mon"];
    $year = getdate()["year"];
    $daysLength = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $month = getdate()["month"];
    for($day = 1; $day <= $daysLength; $day++)
    {
        $date = $day . " " . $month . " " . $year;
        if(getdate(strtotime($date))["weekday"] == "Sunday")
            echo date("jS F o", strtotime($date)) . "   <br/>\n";
    }
?>