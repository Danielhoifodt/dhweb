<?php
require_once "models/config.php";

unset($_SESSION["access_token"]);
$google_client->revokeToken();
session_destroy();
header("Location: hjem");