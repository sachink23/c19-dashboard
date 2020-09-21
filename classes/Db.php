<?php


namespace PDOCon;

use League\Plates\Engine;
use PDO;
use PDOException;

class Db
{
    /**
     * @return PDO
     */
    private $connection;

    /**
     * Db constructor.
     */
    function __construct()
    {
        $this->connection = null;
    }

    /**
     * Kills the Db Connection
     */
    function __destruct()
    {
        $this->connection = null;
    }

    /**
     * @return PDO
     */
    function con()
    {
        try {

            $this->connection = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true));

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection->query("SET time_zone = '+5:30'");

            return $this->connection;

        } catch (PDOException $e) {

            $templates = new Engine(VIEWS_ROOT);

            die($templates->render("error", [
                "title" => "Database Error",
                "message" => "Error while connecting to the database, please try after some time.<br> If this error persists, please contact administrator!",
            ]));
        }
    }
}
