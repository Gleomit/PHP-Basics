<?php
    date_default_timezone_set("Europe/Sofia");
    $currentDate = getdate();
    $currentDateTime = new DateTime($currentDate['year'] . '-' . $currentDate['mon'] . '-' . $currentDate['mday']
        . $currentDate['hours'] . ':' .  $currentDate['minutes'] . ':' . $currentDate['seconds']);
    $newYearDate = new DateTime($currentDate["year"] . "-12-31 23:59:59");
    $dateInterval = $currentDateTime->diff($newYearDate);
    echo $dateInterval->format('Hours until new year : ' . ($dateInterval->days * 24 + $dateInterval->h)) . "\n";
    echo $dateInterval->format('Minutes until new year : ' . ($dateInterval->days * 24 * 60 + $dateInterval->h * 60 + $dateInterval->i)) . "\n";
    echo $dateInterval->format('Seconds until new year : ' . ($dateInterval->days * 24 * 3600 + $dateInterval->h * 3600 + $dateInterval->i * 60 + $dateInterval->s) . "\n");
    echo $dateInterval->format('Days:Hours:Minutes:Seconds ' . ($dateInterval->days) . ':%H:%I:%S');
?>