<?php

require_once "models/config.php";

$authUrl = $google_client->createAuthUrl();

require_once "inc/html-top.inc.php";

?>
<h1 class="page-heading">Medlemsportalen</h1>
<h3>Logg inn</h3>

<button style="margin:50px auto 50px auto;width:200px; hegiht:30px;" onclick="window.location = '<?php echo $authUrl;?>';">Logg inn med Google</button>

<br>
</div>
</div>
<?php require_once "inc/html-bottom.inc.php";?>