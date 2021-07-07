<?php

/**
 * Class Profile
 *
 */
class Profile{
    public $iId;
    public $sName;
    public $sJobTitle;
    public $sEmail;
    public $sGithub;
    public $sLanguages;
    public $sDescription;
    public $sCreatedAt;
    const TABLE = "profile";

    public function __construct(int $iId, string $sName, string $sJobTitle, string $sEmail, string $sGithub, string $sLanguages, string $sDescription, string $sCreatedAt){

        $this->iId = $iId;
        $this->sName = $sName;
        $this->sJobTitle = $sJobTitle;
        $this->sEmail = $sEmail;
        $this->sGithub = $sGithub;
        $this->sLanguages = $sLanguages;
        $this->sDescription = $sDescription;
        $this->sCreatedAt = $sCreatedAt;
    }

    public static function getAllProfilesBySearch($DB, string $sSearch):array
    {
        $oProfiles = $DB->prepare("SELECT * FROM ". self::TABLE. " WHERE name LIKE '%$sSearch%'");
        $oProfiles->execute();
        $aProfiles = $oProfiles->fetchAll(PDO::FETCH_ASSOC);

        return $aProfiles;
    }
    public static function getCountProfilesByName($DB, string $sName):int
    {
        $oProfiles = $DB->prepare("SELECT id FROM ". self::TABLE. " WHERE name = :name");
        $oProfiles->bindParam(":name", $sName);
        $oProfiles->execute();
        $aProfiles = $oProfiles->fetchAll(PDO::FETCH_ASSOC);
        $iProfiles = count($aProfiles);
        return $iProfiles;
    }
    public static function getCountProfiles($DB):int
    {
        $oProfiles = $DB->prepare("SELECT id FROM ". self::TABLE);
        $oProfiles->execute();
        $aProfiles = $oProfiles->fetchAll(PDO::FETCH_ASSOC);
        $iProfiles = count($aProfiles);
        return $iProfiles;
    }
    public static function createProfile($DB, Profile $oData):void
    {
        $oUser = $DB->prepare("INSERT INTO ".self::TABLE." (name, job_title, email, github, languages, profile_description) VALUES (?,?,?,?,?,?)");
        $oUser->execute([$oData->sName, $oData->sJobTitle, $oData->sEmail, $oData->sGithub, $oData->sLanguages, $oData->sDescription]);
    }
    public static function updateProfile($DB, Profile $oData):void
    {
        $oUser = $DB->prepare("UPDATE ".self::TABLE." SET job_title = '$oData->sJobTitle',  email = '$oData->sEmail', github= '$oData->sGithub', languages = '$oData->sLanguages', profile_description= '$oData->sDescription' WHERE name = '$oData->sName'");
        $oUser->execute();
    }
    public static function getAllNamesFromProfile($DB):array
    {
        $oProfiles = $DB->prepare("SELECT name FROM ". self::TABLE);
        $oProfiles->execute();
        $aNames = $oProfiles->fetchAll(PDO::FETCH_ASSOC);
        return $aNames;
    }
}