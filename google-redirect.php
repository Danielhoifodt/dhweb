<?php

require_once "models/config.php";
session_start();
if(isset($_SESSION["access_token"]))
{
    $google_client->setAccessToken($_SESSION["access_token"]);
}
else if(isset($_GET["code"]))
{
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    $_SESSION["access_token"] = $token;
}
else
{
    header("Location:logg-inn");
}


$oAuth = new Google_Service_Oauth2($google_client);

$data = $oAuth->userinfo->get();

$_SESSION["email"] = $data["email"];
$_SESSION["givenName"] = $data["givenName"];
$_SESSION["gender"] = $data["gender"];
$_SESSION["picture"] = $data["picture"];
$_SESSION["familyName"] = $data["familyName"];

header("Location: medlemsportalen");