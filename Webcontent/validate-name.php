<?php

$mysqli = require __DIR__ . "/database.php";

$name_sql = sprintf("SELECT * FROM user WHERE name = '%s'", $mysqli->real_escape_string($_GET["name"]));

$name_result = $mysqli->query($name_sql);

$is_name_available = $name_result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_name_available]);
