<?php
/**
 * Changelog: Version 1.001 - Date 13.03.2013
 *            Hinzufügen der Opengraph verarbeitung 
 *            für Title und Description.
 * Changelog: Version 1.002 - date 10.04.2013
 *            Hinzufügen der Document beziehungs verarbeitung
 **/


namespace view\html;

/**
 * HTML-Titel Tag
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.002
 */
class head implements \interfaces\tostring {

    /**
     * Der Titel des Dokuments
     * @var \view\html\title
     */
    private $title = null;

    /**
     * Die Beschreibung des Dokuments
     * @var \view\html\description
     */
    private $description = null;

    /**
     * Opengraph Meta-Tags-Flag
     * @var boolean
     */
    private $opengraph = false;

    /**
     * Dokument Beziehungsliste 
     * @var array
     */
    private $links = null;
    
    /**
     * Setzt den Titel des Dokuments
     * @param string $title Der Titel des Dokuments
     * @return void
     */
    public function setTitle($title) {
        $this->title->setValue($title);
    }

    /**
     * Liefert den Titel des Dokuments
     * @return string
     */
    public function getTitle() {
        return $this->title->getValue();
    }

    /**
     * Setzt die Dokument Beschreibung
     * @param string $description Die Dokument beschreibung
     */
    public function setDescription($description) {
        $this->description->setValue($description);
    }

    /**
     * Liefert die Beschreibung des Dokumentes als Zeichenkette zurück
     * @return string
     */
    public function getDescription() {
        return $this->description->getValue();
    }

    /**
     * Setzt den zustand ob Opengraph-Meta-Tags verwendet werden sollen
     * @param boolean $state 
     */
    public function setOpengraph($state) {
        $this->opengraph = (boolean) $state;
    }

    /**
     * Liefert True zurück wenn Opengraph-Meta-Tags aktiviert sind
     * @return boolean
     */
    public function isOpengraph() {
        return $this->opengraph;
    }
    
    /**
     * Fügt eine Dokumentbeziehung in den Kopf ein.
     * @param \view\html\link $link 
     */
    public function addLink(\view\html\link $link ){
        \array_push($this->links, $link);
    }
    
    /**
     * Initialisiert eine Instanz der Klasse
     * @return \view\html\head
     */
    public function __construct() {
        $this->title = new \view\html\title();
        $this->description = new \view\html\description();
        $this->links = Array();
    }

    
    /**
     * Liefert die HTML-Tags im Dokument 
     * @return string
     */
    public function __tostring() {
        // Opengraph objekte etablieren
        if ($this->isOpengraph()) {
            $og_title = new \view\html\opengraph\title($this->getTitle());
            $og_description = new \view\html\opengraph\description($this->getDescription());
        }

        //Ausgabe
        $out = '';
        $out = \sprintf("%s%s\n\t\t", $out, (string) $this->title);
        $out = \sprintf("%s%s\n\t\t", $out, (string) $this->description);

        // Opengraph ausgabe
        if ($this->isOpengraph()) {
            $out = \sprintf("%s%s\n\t\t", $out, (string) $og_title);
            $out = \sprintf("%s%s\n\t\t", $out, (string) $og_description);
        }
        
        foreach($this->links as $link){
            $out = \sprintf("%s%s\n\t\t", $out, (string)$link);
        }
        
        return $out;
    }

}

?>
