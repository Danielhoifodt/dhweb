<?php 

require_once "database/database.php";
require_once "models/profile.model.php";

session_start();

if(!isset($_SESSION["access_token"]))
{
    header("Location: logg-inn");
}

$oDB = new Connection();
$DB = $oDB->connection();

if(isset($_POST["submit-search"]))
{
    $sName = $_POST["name"];

    $aProfiles = Profile::getAllProfilesBySearch($DB, $sName);
}

$iProfileCount = Profile::getCountProfiles($DB);

if(isset($_POST["submit-update"]))
{
    $oData = new Profile(
            0,
        $_SESSION["givenName"]." ". $_SESSION["familyName"] ,
    htmlspecialchars($_POST["job_title"]),
    htmlspecialchars($_POST["email"]),
    htmlspecialchars($_POST["github"]),
    htmlspecialchars($_POST["languages"]),
    htmlspecialchars($_POST["description"]),
        "auto"
    );

    Profile::updateProfile($DB, $oData);
}

$aUserHasProfile = Profile::getAllNamesFromProfile($DB);

$aUserHasProfileList = [];
for($i = 0; $i < count($aUserHasProfile); $i++)
{
  $aUserHasProfileList[] = $aUserHasProfile[$i]["name"];
}

$sUserHasProfile = "";

if(!in_array($_SESSION["givenName"]." ". $_SESSION["familyName"], $aUserHasProfileList))
{
  $sUserHasProfile = "Ønkser du å dele utviklerprofil <a href='profil'>Trykk her!</a>";
}

require_once "inc/html-top.inc.php";
?>
<br>
<h2 style="font-size:28px;">Medlemsportalen til <br><?php echo $_SESSION["givenName"]. " ". $_SESSION["familyName"];?></h2>
<br><br>
Det er <?php echo $iProfileCount;?> registrerte profiler. <?php echo $sUserHasProfile;?><br><br>
<a href="logout.php">Logg ut</a>

<form style="margin:40px auto 40px auto;" action="medlemsportalen" method="POST">
<input type="text" name="name" placeholder="Navn på person">
<input type="submit" name="submit-search" value="Søk">
</form>
La navn på person være blank får å vise alle.
<br><br>
<div class="card-wrapper">
<?php
if(isset($_POST["submit-search"]))
{
  foreach($aProfiles as $aProfile)
  {
    $sName = $aProfile["name"];
    $sJobTitle = $aProfile["job_title"];
    $sEmail = $aProfile["email"];
    $sGithub = $aProfile["github"];
    $sLanguages = $aProfile["languages"];
    $sDescription = $aProfile["profile_description"];

  if($sName == $_SESSION["givenName"]." ". $_SESSION["familyName"])
  {
    ?>
    <div class="card">
    <div class="card-body">
    <h5 class="card-title"><?php echo $sName;?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $sJobTitle;?></h6>
    <h6 class="card-subtitle mb-2 text-muted text-danger"><?php echo $sLanguages;?></h6>
    <p class="card-text"><?php echo  $sDescription;?></p>
    <a href="https://github.com/<?php echo $sGithub;?>" class="card-link">Github</a>
    <a href="mailto:<?php echo $sEmail;?>" class="card-link">Epost</a>
    <a class="card-link" style="cursor:pointer;" onclick="updateProfile();">Oppdater</a>
  </div>
  <form id="edit-profile" style="margin:auto; display:none;" action="medlemsportalen" method="POST">
        <input type="text" name="job_title" placeholder="Oppdater jobbtittel">
        <input type="text" name="github" placeholder="Oppdater github brukernavn">
        <input type="text" name="languages" placeholder="Oppdater programmeringsspråk">
        <textarea maxlength="200" style="height:100px;" name="description" placeholder="Oppdater om deg"></textarea>
        <input type="submit" name="submit-update" value="Oppdater">
    </form>
  </div>
    
    <?php
  }
  else
  {
    ?>
    <div class="card">
    <div class="card-body">
    <h5 class="card-title"><?php echo $sName;?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $sJobTitle;?></h6>
    <h6 class="card-subtitle mb-2 text-muted text-danger"><?php echo $sLanguages;?></h6>
    <p class="card-text"><?php echo  $sDescription;?></p>
    <a href="https://github.com/<?php echo $sGithub;?>" class="card-link">Github</a>
    <a href="mailto:<?php echo $sEmail;?>" class="card-link">Epost</a>
  </div>
  </div>
<?php }}} ?>
</div>
<br><br>
</div>
</div>
<script>
function updateProfile()
{
  let profile = document.getElementById("edit-profile");
  profile.style.display = "block";
}
</script>
<?php require_once "inc/html-bottom.inc.php";?>