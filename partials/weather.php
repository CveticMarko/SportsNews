<?php

$json = file_get_contents("http://dataservice.accuweather.com/locations/v1/cities/search?apikey=xGJKFJaZYStNz0Frer70GGTzKVDq4VGC&q=Belgrade,Serbia");
$weather = JSON_decode($json);
$cityName = $weather[0]->LocalizedName;
$countryName = $weather[0]->Country->LocalizedName;
$key = $weather[0]->Key;
$jsonTemp = file_get_contents("http://dataservice.accuweather.com/currentconditions/v1/{$key}?apikey=xGJKFJaZYStNz0Frer70GGTzKVDq4VGC");
$temp = JSON_decode($jsonTemp);
$date = date("d.m.Y H:i:s", $temp[0]->EpochTime);
if (strlen($temp[0]->WeatherIcon) == 1) $temp[0]->WeatherIcon = "0" . $temp[0]->WeatherIcon;
$image = "https://developer.accuweather.com/sites/default/files/{$temp[0]->WeatherIcon}-s.png";


