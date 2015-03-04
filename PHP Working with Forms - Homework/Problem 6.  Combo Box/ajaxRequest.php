<?php
$continents = ["Europe" => array("Bulgaria", "Greece", "France"),
    "Asia" => array("India", "Iran", "Indonesia"),
    "North America" => array("Canada", "Mexico", "USA"),
    "South America" => array("Argentina", "Brazil", "Colombia"),
    "Australia" => array("Australia"),
    "Africa" => array("Algeria", "Burundi", "Angola")];
$currentContinent;
$currentContinentName;
$continent = $_REQUEST["continents"];
if($continent != ""){
    echo implode(",", $continents[$continent]);
}
else
{
    echo implode(",", $continents["Europe"]);
}?>