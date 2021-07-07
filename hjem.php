<?php
session_start();

$_SESSION["name"] = "";

session_unset();

require_once "inc/html-top.inc.php";
?>

<div class="text_wrapper">
<h1 class="page-heading">Webutvikling og koding</h1>
<p>
    Her finner du mine anbefalte produkter for koding og en spennende blog om alt relatert til webutvilking og koding! Produktene er linker til Amazon.com.
    Du kan også logge inn med navn og lage en webutvikler profil.<br> <br>
    Håper du finner noe fint!<br><br>
</p>
    <img class="profile_pic" src="assets/img/koding.jpg" alt="koding">
    <br><br><br>
</div>
<br>
</div>
</div>
<?php require_once "inc/html-bottom.inc.php";?>