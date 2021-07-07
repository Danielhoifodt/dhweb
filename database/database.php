<?php
/**
 * Class Connection
 */

class Connection{
    private $server = "localhost:3306";
    private $dbname = "danielho_dhweb";
    private $pass = "private";
    private $user = "danie_dhweb";

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


