<?php 

require_once "database/database.php";
require_once "models/profile.model.php";

session_start();

$oDB = new Connection();
$DB = $oDB->connection();

if(!isset($_SESSION["access_token"]))
{
    header("Location: logg-inn");
}

$sName = $_SESSION["givenName"]. " ". $_SESSION["familyName"];

$iCountProfiles = Profile::getCountProfilesByName($DB, $sName);

$bProfileLimit = false;

if($iCountProfiles >= 1)
{
    $bProfileLimit = true;
}

$sProfileLimitError = "";

if(isset($_POST["submit"]))
{
    if($bProfileLimit)
    {
        $sProfileLimitError = "Du kan ikke opprette flere profiler enn èn.";
    }
    else
    {
        $oData = new Profile(
                0,
        $sName,
        htmlspecialchars($_POST["job_title"]),
        $_SESSION["email"],
        htmlspecialchars($_POST["github"]),
        htmlspecialchars($_POST["languages"]),
        htmlspecialchars($_POST["description"]),
        ""
        );

        Profile::createProfile($DB, $oData);

        header("Location: medlemsportalen");
    }
    
}

require_once "inc/html-top.inc.php";?>

<div class="text_wrapper">
	<h1 class="page-heading">Lag din profil</h1>
	<p>Her kan du fylle inn informasjon om din karriere som utvikler. Alt relatert til data/teknologi blir godkjent. Du trenger ikke være ekspert på noe. Alle feltene
    trenger ikke være utfylt. Du velger selv.</p>
    <?php if(isset($sProfileLimitError)){ echo $sProfileLimitError;}?>
    </div>
    <form style="margin:40px auto 40px auto;" action="profil" method="POST">
        <input type="text" name="job_title" placeholder="Jobbtittel">
        <input type="text" name="github" placeholder="Github brukernavn">
        <input type="text" name="languages" placeholder="Programmeringsspråk">
        <textarea maxlength="200" style="height:100px;" name="description" placeholder="Om deg"></textarea>
        <input type="submit" name="submit" value="Send">
    </form>
    <a href="medlemsportalen">Tilbake</a><br><br>
</div>
</div>
<?php require_once "inc/html-bottom.inc.php";?>