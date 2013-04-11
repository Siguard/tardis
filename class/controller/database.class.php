<?php
namespace controller;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Database Handling auf mysqli Basis
 * @package controller
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 * @method void connect () Etabliert die Datenbankverbindung
 */
class database {
    
    /**
     * Etabliert die Datenbankverbindung
     * @static 
     */
    public static function connect(){
        // Laden der Datenbank Konfigration        
        $configuration = parse_ini_file('configurations/database.configuration');
        
        // Aufbau der Datenbankverbindung
        $mysqli = new \mysqli($configuration['host'],$configuration['user'],$configuration['password'],$configuration['database']);
        
        // Setzen der Verbindung in das dazugehörige Singleton.
        \singletons\database_connection::setConnection($mysqli);
    }    
    
}

?>
