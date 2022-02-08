<?php
$url = "localhost";
$port = 3306;
$user = "InteliJ";
$password = "zaq1@WSX";
$db_name = "world";

$mysqli = mysqli_connect($url, $user, $password, $db_name, $port);

function getQuery($type, $continent, $page)
{
    global $mysqli;
    $limit = 20;
    $maxIndex = $page * $limit;
    $minIndex = $maxIndex - $limit;

    if ($type == 1) {
        $query = "SELECT Code, Name, HeadOfState, IndepYear FROM country WHERE Continent LIKE '$continent' LIMIT $minIndex, $maxIndex";
    } else if ($type == 2) {
        $query = "SELECT Code, country.Name, city.Name AS CityName FROM country INNER JOIN city ON country.Capital = city.ID WHERE Continent = '$continent' LIMIT $minIndex, $maxIndex";
    }
    return mysqli_query($mysqli, $query);
}