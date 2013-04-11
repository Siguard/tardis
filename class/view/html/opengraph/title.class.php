<?php

namespace view\html\opengraph;

/**
 * Open Graph Title
 * @package view\html\opengraph
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class title {
    
    /**
     * Der Titel des Dokuments
     * @var string
     */
    private $title = '';
    
    /**
     * Setzt den Dokumenttitel
     * @param string $title Dokumenttitel
     */
    public function setTitle( $title ){
        $this->title = (string)$title;
    }
    
    /**
     * Liefert den gescpeicherten Dokumenttitel
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }
    
    /**
     * Erzeugt eine Instanz der Klasse
     * @param string $title Der Dokumenttitel(Optional)
     */
    public function __construct ( $title = '' ){
        $this->setTitle($title);
    }
    
    /**
     * Liefert die Zeichenkette eines Open-Graph-Titel-Tags
     * @return string
     */
    public function __toString(){
        return sprintf('<meta property="og:title" content="%s" />',$this->title);
    }
    
    
}
?>
