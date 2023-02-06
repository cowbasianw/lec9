<?php

// 

require '../database/DatabaseHelper.php';
$config = require '../database/config.php';

$db = new DatabaseHelper($config);

// ❓❓ What do we want to actually return? We can't code unless we have a goal!


$query = <<<QUERY
    SELECT 
        ContinentCode AS code,
        ContinentName AS name
    FROM
        continents
QUERY;

$query_result = $db->run($query)->fetchAll();
// var_dump($query_result); // ❓❓ If we try this before the header() calls, boom. Why? 

$resp = json_encode($query_result, JSON_FORCE_OBJECT);

header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo ($resp);

// ⚠️ I'd validate your JSON using something like https://jsonformatter.curiousconcept.com
