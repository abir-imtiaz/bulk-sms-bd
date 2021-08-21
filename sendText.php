<?php

function text()
{
    $config = include('config.php');

    $url = "http://66.45.237.70/api.php";
    $number = $_POST["phone"];
    $text = html_entity_decode($_POST["message"]);
    $username = $config["username"];
    $password = $config["password"];

    $data = array(
        'username'  => $username,
        'password'  => $password,
        'number'    => "$number",
        'message'   => "$text"
    );

    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    $p = explode("|", $smsresult);
    $sendstatus = $p[0];
}

if (isset($_POST['submit'])) {
    text();
}
