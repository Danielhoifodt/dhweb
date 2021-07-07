<?php
/**
 * Class Connection
 */

class Connection{
    private $server = getenv["SERVER"];
    private $dbname = getenv["DBNAME"];
    private $pass = getenv["PASS"];
    private $user = getenv["USER"];

    public function connection()
    {
        $connection = null;
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->user, $this->pass);
        }
        catch (PDOException $e)
        {
            print "Error:" . $e->getMessage() . "<br>";
        }
        return $connection;
    }
}


