<?php

namespace singletons;

/**
 * Hält eine Datenbank verbidung
 * @package singletons
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class database_connection {

    /**
     * Die Datenbankverbindung
     * @var \mysqli
     */
    private $connection = null;

    /**
     * Die zu haltende Instance;
     * @static
     * @var type 
     */
    private static $instance = null;

    /**
     * Liefer die Aktuelle Instanz
     * @static
     * @return mixed 
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        
    }

    /**
     * Setzt die Datenbankverbindung
     * @static
     * @param \mysqli $connection Dei Datenbank Verbindung
     */
    public static function setConnection(\mysqli $connection) {
        $instance = self::getInstance();
        $instance->connection = $connection;
    }

    /**
     * Gibt die Datenbankverbindungzurück.
     * @static
     * @return \mysqli
     */
    public function getConnection() {
        $instance = self::getInstance();
        if($instance->connection === null){
            \controller\database::connect();
        }
        return $instance->connection;
    }

}

?>
