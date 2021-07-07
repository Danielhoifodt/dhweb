<?php
require_once "/var/www/vhosts/dhweb.no/httpdocs/vendor/autoload.php";

$google_client = new Google_Client();

$google_client->setClientId("private");

$google_client->setClientSecret("private");

$google_client->setRedirectUri("https://www.dhweb.no/google-redirect.php");

$google_client->addScope("email");

$google_client->addScope("profile");
