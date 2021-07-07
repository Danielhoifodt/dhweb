<?php
require_once "/somepath/vendor/autoload.php";

$google_client = new Google_Client();

$google_client->setClientId(getenv("CLIENTID"));

$google_client->setClientSecret(getenv("CLIENTSECRET"));

$google_client->setRedirectUri("https://www.dhweb.no/google-redirect.php");

$google_client->addScope("email");

$google_client->addScope("profile");
